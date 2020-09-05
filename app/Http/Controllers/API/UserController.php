<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Jobs\sendUserRegistationEmailJob;
use App\UserLogActivity as LogActivity;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function generate_password($length = 8)
    {

        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ1234567890^&');
        $password = substr($random, 0, $length);
		//$password = 'a9812S';
        return $password;
    }

    private function get_user_ip(){

        return $_SERVER['REMOTE_ADDR'];
    }

    public function register(Request $request)  //Сделать доступ только админу
    {

        $input = $request->all();
        $validator = Validator::make($input, [
            'email' => 'required|email|unique:App\User',
            //'phone' => 'required|unique:App\User',
            'name' => 'required',
            //'role' => 'required',
        ], $this->register_validation_error_messages);

        if($validator->fails()) {

            return $this->sendError('Validation Error', $validator->errors()->toArray(), 400);
        }

        //Смотрим не забанены ли email и телефон
        // $validatorBan = Validator::make($input, [
        //     'email' => 'unique:App\Ban,contact',
        //     'phone' => 'unique:App\Ban,contact',
        // ], $this->register_banlist_error_messages);

        // if($validatorBan->fails()) {

        //     return $this->sendError('Validation Error', $validatorBan->errors()->toArray(), 400);
        // }
       
        //Смотрим последнй код по номеру телефона
        // $sending_code = sms::where(
        // [
        //     ['phone', '=',  $input['phone']],
        //     ['message_type', '=', 'code'],
        // ]  
        // )->orderByDesc('id')->value('message');

        // if( !$sending_code || ($input['code'] != $sending_code) ){

        //     return $this->sendError('', ['reg_102'], 400);

        // }else
        if(1){
            
            //$login = $this->generate_login();
            $password = $this->generate_password();
            $input['password'] = bcrypt($password);
            //$input['name'] = $input['company_name'];
            $input['role'] = 'manager';

            //$input['status'] = 'no_profile';
            $input['last_ip'] = $this->get_user_ip();
            $user = User::create($input);
            
            //$user->create_profile();

            //Добавляем пользователю роль
            $user->set_role($input['role']);

            //Логируем регистрацию
            LogActivity::addToLog('user_registered');

            //Письмо в очередь 2
            sendUserRegistationEmailJob::dispatch($user, $password);
        }

        // $success['token'] =  $user->createToken('client')->accessToken;
        // $success['name'] =  $user->name;

        return $this->sendResponse($user, 'reg_120');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'email' => 'required|exists:App\User,email',
            'password' => 'required',
            //'code' => 'required',
        ], $this->login_validation_error_messages);

        if ($validator->fails()) {

            return $this->sendError('Validation Error', $validator->errors()->toArray(), 400);
        }

        //Проверка на бан
        if( User::where('email', $request->email)->first()->isBanned() ){ 
            return $this->sendError('', ['login_103'], 400);
        }
        
        //Авторизация удалась
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
           
            $userInfo = User::where('email', $request->email)->first();

            //Смотрим последнй код по номеру телефона
            $userInfo->phone;

            // //Смотрим не забанены ли email и телефон
            // $validatorBan = Validator::make([ 'email' => $userInfo->email, 'phone' => $userInfo->phone ], [
            //     'email' => 'unique:App\Ban,contact',
            //     'phone' => 'unique:App\Ban,contact',
            // ], $this->register_banlist_error_messages);

            // if ($validatorBan->fails()) {
    
            //     return $this->sendError('Validation Error', $validatorBan->errors()->toArray(), 400);
            // }

            //Проверяем код смс
            // $sending_code = sms::where(
            //     [
            //         ['phone', '=',  $userInfo->phone],
            //         ['message_type', '=', 'code'],
            //     ]  
            // )->orderByDesc('id')->value('message');
    
            
            // if( !$sending_code || ($input['code'] != $sending_code) ){

            //     return $this->sendError('', ['login_102'], 400);
            // }else
            {

                $ip = $_SERVER['REMOTE_ADDR'];
                $user = Auth::user();
                $success['token'] =  $user->createToken('client')->plainTextToken;
                LogActivity::addToLog('Login success');
                
                return $this->sendResponse($success, 'login_120');
            }
        } else {//Авторизация провалена
                
            LogActivity::addToLog('Login failed');
            
            return $this->sendError('', ['login_101'], 403);
        }
    }

}

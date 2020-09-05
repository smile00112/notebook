<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function sendResponse($result, $message = '')
    {
        $response = [];
        $_codes = $this->success_codes;
        
        if(!empty($result)) 
            $response['result'] = $result;
            
        if(!empty($message)) 
            if(isset($_codes[$message]))
                $response['message'] = $_codes[$message];
            else $response['message'] = $_codes[404]." ({$message})";

        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($message, $errorMessages = [], $code = 400)
    {
        $_errors = $response = [];
        $_codes = $this->error_codes;

        //По кодам ищем тексты для ошибок
        if($message == 'Validation Error'){
            foreach($errorMessages as $e){
                if(isset($_codes[$e[0]]))
                    $_errors[] = $_codes[$e[0]];
                else{
                    $_errors[] = $_codes[404];
                    $_errors[] = $e;
                }    
            }
        }else{
            foreach($errorMessages as $e){

                if(isset($_codes[$e]))
                    $_errors[] = $_codes[$e];
                else{
                    //$_errors[] = $_codes[404].'({$e})';
                    $_errors[] = $_codes[404];
                    $_errors[] = $e;
                }    
            }
        }


        if($message && $message != 'Validation Error')
            $response['message'] = $message;

        if(count($_errors)){
            //$response['data'] = $_errors;
            $response = $_errors;
        }


        return response()->json($response, $code);
    }

    
    //Коды ошибок и сообщений
    protected $message_validation_error_messages = [

        'message.required' =>  'message_requred',
        'theme.required' =>  'theme_requred',
    ];

    protected $cargo_validation_error_messages = [

        'departure_address.required' =>  'cargo_104',
        //'dispatch_date.required' =>  'cargo_105',
        'destination_address.required' =>  'cargo_106',
        'shipment_date.required' =>  'cargo_107',
        'cargo_type.required' =>  'cargo_108',
        'transport_type.required' =>  'cargo_109',
        'user.exists' =>  'cargo110',
        'weight.required' =>  'cargo_111',
        'express.required' =>  'cargo_112',
        'height.required' =>  'cargo_113',
        'length.required' =>  'cargo_114',
        'width.required' =>  'cargo_115',
        'quantity.required' =>  'cargo_116',
        'tonnage.required' =>  'cargo_117',
        'maximum_budget.required' =>  'cargo_118',
        'template_name.required' =>  'cargo_119',

    ];
    
    protected $register_banlist_error_messages = [

        'email.required' =>  'reg_ban_100',
        'phone.required' =>  'reg_ban_101',

    ]; 

    protected $register_validation_error_messages = [

        'email.required' =>  'reg_104',
        'code.required' =>  'reg_107',
        'phone.required' =>  'reg_105',
        'company_name.required' =>  'reg_106',
        'email.unique'    =>  'reg_100',
        'phone.unique'    =>  'reg_101',
        'company_name.unique'    =>  'reg_103',
        'role.required'    =>  'reg_108',

    ];

    protected $login_validation_error_messages = [

        'email.required' =>  'login_104',
        'password.required' =>  'login_105',
        'code.required' =>  'login_106',
        'email.exists'    =>  'login_100',
    ];  

    protected $useredit_validation_error_messages = [

        'id.required' =>  'login_104',
        'id.exists' =>  'login_100',
       
    ];   

    private $error_codes = [
        //регистрация
        'reg_100' => [ 'code' => 100, 'message' => 'Email address already exists' ],
        'reg_101' => [ 'code' => 101, 'message' => 'Phone already exists' ],
        'reg_102' => [ 'code' => 102, 'message' => 'Code checking failed' ],
        'reg_103' => [ 'code' => 103, 'message' => 'Company already exists' ],
        'reg_104' => [ 'code' => 104, 'message' => 'Email empty' ],
        'reg_105' => [ 'code' => 105, 'message' => 'Phone empty' ],
        'reg_106' => [ 'code' => 108, 'message' => 'Company empty' ], 
        'reg_107' => [ 'code' => 106, 'message' => 'Code empty' ], 
        'reg_108' => [ 'code' => 107, 'message' => 'Role empty' ],
        'reg_120' => [ 'code' => 120, 'message' => 'Inn empty' ],
        'reg_121' => [ 'code' => 121, 'message' => 'Kontur responce empty' ],
        'role_not_found' => [ 'code' => 108, 'message' => 'Role not found' ],
        
        //авторизация
        'login_100' => [ 'code' => 100, 'message' => 'User does not exist' ], 
        'login_101' => [ 'code' => 101, 'message' => 'Wrong email or password' ], 
        'login_102' => [ 'code' => 102, 'message' => 'Code checking failed' ], 
        'login_103' => [ 'code' => 103, 'message' => 'User are banned' ], 
        'login_104' => [ 'code' => 104, 'message' => 'Login empty' ], 
        'login_105' => [ 'code' => 105, 'message' => 'Password empty' ], 
        'login_106' => [ 'code' => 106, 'message' => 'Code empty' ],       

        //SMS
        'sms_102' => [ 'code' => 102, 'message' => 'Invalid type' ],
        
        //регистрация бан лист
        'reg_ban_100' => [ 'code' => 100, 'message' => 'Email banned' ],         
        'reg_ban_101' => [ 'code' => 101, 'message' => 'Phone banned' ],         
        
        //Сообщения пользователя
        'message_add_fail' =>  [ 'code' => 100, 'message' => 'Failed to add message' ],
        'message_requred' =>  [ 'code' => 101, 'message' => 'Message empty' ],
        'theme_requred' =>  [ 'code' => 102, 'message' => 'Theme empty' ],       
         
        //Пльзователь не авторизован
        'no_auth' => [ 'message' => 'Пльзователь не авторизован' ],

        //Грузы пользователя
        'cargo_104' =>  [ 'code' => 104, 'message' => 'departure_address empty' ],
        //'cargo_105' =>  [ 'code' => 105, 'message' => 'departure_address empty' ],
        'cargo_106' =>  [ 'code' => 106, 'message' => 'destination_address empty' ],
        'cargo_107' =>  [ 'code' => 107, 'message' => 'shipment_date empty' ],
        'cargo_108' =>  [ 'code' => 108, 'message' => 'cargo_type empty' ],
        'cargo_109' =>  [ 'code' => 109, 'message' => 'transport_type empty' ],
        'cargo_110' =>  [ 'code' => 110, 'message' => 'user not found' ],
        'cargo_111' =>  [ 'code' => 111, 'message' => 'weight empty' ],
        'cargo_112' =>  [ 'code' => 112, 'message' => 'express empty' ],
        'cargo_113' =>  [ 'code' => 113, 'message' => 'height empty' ],
        'cargo_114' =>  [ 'code' => 114, 'message' => 'length empty' ],
        'cargo_115' =>  [ 'code' => 115, 'message' => 'width empty' ],
        'cargo_116' =>  [ 'code' => 116, 'message' => 'quantity empty' ],
        'cargo_117' =>  [ 'code' => 117, 'message' => 'tonnage empty' ],
        'cargo_118' =>  [ 'code' => 118, 'message' => 'maximum_budget empty' ],
        'cargo_119' =>  [ 'code' => 118, 'message' => 'template_name empty' ],        

        //Удаление груза
        'cargoes_delete_fail' =>  [ 'code' => 100, 'message' => 'The cagro does not exist'  ],   

        //Удаление шаблона 
        'template_delete_fail' =>  [ 'code' => 100, 'message' => 'Template does not exist' ],

        //Админка
        'adm_user_not_exist' =>  [ 'code' => 100, 'message' => 'User does not exist' ],
        'adm_user_allready_in_ban' =>  [ 'code' => 100, 'message' => 'User allready in ban' ],
        'adm_user_not_in_ban' =>  [ 'code' => 100, 'message' => 'User not in ban' ],
        'adm_role_error' => 'Role not found',
        'adm_message_not_found' =>  [ 'code' => 100, 'message' => 'Message does not exist' ],
        'adm_cargo_not_found' =>  [ 'code' => 100, 'message' => 'The cargo does not exist' ],
        'adm_template_not_found' =>  [ 'code' => 100, 'message' => 'Template does not exist' ],
        
        
        'no_no_no' => 'User id Untouchable',

        //код не найден
        '404' => [ 'code' => 404, 'message' => 'err code not found' ], 
    //    141 => [ 'code' => 141, 'message' => 'Code checking failed' ],        
    ];

    private $success_codes = [
        //регистрация
        'reg_120' => 'User registration successfully', 

        //авторизация
        'login_120' => 'User login successfully', 

        //выход
        'logout_100' => 'User logout successfully', 

        //SMS
        'sms_100' => 'Send SMS successfully',
     
        //Профиль пользователя
        'profile_100' =>  'User profile received' , 
        'profile_update' =>  "User profile updated" , 

        //Логи пользователя
        'logs_100' =>  'User logs received' ,
		
        //Запрос в Контур по ИНН
        'kontur_info' =>  'Kontur data' ,

        //Сообщения пользователя
        'messages_get' =>  'User messages received' ,        
        'message_add' =>  'Message successfully added' , 

        //Грузы пользователя
        'cargoes_get' =>  'Cargo list received' ,        
        'cargo_add' =>  'New cargo added' ,         
        'template_add' =>  'New template added' ,   
        'templates_get' =>  'Templates list received' ,   

        //Удаление груза
        'cargoes_delete' =>  'Cargo removed' ,   

        //Удаление шаблона
        'template_delete' =>  'Template removed' ,     

        //АДМИНКА
        'adm_all_users' => 'User list received',
        'adm_add_user' => 'New user added',
        'adm_del_user' => 'User deleted',
        'adm_get_user' => 'User information received',
        'adm_update_user' => 'User information changed',
        'adm_activate_user' => 'User account activated',
        'adm_blacklist' => 'Blacklist received',
        'adm_add_to_blacklist' => 'User blacklisted',
        'adm_ban_deleted' => 'User removed from blacklist',
        'adm_user_messages' => 'Received user message list',
        'adm_message_delete' => 'Message deleted',
        'adm_user_cargoes' => 'List of user cargoes received',   
        'adm_cargo_add' => 'New cargo added to user',              
        'adm_get_cargo' => 'Cargo information received',
        'adm_get_all_cargo' => 'List of all cargoes received',
        'adm_edit_cargo' => 'Cargo information changed',        
        'adm_delete_cargo' => 'Cargo removed', 

        'adm_user_templates' => 'List of all user templates received',   
        'adm_template_add' => 'New template added to user',              
        'adm_get_template' => 'Template received',
        'adm_get_all_template' => 'List of all templates received',
        'adm_edit_template' => 'Template changed',        
        'adm_delete_template' => 'Template deleted', 

        //код не найден
        '404' =>  'msg code not found' , 
    ];
}

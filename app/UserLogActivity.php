<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;

class UserLogActivity extends Model
{
    private static $messages = [
        '' => 'Сообщение не найдено',
        'Profile update' => 'Изменение данных пользователя',
        'profile_update' => 'Изменение данных пользователя',
        'user_registered' => 'Регистрация пользователя',
        'Login success' => 'Выполнен вход',
        'Login failed' => 'Попытка входа провалилась',
        'Logout' => 'Выход',
        'user_send_email' => 'Отправлено email сообщение',        
        'user_add_cargo' => 'Добавлена заявка',        
        'user_add_template' => 'Добавлен шаблон',        
    ];

    public static function addToLog($subject, $user_id = 0)
    {
    	$log = [];
    	$log['subject'] = (isset( static::$messages[$subject])) ? static::$messages[$subject] : $subject;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        if(!$user_id)
            $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        else $log['user_id'] = $user_id;
        
    	UserLogActivity::create($log);
    }


    public static function logActivityLists()
    {
    	return UserLogActivity::latest()->get();
    }

    protected $table = 'log';

    protected $fillable = [
        'subject', 'url', 'method', 'ip', 'agent', 'user_id'
    ];

     protected $hidden = [
        'updated_at'
    ];   
}

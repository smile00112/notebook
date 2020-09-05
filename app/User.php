<?php

namespace App;

use App\Traits\HasRolesAndPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function isBanned()
    {
        return false;
    }
    
    public function set_role($roleName, $moderate= false)
    {
        //Роль пользователя по умолчанию
        // if(empty($roleName)){
        //     $role = Role::where('slug','cargo_owner')->first();
        // }
        // else{}
        if($moderate){  //Премодерация новых пользователей
            switch ($roleName) {

                case 'carrier': $role = Role::where('slug','carrier_moderate')->first(); break;


                default: $role = false;
            }
        }else{
            switch ($roleName) {

                case 'manager': $role = Role::where('slug','carrier')->first(); break;

                default: $role = false;
            }            
        }

        if(!$role) return $this->sendError('', ['role_not_found'], 400);

        //Добавляем пользователю роль
        $this->roles()->detach();
        $this->roles()->attach($role);

    }
}

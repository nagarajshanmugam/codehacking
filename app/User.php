<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role; 

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $table = 'users';
	 
	 public $incrementing = true;
	 
     protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id'
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
	
	public function role(){
	
	return $this->belongsTo('App\Role','role_id');
	
	}
	
	public function photo(){
	
	return $this->belongsTo('App\Photo');
	
	}
	
	public function setPasswordAttribute($value){
	
    $this->attributes['password'] = bcrypt($value);
	
     }
	 
	 public function isAdmin(){
	 
	 
	 if($this->role->name == 'Super Admin'){
	 
	 return true;
	 
	 }
	 
	 return false;
	 
	 
	 
	 
	 }
	 
}

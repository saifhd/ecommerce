<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use Notifiable;

        protected $guard = 'admin';

        public function sendPasswordResetNotification($token)
	    {
	        $this->notify(new AdminPasswordResetNotification($token));
	    }

        protected $fillable = [
            'name', 'email', 'password','phone','category','coupon','product','blog','order',
            'other_pro','report','role','return_pro','contact','comment','type','setting','stock'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}

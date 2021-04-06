<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Site_Setting extends Model
{
    //
    protected $fillable = [
        'phone1','phone2','email','company_name','company_address','facebook','instagram','twitter','youtube'
    ];
}

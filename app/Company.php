<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    protected $table = 'companies';
    public $timestamps = false;

      public function employees()
  		{
    		return $this->hasMany('App\Employee', 'company_id');
  		}

}

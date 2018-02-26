<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    protected $table = 'employees';
    public $timestamps = false;

    public function company()
	  {
	    return $this->belongsTo('App\Company', 'companies_id');
	  }
}

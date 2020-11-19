<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = ['employee_name', 'email', 'company_id'];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}

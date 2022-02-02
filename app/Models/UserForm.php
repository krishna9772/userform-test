<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{ 
    public $fillable = ['name','phone','dob','gender'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'name', 'mobilenumber', 'emailid', 'fee'
   ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pdfDetail extends Model
{
    protected $table    = 'pdfDetail';

    protected $hidden   = ['created_at','updated_at']; 

    protected $fillable = ['first_name','last_name','card','email', 'phone'];

}

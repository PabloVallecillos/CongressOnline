<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayCongress extends Model
{
    protected $table    = 'pay';

    protected $hidden   = ['created_at','updated_at']; 

    protected $fillable = ['document', 'check', 'date' ]; 
    
    protected $primaryKey = 'iduser';
    
    public function user() {
        return $this->belongsTo('App\User', 'iduser');
    }
}

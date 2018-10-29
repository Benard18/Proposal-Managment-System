<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
 
    public $timestamps = true;

     public function user()
    {
    	return $this->belongsTo('App\User');
    }
         public function admin()
    {
    	return $this->belongsTo('App\Admin');
    }
         public function approves()
    {
    	return $this->belongsTo('App\Approve');
    }
}


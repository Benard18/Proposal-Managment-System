<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function admin()
 	{
 		return $this->belongsTo('App\Admin');
 	}
 	public function proposals()
 	{
 		return $this->belongsTo('App\Proposal');
 	}
}

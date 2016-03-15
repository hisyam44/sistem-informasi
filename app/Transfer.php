<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = ['title','category','amount','saldo_temporary','description','published_at'];

    protected $dates = ['published_at','created_at'];

    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }
}

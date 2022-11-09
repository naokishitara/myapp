<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $guarded = array('id');
    public static $rules = array(
        'name' => 'required'
    );
      public function user(){
         return $this->belongsTo(User::class); 
      }
    
}


 
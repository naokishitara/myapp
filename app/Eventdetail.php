<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventdetail extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    public static $rules = array(
        'weight' => 'required',
        'reps' => 'required',
        'sets' => 'required',
    );
     public function event(){
         return $this->belongsTo(Event::class);
     }
      public function user(){
          return $this->belongsTo(User::class);
      }
}

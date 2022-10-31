<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = array('id');
    public function eventdetail(){
        return $this->belongsTo(Eventdetail::class);
    }
      public function user()
      {
       return $this->belongsto(User::class); 
      }
   
}

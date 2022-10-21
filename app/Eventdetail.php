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
}

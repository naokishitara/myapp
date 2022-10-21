<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    
    protected $guarded = array('id');
    public static $rules = array(
        'name' => 'required',
    );
}

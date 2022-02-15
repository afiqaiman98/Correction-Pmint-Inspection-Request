<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'location',
        'date',
        'name',
        'company',
        'status',
        'file',
        'user_id',
    ];

   protected $dates = ['date'];

    // public function setDate1Attribute($value)
    // {
    //     $this->attributes['date1'] = Carbon::createFromFormat('m/d/Y',$value)->format('Y-m-d');
    // }

    
}

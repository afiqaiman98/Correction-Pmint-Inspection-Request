<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspect extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'location',
        'date',
        'name',
        'company',
        'engineerId',
        'status',
        'file',
        'createdBy',
    ];

    // protected $dates = ['date'];

    // function getDateAttribute()
    // {
    //     return $this->attributes['date']->format('m/d/Y H:i');
    // }

    // public function setRegistrationFromAttribute($value)
    // {
    //     $this->attributes['date'] =  Carbon::parse($value);
    // }



    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    //     'deleted_at'
    // ];

    public function engineer()
    {
        return $this->belongsTo(User::class, 'engineerId');
    }
}

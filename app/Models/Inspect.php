<?php

namespace App\Models;

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

    protected $dates = ['date'];

    public function engineer()
    {
        return $this->belongsTo(User::class, 'engineerId');
    }
}

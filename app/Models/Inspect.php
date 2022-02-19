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
        'status',
        'file',
        'user_id',
    ];

   protected $dates = ['date'];

   public function user()
   {
       return $this->belongsTo(User::class);
   }
}

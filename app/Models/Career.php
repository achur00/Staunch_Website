<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Career extends Model
{
    use HasFactory, Notifiable;

    protected $fillable =[
        'name',
        'phone',
        'gender',
        'email',
        'cv',
        'website',
        'skills'
    ];
}

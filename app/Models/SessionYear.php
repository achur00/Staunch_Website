<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionYear extends Model
{
    use HasFactory;
    protected $table = 'session_years';
    
    protected $fillable = [
        'class'
    ];

    public function students(){
        return $this->hasMany(EnrolStudent::class, 'sessionyear_id');}

}

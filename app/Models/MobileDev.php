<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MobileDev extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts =
     [
        'curriculum'=>'array'
     ];
     
    protected $table= 'mobile_devs';

    protected $fillable =
     [
        'course_name',
        'course_description',
        'course_price',
        'course_duration',
        'curriculum',
        'sessionyear_id',
     ];


     public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function students()
    {
        return $this->hasMany(EnrolStudent::class, 'mobile_dev_id');
    }

    // public function set_year()
    // {
    //     return $this->belongsTo(SessionYear::class);
    // }
}

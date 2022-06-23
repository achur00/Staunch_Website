<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CourseDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts =
     [
        'curriculum'=>'array'
     ];
     
     protected $table = 'course_details';

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
        return $this->hasMany(EnrolStudent::class, 'coursedetail_id');
    }

    // public function set_year()
    // {
    //     return $this->belongsTo(SessionYear::class);
    // }
    
}

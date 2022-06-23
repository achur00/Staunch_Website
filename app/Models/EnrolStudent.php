<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolStudent extends Model
{
    use HasFactory;
    protected $table = 'enrol_students';
    protected $fillable = 
    [
        'first_name',
        'last_name',
        'middle_name',
        'student_phone_number',
        'student_email',
        'coursedetail_id',
        'sessionyear_id',
    ];

    public function course()
    {
        return $this->belongsTo(CourseDetail::class, 'coursedetail_id');
 
    }

    public function mobile_course()
    {
        return $this->belongsTo(MobileDev::class, 'mobile_dev_id');
 
    }

    public function set_year()
    {
        return $this->belongsTo(SessionYear::class);
    
    }
}

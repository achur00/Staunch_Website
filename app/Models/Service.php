<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'service_category_id',
        'phone',
    ];

    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id', 'id', 'category');
    }

}

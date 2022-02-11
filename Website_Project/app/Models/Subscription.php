<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable =[
        'service_id',
        'user_id',
        'pricing_id',
        'created_by',
        'start',
        'due',
        'paid',
        'payment_ref',
        'status',
        'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getDueAttribute($value)
    {
       return Carbon::parse($value);
    }
    public function getStartAttribute($value)
    {
       return Carbon::parse($value);
    }

}

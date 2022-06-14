<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'user_id',
        'paymentplan_id',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function paymentplan()
    {
        return $this->belongsTo(Paymentplan::class);
    }
}

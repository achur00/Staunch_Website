<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'phone',
        'password',
        'company_name',
        'company_address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function subcreator()
    {
        return $this->hasMany(Subscription::class, 'created_by', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function paymentplans()
    {
        return $this->hasMany(Paymentplan::class);
    }

    public function pricings()
    {
        return $this->hasMany(Pricing::class);
    }
}

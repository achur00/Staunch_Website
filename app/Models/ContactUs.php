<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ContactUs extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'address',
        'phone',
        'email',
        'note',
        'footer_note',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'linkedin_url',
        'website_url',
    ];

    public function routeNotificationForMail($notifications)
    {
        return ['contact@staunchtechnologies.com' => "Staunch Technologies"];
    }
}

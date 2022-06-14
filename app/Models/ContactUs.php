<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phone',
        'email',
        'note',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'linkedin_url',
        'website_url',
    ];
}

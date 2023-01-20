<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_address',
        'phone_number',
        'email_address',
        'twitter_url',
        'facebook_url',
        'rss_url',
        'who_are_we_text',
    ];
}

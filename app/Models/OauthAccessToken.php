<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OauthAccessToken extends Model
{
    protected $casts = ['id' => 'string'];
}

<?php

namespace App\Model\admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticatable
{
    use Notifiable;
}

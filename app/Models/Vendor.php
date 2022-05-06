<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "company_name",
        "email",
        "password",
        "postcode",
        "address",
        "city",
        "NPWP"
    ];

    protected $hidden = [
        "password",
    ];
}

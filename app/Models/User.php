<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['nombre', 'email', 'password'];

    protected $hidden = ['password'];
}


if (User::where('email', 'admin@qchuzos.com')->doesntExist()) {
    User::create([
        'nombre' => 'Admin',
        'email' => 'admin@qchuzos.com',
        'password' => Hash::make('qchuzos2025'),
    ]);
}

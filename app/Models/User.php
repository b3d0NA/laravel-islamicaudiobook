<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'fb_link',
        'group_status',
        'paid_status',
        'gender',
        'last_login_at',
        'last_paid',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ["last_login_at", "last_paid"];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function messages()
    {
        return $this->hasMany(AdminMessage::class, "user_id");
    }

    public function lastMessage()
    {
        return $this->messages()->latest()->first();
    }

    public function payments()
    {
        return $this->hasMany(UserPayment::class);
    }

    public function lastPayment()
    {
        return $this->payments()->latest()->limit(1);
    }

    public function survey()
    {
        return $this->hasOne(Survey::class);
    }

    public function isSurveyed()
    {
        return $this->survey->exists();
    }
}
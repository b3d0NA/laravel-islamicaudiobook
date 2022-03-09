<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'author',
        'publication',
        'page_number',
        'cover_link',
        'read_link',
        'short_link',
        'read',
        'status',
    ];
    use HasFactory;

    public function requests()
    {
        return $this->hasMany(BookRequest::class);
    }

    public function userRequests()
    {
        return auth()->user()->requests();
    }
}
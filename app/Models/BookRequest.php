<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function expirationToHuman()
    {
        if ($this->expiration == 3) {
            return "৩ দিন";
        } elseif ($this->expiration == 5) {
            return "৫ দিন";
        } elseif ($this->expiration == 7) {
            return "৭ দিন";
        } elseif ($this->expiration == 10) {
            return "১০ দিন";
        } elseif ($this->expiration == 12) {
            return "১২ দিন";
        }
    }

    public function expirationInDate()
    {
        return $this->updated_at->addDays($this->expiration);
    }
}
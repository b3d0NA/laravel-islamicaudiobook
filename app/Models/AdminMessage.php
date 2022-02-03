<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class AdminMessage extends Model
{
    use HasFactory;

    protected $fillable = ["message", "user_id", "is_admin"];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }
}
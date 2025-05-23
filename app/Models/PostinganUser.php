<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostinganUser extends Model
{
    use HasFactory;

    protected $table = 'postingan_users';

    protected $fillable = [
        'judul', 'konten', 'user_id',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


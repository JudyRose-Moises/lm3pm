<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name',
        'author',
        'publish_date',
        'is_borrowed',
    ];

    public function borrowHistories()
    {
        return $this->hasMany(BorrowHistory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'student_number');
    }
}

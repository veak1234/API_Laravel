<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class BorrowRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
       'return_date',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);

    }

    public function book():BelongsTo{
        return $this->belongsTo(Book::class);
    }
}

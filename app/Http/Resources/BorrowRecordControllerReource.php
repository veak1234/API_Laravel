<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\BorrowRecord;

class BorrowRecordControllerReource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            // 'user_id' => $this->user_id,
            // 'book_id' => $this->book_id,
            'user_id' => $this->user->name,
            'book_id' => $this->book->title,
            'borrow_date' => $this->borrow_date,
           'return_date' => $this->return_date,
           'borrowed_books' => BorrowRecord::where('book_id', $this->id)->count(),
        ];
    }
}

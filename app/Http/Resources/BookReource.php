<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\BorrowRecord;

class BookReource extends JsonResource
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
            'title' => $this->title,
            'author' => $this->author,
            'published_year'=>$this->published_year,
            'people' => BorrowRecord::where('book_id', $this->id)->get(),
            'borrowed_books' => BorrowRecord::where('book_id', $this->id)->count(),

        ];
    }
}

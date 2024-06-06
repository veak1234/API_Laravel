<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Posts;
use App\Models\Comments;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'email_verified_at' => $this->email_verified_at,
            'password_reset_token' => $this->password_reset_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'createdPost' => Posts::where('user_id', $this->id)->get(),
        ];
    }
}

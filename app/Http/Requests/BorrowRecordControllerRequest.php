<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowRecordControllerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'book_id' =>'sometimes|required|integer',
            'user_id' =>'sometimes|required|integer',
            'borrow_date' =>'sometimes|required',
            'return_date' =>'sometimes|required',
        ];
    }
}

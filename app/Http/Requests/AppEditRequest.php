<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date' => 'nullable|date',
            'user_id' => 'nullable|exists:users,id',
            'doctor_id' => 'nullable|exists:users,id',
        ];
    }
}

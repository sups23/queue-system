<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserEditRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email,'.CRUD::getCurrentEntryId(),
            'age' => 'numeric|min:0|max:100',
            'doctor_id' => 'nullable|exists:users,id',
            'dept_id' => 'nullable|exits:depts,id',
            'gender' => ['required',Rule::in(['Male','Female'])],
            'address' => 'required|string'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->user)
            ],
            'role' => 'required|in:guru,siswa'
            ,
            'password' => 'nullable|min:6',
            'nip' => 'required_if:role,guru',
            'subject' => 'required_if:role,guru',
            'address' => 'required_if:role,guru',
            'class_id' => 'required_if:role,siswa'
        ];
    }
}

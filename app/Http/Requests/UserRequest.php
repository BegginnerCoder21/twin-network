<?php

namespace App\Http\Requests;

use Rules\Password;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'matricule' => ['required', 'string', 'max:15'],
            'speciality' => ['required', 'string', 'max:100'],
            'image' => ['required'],
            'admin' => ['required'],
            'password' => ['required', 'confirmed'],
        ];
    }
}

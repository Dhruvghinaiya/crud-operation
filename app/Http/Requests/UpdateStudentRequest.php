<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('students', 'email')->ignore($this->route('student'))],
            'gender' => ['required'],
            'dob' => ['required', 'before_or_equal:today'],
            'mobile' => ['required', 'min:10'],
            'avatar' => ['nullable', 'image', 'mimes:png,jpg', 'max:2000']
        ];
    }

    public function getInsertTableField()
    {
        $avatarPath = null;
        if ($this->hasFile('avatar')) {
            $avatarPath = $this->file('avatar')->store('images', 'public');
        }
        return [
            'firstname' => $this->input('firstname'),
            'lastname' => $this->input('lastname'),
            'email' => $this->input('email'),
            'gender' => $this->input('gender'),
            'dob' => $this->input('dob'),
            'mobile' => $this->input('mobile'),
            'avatar' => $avatarPath,
        ];
    }
}

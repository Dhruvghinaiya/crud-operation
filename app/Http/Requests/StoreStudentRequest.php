<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:students,email'],
            'course_id' => ['required'],
            'gender' => ['required'],
            'dob' => ['required', 'date','before_or_equal:today'],
            'mobile' => ['required', 'min:10', 'max:16'],
            'avatar' => ['nullable', 'image', 'mimes:png,jpg', 'max:2000'],
        ];
    }

    public function getInsertTableField()
    {
        $avatarPath  = null;
        if ($this->hasFile('avatar')) {
            $avatarPath = $this->file('avatar')->store('images', 'public');
        }
        return [
            'firstname' => $this->input('firstname'),
            'lastname' => $this->input('lastname'),
            'email' => $this->input('email'),
            'course_id' => $this->input('course_id'),
            'gender' => $this->input('gender'),
            'mobile' => $this->input('mobile'),
            'dob' => $this->input('dob'),
            'avatar' => $avatarPath,
        ];
    }
}

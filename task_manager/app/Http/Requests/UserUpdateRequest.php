<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class UserUpdateRequest extends FormRequest {
        public function rules() {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $this->user->id . ',id',
                'password' => 'required|string|confirmed',
            ];
        }

        public function authorize(): bool {
            return true;
        }
    }

<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StatusRequest extends FormRequest {
        public function rules() {
            return [
                'name' => 'required|string|max:255',
            ];
        }

        public function authorize(): bool {
            return true;
        }
    }

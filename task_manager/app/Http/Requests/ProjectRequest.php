<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class ProjectRequest extends FormRequest {
        public function rules() {
            return [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ];
        }

        public function authorize(): bool {
            return true;
        }
    }

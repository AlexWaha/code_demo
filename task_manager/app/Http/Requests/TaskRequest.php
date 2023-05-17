<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class TaskRequest extends FormRequest {
        public function rules() {
            return [
                'project_id' => 'required|integer|exists:projects,id',
                'status_id' => 'required|integer|exists:statuses,id',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'priority' => 'integer',
            ];
        }

        public function authorize(): bool {
            return true;
        }
    }

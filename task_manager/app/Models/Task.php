<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasOne;

    class Task extends Model {
        protected $fillable = [
            'project_id',
            'user_id',
            'status_id',
            'title',
            'description',
            'priority',
        ];

        /**
         * @return HasOne
         */
        public function project(): HasOne {
            return $this->hasOne(Project::class, 'id', 'project_id');
        }
        /**
         * @return HasOne
         */
        public function status(): HasOne {
            return $this->hasOne(Status::class, 'id', 'status_id')->withTrashed();
        }

        /**
         * @return HasOne
         */
        public function user(): HasOne {
            return $this->hasOne(User::class, 'id', 'user_id');
        }
    }

<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Project extends Model {
        protected $fillable = [
            'title',
            'description',
        ];

        /**
         * @return HasMany
         */
        public function tasks(): HasMany {
            return $this->hasMany(Task::class);
        }
    }

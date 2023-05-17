<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up() {
            Schema::create('tasks', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable()->index();
                $table->unsignedBigInteger('user_id')->index();
                $table->string('title')->fulltext();
                $table->text('description')->nullable();
                $table->tinyInteger('priority')->default(5);
                $table->unsignedBigInteger('status_id')->default('1')->index();
                $table->timestamps();
            });

            Schema::table('tasks', function(Blueprint $table) {
                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('status_id')->references('id')->on('statuses');
            });
        }

        public function down() {
            Schema::table('tasks', function (Blueprint $table) {
                $table->dropForeign(['project_id']);
                $table->dropForeign(['user_id']);
                $table->dropForeign(['status_id']);
            });
            Schema::dropIfExists('tasks');
        }
    };

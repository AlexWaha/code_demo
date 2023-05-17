<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up() {
            Schema::create('statuses', function (Blueprint $table) {
                $table->id()->index();
                $table->string('name')->fullText();
                $table->softDeletes();
                $table->timestamps();
            });
        }

        public function down() {
            Schema::dropIfExists('statuses');
        }
    };

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id');
            $table->string('ref_no')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('background')->nullable();
            $table->string('sidebar_background')->nullable();
            $table->string('sidebar_size')->nullable();
            $table->string('language')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('companies');
    }
}

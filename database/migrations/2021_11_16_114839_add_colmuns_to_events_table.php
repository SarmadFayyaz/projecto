<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColmunsToEventsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['start', 'end']);
            $table->integer('type')->after('title');
            $table->string('days_of_week')->nullable()->after('type');
            $table->date('start_date')->nullable()->after('days_of_week');
            $table->date('end_date')->nullable()->after('start_date');
            $table->time('start_time')->nullable()->after('end_date');
            $table->time('end_time')->nullable()->after('start_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['type', 'days_of_week', 'start_date', 'end_date', 'start_time', 'end_time']);
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
        });
    }
}

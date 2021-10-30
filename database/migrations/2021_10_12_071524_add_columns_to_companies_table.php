<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCompaniesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('abbreviation')->nullable()->after('name');
            $table->string('logo')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['abbreviation', 'logo']);
        });
    }
}

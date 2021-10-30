<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Form;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        for ($i = 1; $i <= 4; $i++) {
            Form::create([
                'admin_id' => 1,
                'type' => $i,
                'form' => null,
            ]);
        }
    }
}

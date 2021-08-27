<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Company::create([
            'name' => 'Company',
            'email' => 'company@test.com',
            'admin_id' => 1,
            'password' => bcrypt('12345678')
        ]);
    }
}

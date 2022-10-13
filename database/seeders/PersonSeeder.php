<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::create([
            'name' => 'admin',
            'document' => '00000000000000',
            'mobile' => '00000000000',
            'user_id' => 1
        ]);
    }
}

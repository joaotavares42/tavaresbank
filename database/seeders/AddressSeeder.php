<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'address' => 'Rua dos bobos',
            'zipcode' => '00000000',
            'number' => '0',
            'neighborhood' => 'Luz',
            'city' => 'São Paulo',
            'state' => 'SP',
            'person_id' => 1
        ]);
    }
}

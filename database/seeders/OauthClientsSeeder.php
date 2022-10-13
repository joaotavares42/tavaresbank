<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\OauthClient;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OauthClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OauthClient::create([
            'id' => '977e50d3-0663-4c7b-b4d7-ccb33cf34344',
            'user_id' => NULL,
            'name' => 'Laravel Password Grant Client',
            'secret' => 'FWEjKbdnK1DxUCiYxkEQVzFRoHMrR6PvM6a9qZFN',
            'provider' => 'users',
            'redirect' => 'http://localhost',
            'personal_access_client' => '0',
            'password_client' => '1',
            'revoked' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Connection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConnectionsInCommonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Connection::factory()->count(50)->create();
    }
}

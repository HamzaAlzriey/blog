<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name' => 'hamza',
            'email' => 'admin@gmail.com',
            'is_admin' => '1',
            'password' => bcrypt('admin@gmail.com'),
        ]);

        User::factory(20)->create();
    }
}

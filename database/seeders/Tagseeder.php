<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tagseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('tags')->delete();
        // DB::table('tags')->insert([
        // ['name'=>'HTML'],
        // ['name'=>'CSS'],
        // ['name'=>'JS'],
        // ]);
        DB::table('tags')->delete();
        Tag::factory(10)->create();


        
    }
}

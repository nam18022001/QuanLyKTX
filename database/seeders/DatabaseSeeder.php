<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
     for ($i=1; $i<=100 ; $i++) {
        DB::table('tiendien')->update([
            # code...
            'id_phong' => $i++,
    ]);  
        
        # code...
     }

    }
}

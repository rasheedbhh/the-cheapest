<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class storeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert(
            [
                'name' => 'Rammal Supermarket',
                'address' => 'Khalde',
                'manager_id' => 2,
                'phone_number' => '05323436',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'status' => 2

            ]
            );
    }
}

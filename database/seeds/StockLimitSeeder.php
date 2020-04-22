<?php

use Illuminate\Database\Seeder;

class StockLimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stock_limits')->insert([
            'limit'=>10
        ]);
    }
}

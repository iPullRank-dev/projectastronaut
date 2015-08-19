<?php


use Illuminate\Database\Seeder;



class shortUrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table()->insert([
			'email' => str_random(10) . "@company.com",
			'uuid' => rand(45351432,4390157809143902);
			'user_id' => rand(1,500),
			'visited' => rand(0,10),
			'company_id' => rand(1,2500),
			'created_at' => date('Y-m-d G:i:s')
		]);
    }
}

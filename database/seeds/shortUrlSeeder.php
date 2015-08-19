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
		$faker = Faker\Factory::create();

        DB::table('shorturls')->insert([
			'uuid' => $faker->uuid,
			'user_id' => rand(1,500),
			'visited' => rand(0,10),
			'company_id' => rand(1,2500),
			'created_at' => date('Y-m-d G:i:s')
		]);
    }
}

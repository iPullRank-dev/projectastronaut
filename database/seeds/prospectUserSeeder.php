<?php


use Illuminate\Database\Seeder;



class prospectUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prospectusers')->insert([
			'email' => str_random(10) . "@company.com",
			'full_name' => str_random(10). " ". str_random(20),
			'title' => str_random(10) ." of " str_random(20),
			'company' => str_random(20),
			'company_id' => rand(1,500),
			'fc_location_general' => str_random(20),
			'fc_gravatar' => "http://" .str_random(20).".com/images/".str_random(20).".jpg",
			'fc_has_twitter' => "yes",
			'fc_has_facebook' => "yes",
			'created_at' => date('Y-m-d G:i:s')
		]);
    }
}

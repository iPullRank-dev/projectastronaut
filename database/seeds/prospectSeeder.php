<?php


use Illuminate\Database\Seeder;



class prospectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table()->insert([
			'fc_company_name' => str_random(20),
			'fc_logo_url' => "http://".str_random(30)".com/".str_random(15).".jpg",
			'fc_website' => str_random(20)."com",
			'fc_approx_employees' => rand(0,50000),
			'fc_founded' => rand(1900,2015),
			'fc_overview' => str_random(300),
			'fc_address_line1' => rand(1,2999) . " ". str_random(10). " St.",
			'fc_address_line2' => "Suite" . rand (1,4903),
			'fc_address_locality' => str_random(2),
			'fc_address_region_name' => str_random()
			'fc_address_postal_code' => rand(10000,95430),
			'fc_address_country_name' => 'US',
			'created_at' => 'created_at' => date('Y-m-d G:i:s')
	
		]);
    }
}

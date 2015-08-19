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

		$faker = Faker\Factory::create();

		DB::table('prospects')->insert([
			'fc_company_name' => $faker->company,
			'fc_logo_url' => $faker->imageUrl('640', '480', 'cats'),
			'fc_website' => $faker->domainName,  
			'fc_approx_employees' => rand(0,50000),
			'fc_founded' => rand(1900,2015),
			'fc_overview' => $faker->catchPhrase,
			'fc_address_line1' => $faker->streetAddress,
			'fc_address_line2' => $faker->secondaryAddress,
			'fc_address_locality' => $faker->city,
			'fc_address_region_name' => $faker->stateAbbr,
			'fc_address_postal_code' => $faker->postcode,
			'fc_address_country_name' => $faker->country,
			'created_at' => date('Y-m-d G:i:s')
		]);
    }
}

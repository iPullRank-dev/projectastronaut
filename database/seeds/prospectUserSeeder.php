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

	$faker = Faker\Factory::create();

        DB::table('prospectusers')->insert([
			'email' => $faker->companyEmail,
			'full_name' => $faker->name,
			'title' => "Manager of " . $faker->word,
			'company' => $faker->company,
			'company_id' => rand(1,500),
			'fc_location_general' => $faker->city . ", ". $faker->stateAbbr,
			'fc_gravatar' => $faker->imageUrl('640', '480', 'cats'),
			'fc_has_twitter' => "yes",
			'fc_has_facebook' => "yes",
			'created_at' => date('Y-m-d G:i:s')
		]);
    }
}

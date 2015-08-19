<?php


use Illuminate\Database\Seeder;


class prospectScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prospectscores')->insert([
			'company_id' => rand(1,430952),
			'final_score' => rand(0,100),
			'created_at' => date('Y-m-d G:i:s')
		]);
    }
}

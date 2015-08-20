<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


/* 
 * This should expose the table to the database query builder using the namespace Astronaut\Prospects
 * All Query Builder options under "Database" in the Laravel Documentation should be available to this Model under that namespace.
 * 
 * Example for Controllers:
 * $companies = App\Prospects::orderBy('id', 'asc')
               ->get();
 * 
 */
class Prospects extends Model
{
    use SoftDeletes;
	
	protected $dates = ['deleted_at'];	
	protected $fillable = [
		'fc_company_name',
		'fc_logo_url',
		'fc_website',
		'fc_approx_employees',
		'fc_founded','fc_overview',
		'fc_address_line1',
		'fc_address_line2',
		'fc_address_locality',
		'fc_address_line1',
		'fc_address_region_name',
		'fc_address_postal_code',
		'fc_address_country_name',
		'retargeting_script',
	];
}

?>
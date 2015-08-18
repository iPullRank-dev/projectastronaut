<?php
namespace Astronaut;

use Illuminate\Database\Eloquent\Model;


/* 
 * This should expose the table to the database query builder using the namespace Astronaut\ProspectUsers
 * All Query Builder options under "Database" in the Laravel Documentation should be available to this Model under that namespace.
 * 
 * Example for Controllers:
 * $company_users = Astronaut\ProspectUsers::where('company_id', 1)
               ->orderBy('full_name', 'desc')
               ->get();
 * 
 */
class ProspectUsers extends Model
{
    use SoftDeletes;
	
	protected $dates = ['deleted_at'];	
	protected $fillable = ['email','full_name', 'title','company','company_id','fc_location_general','fc_gravatar','fc_has_facebook','fc_has_twitter'];

}

?>
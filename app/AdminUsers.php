<?php
namespace Astronaut;

use Illuminate\Database\Eloquent\Model;


/* 
 * This should expose the table to the database query builder using the namespace Astronaut\AdminUsers
 * All Query Builder options under "Database" in the Laravel Documentation should be available to this Model under that namespace.
 * 
 * Example for Controllers:
 * $valid_logins = Astronaut\AdminUsers::where('activated', 1)
               ->orderBy('username', 'desc')
               ->get();
 * 
 */
class AdminUsers extends Model
{
    use SoftDeletes;
	
	protected $dates = ['deleted_at'];	
	protected $fillable = ['username', 'password','level','activated','failed_logins'];

}

?>
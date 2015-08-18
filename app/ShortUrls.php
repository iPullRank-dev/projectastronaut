<?php
namespace Astronaut;

use Illuminate\Database\Eloquent\Model;


/* 
 * This should expose the table to the database query builder using the namespace Astronaut\ShortUrls
 * All Query Builder options under "Database" in the Laravel Documentation should be available to this Model under that namespace.
 * 
 * Example for Controllers:
 * $user_urls = Astronaut\ShortUrls::where('user_id', 1)
               ->get();
 * 
 */
class ShortUrls extends Model
{
    use SoftDeletes;
	
	protected $dates = ['deleted_at'];	
	protected $fillable = ['company_id','user_id','visited','uuid'];

}

?>
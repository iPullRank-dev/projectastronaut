<?php
namespace Astronaut;

use Illuminate\Database\Eloquent\Model;


/* 
 * This should expose the table to the database query builder using the namespace Astronaut\ProspectScores
 * All Query Builder options under "Database" in the Laravel Documentation should be available to this Model under that namespace.
 * 
 * Example for Controllers:
 * $score_data = Astronaut\ProspectScores::where('company_id', 1)
               ->get();
 * 
 */
class ProspectScores extends Model
{
    use SoftDeletes;
	
	protected $dates = ['deleted_at'];	
	protected $fillable = ['company_id','final_score'];

}

?>
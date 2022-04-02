<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
//Private Composer package
use Shipfusion\Shipfusion;
/**
 * [Model for the user table]
 */
class User extends Model{
   protected $table = 'users';

   protected $fillable = ['name','email','password'];
   /**
    * @return string
    */
   public function getNameAttribute():string
   {
       //Private Composer package method
       return Shipfusion::capitaliseFirstLetter($this->attributes['name']);
   }
   //change the created at to human readable format
    /**
     * @return string
     */
    public function getCreatedAtAttribute():string
    {
         return date('s, F Y', strtotime($this->attributes['created_at']));
    }
    /**
     * @return HasMany
     * [This function will act as relationship between the user and the shipments table]
     */
    public function shipments():HasMany
    {
        return $this->hasMany('App\Models\Shipments','user_id');
    }
}

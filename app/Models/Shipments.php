<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * [Model for the shipments table]
 */
class Shipments extends Model{
    protected $table = 'shipments';
    /**
     * @return BelongsTo
     * [This function will act as relationship between the user and the shipments table]
     */
    public function users():BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}

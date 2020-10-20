<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assets';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'owner_id',
                  'description',
                  'is_active',
                  'value',
                  'currency'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the owner for this model.
     *
     * @return App\Models\Owner
     */
    public function owner()
    {
        return $this->belongsTo('App\Models\Owner','owner_id');
    }



}

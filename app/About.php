<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'about';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hotel_id', 'description', 'rules_of_settlement', 'included_services', 'address', 'territory', 'reconstruction', 'children'];

    /**
     * Get hotel that owns this description.
     */
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}

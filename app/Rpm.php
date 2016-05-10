<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rpm extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ratingpermenit';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'Rpm_ID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Sum_ID', 'Artis_ID', 'Rating', 'Deskripsi'];
    public $timestamps = false;

     public function artist()
    {
        return $this->belongsTo('App\Artist','Artis_ID','Artis_ID');
    }

}

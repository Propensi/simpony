<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
 
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'artists';
    protected $primaryKey = 'Artis_ID';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Artis_ID', 'Nama_Artis'];
    public $timestamps = false;


    public function rpm()
    {
        return $this->hasMany('App\Rpm','Artis_ID','Artis_ID');
    }
}

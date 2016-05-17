<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artprog extends Model
{
    protected $primaryKey = 'artprog_ID';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'artisprograms';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['artprog_ID', 'Prog_ID', 'Artis_ID'];
    public $timestamps = false;


 public function artis()
    {
        return $this->hasMany('App\Artist','Artis_ID','Artis_ID');
    }
}

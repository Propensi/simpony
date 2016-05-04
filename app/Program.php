<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $primaryKey = 'Prog_ID';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'programs';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Prog_ID', 'Prog_Nama', 'Jadwal_Tayang', 'Prog_Deskripsi'];
    public $timestamps = false;

}

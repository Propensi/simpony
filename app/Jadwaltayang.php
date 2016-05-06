<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwaltayang extends Model
{
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jadwaltayangs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'Jadwal_ID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Prog_ID', 'Nama_Program', 'Tanggal', 'Time'];
}

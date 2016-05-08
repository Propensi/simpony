<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $primaryKey = 'Sum_ID';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'summary';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Prog_ID', 'Prog_Nama', 'Average_Rating', 'Tanggal_Sum'];
    public $timestamps = false;
}
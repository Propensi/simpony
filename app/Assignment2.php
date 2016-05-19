<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment2 extends Model
{

    protected $primaryKey = 'Assn_ID';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assignments2';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Assn_ID', 'Staff', 'Sender', 'Prog_ID', 'Tanggal', 'Deskripsi' , 'Dept_ID', 'Sum_ID', 'created_at', 'updated_at', 'Status'];

    public function user()
    {
        return $this->belongsTo('App\User','Sender', 'user_ID');
    }

    public function program()
    {
        return $this->belongsTo('App\Program','Prog_ID', 'Prog_ID');
    }
}

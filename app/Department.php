<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    public $timestamps = false;
    protected $primaryKey = 'Dept_ID';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departments';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Dept_ID', 'Dept_Name'];

    public function users()
    {
        return $this->hasMany('App\User','Dept_ID','Dept_name');
    }

    public function dept()
    {
        return $this->hasMany('App\Assignment','Dept_ID','Dept_ID');
    }
}

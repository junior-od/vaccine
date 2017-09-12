<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    protected $table = 'user_working_hours';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'from', 'to', 'wage_per_hour'
    ];

}

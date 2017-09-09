<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaccinatedChild extends Model
{
    protected $table = 'vaccinated_children';

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
        'child_first_name', 'child_last_name', 'child_age', 'guardian_first_name', 'guardian_last_name', 'contact_phone', 'address', 'sex', 'vaccine_name', 'reported_by'
    ];

}

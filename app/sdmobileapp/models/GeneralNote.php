<?php

namespace App\sdmobileapp\models;

use Illuminate\Database\Eloquent\Model;

class GeneralNote extends Model
{
    /** @lang text */
    protected $table =
        "sd_general_notes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
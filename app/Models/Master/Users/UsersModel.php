<?php

namespace App\Models\Master\Users;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    //

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email'
    ];
}

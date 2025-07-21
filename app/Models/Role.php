<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role {

    const ROLE_ADMINISTRATOR = 1;
    const ROLE_OWNER = 2;
    const ROLE_USER = 3;
    protected $fillable = [
        'name'
    ];
}

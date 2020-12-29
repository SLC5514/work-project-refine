<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
//    protected $table = 'roles';

    public function createdBy(){
        return $this->belongsTo('App\User','created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\User','updated_by');
    }

}

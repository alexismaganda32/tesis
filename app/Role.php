<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $hidden = [
        'status', 'created_at', 'updated_at',
    ];

    public function scopeSearchByName($query, $name)
    {
        return $query->where('name', 'like', $name.'%');
    }
}

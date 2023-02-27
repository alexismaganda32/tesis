<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SafeControl extends Model
{
    protected $table = 'safe_control';

    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'] = date('d-m-Y', strtotime($this->attributes['created_at']));
    }

    public function scopeSearch($query, $name, $fecha_inicio, $fecha_fin)
    {
        if (trim($name) != "") {
    		$query = $query->where('name', 'like', '%'.$name.'%');
        }

        if (trim($fecha_inicio) != "" && trim($fecha_fin) != "") {
            $fecha_inicio = date('Y-m-d', strtotime($fecha_inicio)).' 00:00:00';
            $fecha_fin = date('Y-m-d', strtotime($fecha_fin)).' 23:59:59';

            $query = $query->whereBetween('created_at', [$fecha_inicio, $fecha_fin]);
        }

        return $query;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pressures extends Model
{
    protected $fillable=['name','dp','sp'];
    protected $table='pressures';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

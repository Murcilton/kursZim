<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $table = 'destinations';
    protected $fillable = ['name', 'ship_id'];

    public function ship()
    {
        return $this->hasOne(Ship::class);
    }

}

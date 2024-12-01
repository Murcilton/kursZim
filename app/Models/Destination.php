<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $table = 'destinations';
    protected $fillable = ['name', 'ship_id', 'departure_id', 'nights', 'date'];

    public function ship()
    {
        return $this->hasOne(Ship::class);
    }

    public function departure()
    {
        return $this->belongsTo(Departure::class);
    }
}

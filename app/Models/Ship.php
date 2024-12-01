<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;
    protected $table = 'ships';
    protected $fillable = ['name', 'destination_id', 'departure_id'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function departure()
    {
        return $this->belongsTo(Departure::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    use HasFactory;
    protected $table = 'departures';

    protected $fillable = ['name', 'ship_id'];

    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }

}

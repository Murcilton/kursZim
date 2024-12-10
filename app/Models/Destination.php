<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $table = 'destinations';
    protected $fillable = ['name', 'description', 'ship_id', 'img'];

    public function ship()
    {
        return $this->belongsTo(Ship::class, 'ship_id');
    }
    public function getImage(){
        if (!$this->img) {
            return asset('storage/img/no-image.gif');
        } else {
            return asset("storage/{$this->img}");
        }
    }
}

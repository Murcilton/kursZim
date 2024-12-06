<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $table = 'destinations';
    protected $fillable = ['name', 'ship_id', 'img'];

    public function ship()
    {
        return $this->hasOne(Ship::class);
    }
    public function getImage(){
        if (!$this->img) {
            return asset('assets\front\img\no-image.png');
        } else {
            return asset("storage/{$this->img}");
        }
    }
}

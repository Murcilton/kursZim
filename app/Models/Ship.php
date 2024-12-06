<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;
    protected $table = 'ships';
    protected $fillable = ['name', 'description', 'img'];
    public function getImage(){
        if (!$this->img) {
            return asset('assets\front\img\no-image.png');
        } else {
            return asset("storage/{$this->img}");
        }
    }
}

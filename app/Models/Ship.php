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
            return asset('storage/img/no-image.gif');
        } else {
            return asset("storage/{$this->img}");
        }
    }
}

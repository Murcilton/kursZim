<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CruiseOrder extends Model
{
    use HasFactory;
    protected $table = 'cruise_order';
    protected $fillable = ['title', 'description', 'image', 'nights', 'date_id', 'nights', 'departure_id', 'destination_id', 'ship_id', 'hit', 'sale', 'price', 'status'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function departure()
    {
        return $this->belongsTo(Departure::class);
    }

    public function date()
    {
        return $this->belongsTo(Date::class);
    }

    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getImage(){
        if (!$this->img) {
            return asset('storage/img/no-image.gif');
        } else {
            return asset("storage/{$this->img}");
        }
    }
}

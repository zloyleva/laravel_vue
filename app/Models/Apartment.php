<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Apartment extends Model
{
    protected $fillable = [
        "name", "price", "bedrooms", "bathrooms", "storeys", "garages"
    ];

    public function getAll(Request $request){
        return $this->all();
    }
}

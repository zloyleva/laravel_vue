<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index(Request $request, Apartment $apartment){
        return  $this->jsonResponse(['data' => $apartment->getAll($request)]);
    }
}

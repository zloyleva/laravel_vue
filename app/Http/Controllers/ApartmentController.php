<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * @param Request $request
     * @param Apartment $apartment
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, Apartment $apartment){
        return  $this->jsonResponse(['data' => $apartment->getAll($request)]);
    }
}

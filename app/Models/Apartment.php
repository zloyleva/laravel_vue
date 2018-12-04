<?php

namespace App\Models;

use App\Models\Traits\Search;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Apartment extends Model
{
    use Search;

    protected $fillable = [
        "name", "price", "bedrooms", "bathrooms", "storeys", "garages"
    ];

    protected $searchable = [
        "name"
    ];

    protected $filterable = [
        "price", "bedrooms", "bathrooms", "storeys", "garages"
    ];

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll(Request $request){
        $query = $this->query();

        if(isset($request->search)){
            $this->addSearch($query, $request->search, $this->searchable);
        }

        return $query->get();
    }
}

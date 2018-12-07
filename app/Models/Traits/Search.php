<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait Search
{

    /**
     * @param Builder $query
     * @param $request
     * @param array|null $fields
     */
    public function addSearch(Builder $query, $request, array $fields=null)
    {
        if (!isset($request->search) || !$fields){
            return;
        }

        $search = $request->search;

        $query->where(function ($query) use ($fields,$search) {
            foreach ($search as $key => $value) {
                if(in_array($key,$fields)){
                    $query->where($key, 'like', "%{$value}%");
                }
            }
        });
    }
}

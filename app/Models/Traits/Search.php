<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait Search
{

    /**
     * @param Builder $query
     * @param string|null $search
     * @param array|null $fields
     */
    public function addSearch(Builder $query, array $search = null, array $fields=null)
    {
        if (!$search || !$fields) {
            return;
        }

        $query->where(function ($query) use ($fields,$search) {
            foreach ($search as $key => $value) {
                if(in_array($key,$fields)){
                    $query->where($key, 'like', "%{$value}%");
                }
            }
        });
    }
}

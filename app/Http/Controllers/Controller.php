<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function jsonResponse($defaultResponse, $status = 200)
    {
        if (is_array($defaultResponse)) {
            $defaultResponse = $this->wrapArrayInData($defaultResponse);
        } elseif ($defaultResponse instanceof Model || $defaultResponse instanceof Collection || $defaultResponse instanceof SCollection) {
            $defaultResponse = $this->wrapArrayInData($defaultResponse->toArray());
        } elseif (is_bool($defaultResponse) || is_int($defaultResponse)) {
            $defaultResponse = ['data' => $defaultResponse];
        } elseif ($defaultResponse instanceof ExceptionResponse) {
            $status = $defaultResponse->code;
            $errors = $defaultResponse->exception;
            $defaultResponse = ['message' => $defaultResponse->message];

            if ($errors) {
                $defaultResponse['errors'] = $errors;
            }
        }

        return response()->json($defaultResponse, $status);
    }

    protected function wrapArrayInData(array $array): array
    {
        if (!array_key_exists('data', $array) && !array_key_exists('message', $array)) {
            $array = ['data' => $array];
        }

        return $array;
    }
}

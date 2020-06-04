<?php
namespace App\Traits\v1;

use Illuminate\Http\Request;
use Validator;

trait AuthorTrait
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function validateCreateRequest(Request $request){
        $rules = [
            'name' => 'required|string|unique:author,name',
        ];

        return Validator::make($request->all(), $rules);
    }

    public function getCreateParams(Request $request)
    {
        $parameters = [];

        if ($request->has('name')) {
            $parameters['name'] = $request->input('name');
        }
        return $parameters;
    }
}

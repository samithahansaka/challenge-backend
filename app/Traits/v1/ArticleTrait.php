<?php
namespace App\Traits\v1;

use Illuminate\Http\Request;
use Validator;

trait ArticleTrait{
    /**
     * @param Request $request
     * @return mixed
     */
    public function validateCreateRequest(Request $request){
        $rules = [
            'author_id' => 'required|string|exists:author,id',
            'title' => 'required|string',
            'url' => 'required|string|unique:article,url',
            'content'=> 'required|string'
        ];

        $messages = [
            'exists' => ':attribute does not exists.'
        ];

        return Validator::make($request->all(), $rules, $messages);
    }

    public function getCreateParams(Request $request){
        $parameters = [];

        if ($request->has('author_id')){
            $parameters['author_id'] = $request->input('author_id');
        }

        if ($request->has('title')){
            $parameters['title'] = $request->input('title');
        }

        if ($request->has('url')){
            $parameters['url'] = $request->input('url');
        }

        if ($request->has('content')){
            $parameters['content'] = $request->input('content');
        }
        return $parameters;
    }
}

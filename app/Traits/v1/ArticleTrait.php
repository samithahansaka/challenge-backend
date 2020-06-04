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

    /**
     * @param Request $request
     * @return array
     */
    public function getCreateUpdateParams(Request $request){
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

    /**
     * @param $articleId
     * @return mixed
     */
    public function validateGetArticleReq($articleId){
        $rules = [
            'id' => 'required|string|exists:article,id',
        ];

        $messages = [
            'exists' => 'Requested article is not exist'
        ];

        return Validator::make(["id" => $articleId], $rules, $messages);
    }

    /**
     * @param Request $request
     * @param $articleId
     * @return mixed
     */
    public function validateUpdateReq(Request $request, $articleId){
        $rules = [
            'articleId' => 'required|string|exists:article,id',
            'author_id' => 'string|exists:author,id',
            'title' => 'string',
            'url' => 'string|unique:article,url',
            'content' => 'string'
        ];

        $messages = [
            'unique' => 'Please enter valid author',
            'exists' => 'Requested article is not exist'
        ];

        $validations = array_merge(["articleId" => $articleId], $request->all());

        return Validator::make($validations, $rules, $messages);
    }

    /**
     * @param $articleId
     * @return mixed
     */
    public function validateDeleteArticleReq($articleId){
        $rules = [
            'id' => 'required|string|exists:article,id',
        ];

        $messages = [
            'exists' => 'No such article exists'
        ];

        return Validator::make(["id" => $articleId], $rules, $messages);
    }
}

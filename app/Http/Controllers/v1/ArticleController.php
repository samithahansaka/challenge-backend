<?php
namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Services\APIService;
use App\Services\ArticleService;
use App\Traits\v1\ArticleTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Exception;
use Log;

class ArticleController extends Controller
{
    use ArticleTrait;

    protected $apiService;
    protected $articleService;

    /**
     * AuthorController constructor
     * @param APIService $apiService
     * @param ArticleService $articleService
     */
    public function __construct(APIService $apiService, ArticleService $articleService)
    {
        $this->apiService = $apiService;
        $this->articleService = $articleService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function create(Request $request){
        try {
            $validator = $this->validateCreateRequest($request);
            if ($validator->fails()) {
                return $this->apiService->respondError($validator->errors()->toArray(), 422, 102);
            }
            $parameters = $this->getCreateParams($request);
            if (!count($parameters)) {
                throw new Exception('Nothing to create !');
            }
            $this->articleService->create($parameters);
            $message = 'Article created successfully !';
            return $this->apiService->respond($message);
        } catch (Exception $exception) {
            Log::error($exception);
            $statusCode = $exception->getCode() ? $exception->getCode() : 500;
            return $this->apiService->respondError($exception->getMessage(), $statusCode);
        }
    }
}
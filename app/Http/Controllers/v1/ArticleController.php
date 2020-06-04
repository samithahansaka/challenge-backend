<?php
namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Transformers\ArticleTransformer;
use App\Services\APIService;
use App\Services\ArticleService;
use App\Traits\v1\ArticleTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Exception;
use Illuminate\Http\Response;
use League\Fractal\Manager;
use Log;

class ArticleController extends Controller
{
    use ArticleTrait;

    private $apiService;
    private $articleService;
    private $manager;
    private $articleTransformer;

    /**
     * AuthorController constructor
     * @param APIService $apiService
     * @param ArticleService $articleService
     * @param Manager $manager
     * @param ArticleTransformer $articleTransformer
     */
    public function __construct(APIService $apiService, ArticleService $articleService, Manager $manager, ArticleTransformer $articleTransformer)
    {
        $this->apiService = $apiService;
        $this->articleService = $articleService;
        $this->manager = $manager;
        $this->articleTransformer = $articleTransformer;
    }

    /**
     * @return JsonResponse
     */
    public function index(){
        try{
            $articles = $this->transformCollection($this->articleService->get(), $this->articleTransformer, $this->manager);
            return $this->apiService->respond($articles);
        }catch (Exception $exception){
            Log::error($exception);
            $statusCode = $exception->getCode() ? $exception->getCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
            return $this->apiService->respondError($exception->getMessage(), $statusCode);
        }
    }

    /**
     * @param $article
     * @return JsonResponse
     */
    public function show($article){
        try{
            $validator = $this->validateGetArticleReq($article);
            if ($validator->fails()) {
                return $this->apiService->respondError($validator->errors()->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY, 102);
            }
            $article = $this->transformSingleData($this->articleService->getOne($article), $this->articleTransformer);
            return $this->apiService->respond($article);
        }catch (Exception $exception){
            Log::error($exception);
            $statusCode = $exception->getCode() ? $exception->getCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
            return $this->apiService->respondError($exception->getMessage(), $statusCode);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request){
        try {
            $validator = $this->validateCreateRequest($request);
            if ($validator->fails()) {
                return $this->apiService->respondError($validator->errors()->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY, 102);
            }
            $parameters = $this->getCreateUpdateParams($request);
            if (!count($parameters)) {
                throw new Exception('Nothing to create !');
            }
            $this->articleService->create($parameters);
            $message = 'Article created successfully !';
            return $this->apiService->respond($message);
        } catch (Exception $exception) {
            Log::error($exception);
            $statusCode = $exception->getCode() ? $exception->getCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
            return $this->apiService->respondError($exception->getMessage(), $statusCode);
        }
    }

    /**
     * @param Request $request
     * @param $article
     * @return JsonResponse
     */
    public function update(Request $request, $article){
        try {
            $validator = $this->validateUpdateReq($request, $article);
            if ($validator->fails()) {
                return $this->apiService->respondError($validator->errors()->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY, 102);
            }
            $parameters = $this->getCreateUpdateParams($request);
            if (!count($parameters)) {
                throw new Exception('Nothing to update !');
            }
            $this->articleService->update($article, $parameters);
            $message = 'Article updated successfully !';
            return $this->apiService->respond($message);
        } catch (Exception $exception) {
            Log::error($exception);
            $statusCode = $exception->getCode() ? $exception->getCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
            return $this->apiService->respondError($exception->getMessage(), $statusCode);
        }
    }

    /**
     * @param $article
     * @return JsonResponse
     */
    public function delete($article){
        try{
            $validator = $this->validateDeleteArticleReq($article);
            if ($validator->fails()) {
                return $this->apiService->respondError($validator->errors()->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY, 102);
            }
            $this->articleService->delete($article);
            $message = 'Article deleted successfully !';
            return $this->apiService->respond($message);
        }catch (Exception $exception){
            Log::error($exception);
            $statusCode = $exception->getCode() ? $exception->getCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
            return $this->apiService->respondError($exception->getMessage(), $statusCode);
        }
    }
}

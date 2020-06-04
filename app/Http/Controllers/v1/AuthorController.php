<?php
namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Services\APIService;
use App\Services\AuthorService;
use App\Traits\v1\AuthorTrait;
use Illuminate\Http\Request;

use Exception;
use Log;

class AuthorController extends Controller
{
    use AuthorTrait;

    protected $apiService;
    protected $authorService;

    /**
     * AuthorController constructor
     * @param APIService
     * @param AuthorService $authorService
     */
    public function __construct(APIService $apiService, AuthorService $authorService)
    {
        $this->apiService = $apiService;
        $this->authorService = $authorService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function create(Request $request){
        try {
            $validator = $this->validateCreateRequest($request);
            if ($validator->fails()) {
                return $this->apiService->respondError($validator->errors()->toArray(), 422, 102);
            }
            $parameters = $this->getCreateParams($request);
            if (empty($parameters['name'])) {
                throw new Exception('Nothing to create !');
            }
            $this->authorService->create($parameters);
            $message = 'Author created successfully !';
            return $this->apiService->respond($message);
        } catch (Exception $exception){
            Log::error($exception);
            $statusCode = $exception->getCode() ? $exception->getCode() : 500;
            return $this->apiService->respondError($exception->getMessage(), $statusCode);
        }
    }
}

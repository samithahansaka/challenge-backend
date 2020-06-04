<?php

namespace App\Services;

use Illuminate\Http\Response;

class APIService
{
    protected $success_status_string = 'success';
    protected $fail_status_string = 'fail';
    protected $data;
    protected $status_code = Response::HTTP_OK;
    protected $error_code;

    /**
     * APIService constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return array
     */
    private function getStructuredRespondData()
    {
        return [
            'data' => $this->getData(),
            'status' => $this->getStatusCode(),
            'status_string' => $this->getStatusString()
        ];
    }

    /**
     * @return array
     */
    private function getStructuredErrorRespondData()
    {
        return [
            'errors' => ((is_array($this->getData())) ? $this->getData() : [$this->getData()]),
            'status' => $this->getStatusCode(),
            'status_string' => $this->getStatusString()
        ];
    }


    /**
     * @return string
     */
    private function getStatusString()
    {
        return $this->getStatusCode() == Response::HTTP_OK ? $this->success_status_string : $this->fail_status_string;
    }

    /**
     * @return mixed
     */
    private function getData()
    {
        return $this->data;
    }

    /**
     * @return int
     */
    private function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * @param $status_code
     */
    private function setStatusCode($status_code)
    {
        $this->status_code = $status_code;
    }

    /**
     * @param $data
     */
    private function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @param $error_code
     */
    public function setErrorCode($error_code)
    {
        $this->error_code = $error_code;
    }


    /**
     * @param null $data
     * @param int $status_code
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data = null, $status_code = Response::HTTP_OK)
    {
        $this->setData($data);
        $this->setStatusCode($status_code);
        return response()->json($this->getStructuredRespondData(), $status_code);
    }

    /**
     * @param null $data
     * @param int $status_code
     * @param null $error_code
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondError($data = null, $status_code = Response::HTTP_OK, $error_code = null)
    {
        $this->setData($data);
        $this->setStatusCode($status_code);
        $this->setErrorCode($error_code);
        return response()->json($this->getStructuredErrorRespondData(), $status_code);
    }
}

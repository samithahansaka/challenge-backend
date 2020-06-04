<?php

namespace App\Services;

use App\Interfaces\CreateServiceInterface;
use App\Interfaces\ValidateServiceInterface;
use App\Repositories\AuthorRepository;
use App\Traits\v1\AuthorTrait;

class AuthorService extends MainService implements CreateServiceInterface, ValidateServiceInterface
{
    use AuthorTrait;

    protected $authorRepository;

    /**
     * AuthorService constructor.
     * @param AuthorRepository $authorRepository
     */
    public function __construct(AuthorRepository $authorRepository)
    {
        parent::__construct();
        $this->authorRepository = $authorRepository;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function create(array $parameters)
    {
        return $this->authorRepository->insert($parameters);
    }

    public function validate($parameters, $request)
    {
        // TODO: Implement validate() method.
    }
}

<?php

namespace App\Services;

use App\Interfaces\CreateServiceInterface;
use App\Repositories\AuthorRepository;

class AuthorService extends MainService implements CreateServiceInterface
{
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
}

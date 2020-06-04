<?php

namespace App\Repositories;

use App\Author;
use App\Interfaces\RepositoryInterface;

class AuthorRepository extends MainRepository implements RepositoryInterface
{
    /**
     * VehicleRepository constructor.
     * @param Author $author
     */
    public function __construct(Author $author)
    {
        parent::__construct($author);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function getAuthor(array $parameters)
    {
        $records = $this->model->select('id', 'name');
        if (!empty($parameters['id'])) {
            $records = $records->where("id", $parameters['id']);
        }
        return $records->get();
    }
}

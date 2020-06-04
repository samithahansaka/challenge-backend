<?php
namespace App\Services;

use App\Interfaces\CreateServiceInterface;
use App\Interfaces\DataRetrieveServiceInterface;
use App\Interfaces\DeleteServiceInterface;
use App\Interfaces\UpdateServiceInterface;

class ArticleService extends MainService implements DataRetrieveServiceInterface, CreateServiceInterface, DeleteServiceInterface, UpdateServiceInterface{

    public function create(array $parameters)
    {
        // TODO: Implement create() method.
    }

    public function get()
    {
        // TODO: Implement get() method.
    }

    public function getOne($id)
    {
        // TODO: Implement getOne() method.
    }

    public function delete($identifications)
    {
        // TODO: Implement delete() method.
    }

    public function update($identifications, array $parameters)
    {
        // TODO: Implement update() method.
    }
}

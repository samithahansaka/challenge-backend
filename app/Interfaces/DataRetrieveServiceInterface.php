<?php
namespace App\Interfaces;

interface DataRetrieveServiceInterface
{

    /**
     * Interface for data retrieve by parameters set
     * @param array $parameters
     * @return mixed
     */
    public function get(array $parameters);
}

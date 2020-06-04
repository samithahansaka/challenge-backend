<?php
namespace App\Interfaces;

interface DataRetrieveServiceInterface
{
    public function get();

    public function getOne($id);
}

<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

class Controller extends BaseController
{
    /**
     * @param $object
     * @param TransformerAbstract $transformerAbstract
     * @return mixed
     */
    protected function transformSingleData($object, TransformerAbstract $transformerAbstract){
        return $transformerAbstract->transform($object);
    }

    /**
     * @param $collection
     * @param TransformerAbstract $transformerAbstract
     * @param Manager $manager
     * @return array
     */
    protected function transformCollection($collection, TransformerAbstract $transformerAbstract, Manager $manager){
        return $manager->createData(new Collection($collection, $transformerAbstract))->toArray();
    }
}

<?php
namespace App\Services;

use App\Interfaces\CreateServiceInterface;
use App\Interfaces\DataRetrieveServiceInterface;
use App\Interfaces\DeleteServiceInterface;
use App\Interfaces\UpdateServiceInterface;
use App\Repositories\ArticleRepository;

use Config;

class ArticleService extends MainService implements DataRetrieveServiceInterface, CreateServiceInterface, DeleteServiceInterface, UpdateServiceInterface{

    protected $articleRepository;

    /**
     * ArticleService constructor.
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        parent::__construct();
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function create(array $parameters)
    {
        $parameters['createdAt'] = date(Config::get('constants.date_options.save_date_format'));
        $parameters['updatedAt'] = date(Config::get('constants.date_options.save_date_format'));
        $this->articleRepository->create($parameters);
    }

    public function get()
    {
        // TODO: Implement get() method.
    }

    public function getOne($id)
    {
        // TODO: Implement getOne() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function update($id, array $parameters)
    {
        // TODO: Implement update() method.
    }
}

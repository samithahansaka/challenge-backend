<?php
namespace App\Interfaces;

interface RepositoryInterface
{
    public function all(array $data);

    public function show($id, array $data);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);
}

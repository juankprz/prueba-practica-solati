<?php
namespace Dao\Repository;

interface Repository{
    public function all();
    public function create(array $data);
    public function delete($id);
    public function update(array $data,$id);
    public function find($id);
}
<?php

namespace App\Managers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Manager Interface implemented by all manager
 */
interface IManager
{
    /**
     * Create item in database
     *
     * @param array $data
     *
     */
    public function save(array $data);

    /**
     * Delete
     *
     * @param integer $id
     */
    public function remove(int $id);


    /**
     * Return List
     */
    public function getList();
}

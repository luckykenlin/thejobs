<?php

namespace App\Contracts\Base;
/**
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/5/23
 * Time: 15:27
 */
interface BaseRepository
{
    /**
     * Fetch Records by page info.
     * Search Columns :  Key : column's name, Value : search value
     * Order Columns : Key : column's name, Value : ordering type ("asc", or "desc")
     *
     * @param array $pageInfo
     * @param array $filterColumn
     * @param array $orderColumn
     * @param array $searchColumn
     * @param array $eagerLoading
     * @return array
     * @internal param int $pageSize
     */
    public function fetch($pageInfo = [], $filterColumn = [], $orderColumn = [], $searchColumn = [], $eagerLoading = []);

    /**
     * Fetch Records by Id
     * Search Columns :  Key : column's name, Value : search value
     * Order Columns : Key : column's name, Value : ordering type ("asc", or "desc")
     *
     * @param int $pageSize
     * @param $id
     * @param array $searchColumn
     * @param array $orderColumn
     * @return array
     */
    public function fetchById($pageSize , $id , $searchColumn = [] , $orderColumn = []);

    /** Create Table Record
     * @param $id
     * @return true of false
     */
    public function create();

    /** Update info
     * @param $data array[]
     * @param $id
     * @return mixed
     */
    public function update($data , $id);

    /** Save Info
     * @param $data
     * @return mixed
     */
    public function save($data);

    /** Delete  Record
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /** Find  Info By Id
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function find($id);

    /** Delete Records
     * @param Request $request
     * @return bool
     */
    public function deleteGroup(array $data);
}
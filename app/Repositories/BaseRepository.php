<?php
/**
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/5/27
 * Time: 5:42
 */

namespace App\Repositories;
use \App\Contracts\Base\BaseRepository as BaseRepositoryImpl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class BaseRepository implements BaseRepositoryImpl
{
    /**
     * Fetch User users by page info.
     * Search Columns :  Key : column's name, Value : search value
     * Order Columns : Key : column's name, Value : ordering type ("asc", or "desc")
     *
     * @param int $pageSize
     * @param array $searchColumn
     * @param array $orderColumn
     * @return array
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Fetch page object by table's name , page size, searching info ,and ordering info;
     *
     * $modelClass : The  Class Name of eloquent model.
     * Page Info : page num and page size.
     * Filter Columns : Key : column's name, Value : filter value.
     * Search Columns :  Key : column's name, Value : search value
     * Order Columns : Key : column's name, Value : ordering type ("asc", or "desc")
     * Eager Loading : Eager Loading attributes;
     *
     * @param $modelClass
     * @param array $pageInfo
     * @param array $searchColumn
     * @param array $orderColumn
     * @param array $filterColumn
     * @param array $eagerLoading
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Collection
     */
    public function fetch($pageInfo = [], $filterColumn = [], $orderColumn = [], $searchColumn = [], $eagerLoading = [])
    {
        Log::debug(get_class($this) . "::fetch => Fetch page object by table's name , page size, searching info ,and ordering info;");
        $query = $this->model::whereRaw("1=1");

        if (sizeof($filterColumn) > 0) {
            $query->where(function ($q) use ($filterColumn) {
                foreach ($filterColumn as $column => $filter) {
                    if (strpos($column, ".") !== false) {
                        $relationColumn = explode(".", $column);
                        $q->whereHas($relationColumn[0], function ($relateQuery) use ($relationColumn, $filter) {
                            $this->generateCriteria($relateQuery, $relationColumn[1], $filter);
                        });
                    } else {
                        $this->generateCriteria($q, $column, $filter);
                    }
                }
            });
        }

        if (sizeof($searchColumn) > 0) {
            $query->where(function ($q) use ($searchColumn) {
                foreach ($searchColumn as $column => $search) {
                    if (strpos($column, ".") !== false) {
                        $relationColumn = explode(".", $column);
                        $q->orWhereHas($relationColumn[0], function ($relateQuery) use ($relationColumn, $search) {
                            $relateQuery->where($relationColumn[1], "like", $search . "%");
                        });
                    } else {
                        $q->orWhere($column, "like", $search . "%");
                    }
                }
            });
        }

        if (sizeof($eagerLoading) > 0) {
            foreach ($eagerLoading as $value) {
                $query = $query->with($value);
            }
        }

        if (sizeof($orderColumn) > 0) {
            foreach ($orderColumn as $column => $dir) {
                $query->orderBy($column, $dir);
            }
        } else {
            $query->orderBy("updated_at", "desc");
        }

        if (array_get($pageInfo, "pageSize")) { // if the page info exists , then fetch the pagination info.
            $pageSize = $pageInfo["pageSize"];
            $result = $query->paginate($pageSize);
        } else {
            $result = $query->get();
        }

        return $result;
    }

    /**
     * @param $q
     * @param $filter
     * @param $column
     */
    protected function generateCriteria(&$q, $column, $filter)
    {
        if (is_array($filter)) {
            $operation = $filter["operation"];
            $value = $filter["value"];
            if ("is null" == $operation || null == $value) {
                $q->whereNull($column);
            } else if ("in" == $operation && is_array($value)) {
                $q->whereIn($column, $value);
            } else if ("not in" == $operation && is_array($value)) {
                $q->whereNotIn($column, $value);
            } else if ("between" == $operation && is_array($value)) {
                $q->whereBetween($column, $value);
            } else {
                $q->where($column, $operation, $value);
            }
        } else {
            if (null == $filter) {
                $q->whereNull($column, $filter);
            } else {
                $q->where($column, "=", $filter);
            }
        }
    }

    public function fetchById($pageSize , $id , $searchColumn = [] , $orderColumn = [])
    {
        return $this->model->where('user_id', '=', $id)->paginate($pageSize);
    }

    /** Create Table Record
     * @param $id
     * @return true of false
     */
    public function create()
    {

    }

    /** Update info
     * @param $data array[]
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
        $model = $this->model->findOrFail($id);
        return $model->update($data);
    }

    /** Save Info
     * @param $data
     * @return mixed
     * @internal param $id
     */
    public function save($data)
    {
    ///
    }
    /** Delete User
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->model->where('id' , $id)->delete();
    }

    /** Find User Info By Id
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /** Delete records
     * @param Request $request
     * @return bool
     */
    public function deleteGroup(array $data)
    {
        foreach ($data['cboxid'] as $item) {
             $this->model->where('id' , $item)->delete();
        }
    }

    public function validator(array $data)
    {

    }
}
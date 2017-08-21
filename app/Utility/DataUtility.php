<?php
/**
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/8/13
 * Time: 18:49
 */

namespace App\Utility;



use App\Contracts\Constant;
use Illuminate\Support\Facades\Session;

class DataUtility
{
    /**
     * @param $dataTableParameters
     * @return array
     */
    public static function searchColumn($dataTableParameters)
    {
        $searchArray = [];
        $columns = $dataTableParameters["columns"];
        $search = $dataTableParameters["search"]["value"];
        if ($search) {
            foreach ($columns as $column) {
                if ($column["searchable"] == "true") {
                    $key = $column["data"];
                    if (str_contains($column["data"], ".")) {
                        $columnsArr = explode(".", $column["data"]);
                        $modelName = $columnsArr[0];
                        $modelAttribute = $columnsArr[1];
                        if (str_contains($modelName, "_")) {// if the model name container underscore, then transform to camel formation.
                            $modelNameArr = explode("_", $modelName);
                            $modelName = $modelNameArr[0] . ucfirst($modelNameArr[1]);
                        }
                        $key = $modelName . "." . $modelAttribute;
                    }
                    $searchArray[$key] = $search;
                }
            }
        }
        return $searchArray;
    }

    /**
     * @param $dataTableParameters
     * @return array
     */
    public static function orderColumn($dataTableParameters)
    {
        $orderColumn = [];
        if (array_key_exists("order", $dataTableParameters)) {
            $orderArray = $dataTableParameters["order"];
            $columns = $dataTableParameters["columns"];
            foreach ($orderArray as $order) {
                $columnName = $columns[$order["column"]]["data"];
                $orderColumn[$columnName] = $order["dir"];
            }

        }
        return $orderColumn;
    }

    /**
     * @param $defaultPageSize
     * @param $data
     * @return array
     */
    public static function pageInfo($defaultPageSize ,$data)
    {
        $pageInfo = [];

        if (isset($defaultPageSize))
            $pageInfo['pageSize'] = $defaultPageSize;

        if (array_key_exists("pageSize", $data))
            $pageInfo['pageSize'] = $data['pageSize'];

        if (array_key_exists("page", $data))
             $pageInfo['page'] = $data['page'];

        if (array_key_exists("show", $data))
        {
            Session::flash('show', $data['show']);
            $pageInfo['show'] = $data['show'];
        }

        return $pageInfo;
    }

    /**
     * @param $pageInfo
     * @param $pathUrl
     * @return array
     */
    public static function pathUrl($pageInfo, $pathUrl)
    {
        $pathUrl = $pathUrl.'?';
        for (; $value = current($pageInfo); next($pageInfo))
        {
            if (key($pageInfo) != 'page')  {
                $pathUrl = $pathUrl . key($pageInfo) . "=" . $value;
                if(last($pageInfo) != $value ) $pathUrl  = $pathUrl.'&';
            }
        }
        return $pathUrl;
    }

    /**
     * @param $job_type
     * @return array
     * @internal param $jobType
     */
    public static function jobType($job_type)
    {
        $jobType = [];
        switch ($job_type){
            case Constant::JOB_TYPE['FULL_TIME']:
                $jobType['lable_style'] = 'label label-success';
                $jobType['lable'] = 'FULL_TIME';
                break;
            case Constant::JOB_TYPE['PART_TIME']:
                $jobType['lable_style'] = 'label label-warning';
                $jobType['lable'] = 'PART_TIME';
                break;
            case Constant::JOB_TYPE['INTERNSHIP']:
                $jobType['lable_style'] = 'label label-danger';
                $jobType['lable'] = 'INTERNSHIP';
                break;
            case Constant::JOB_TYPE['FREELANCE']:
                $jobType['lable_style'] = 'label label-info';
                $jobType['lable'] = 'FREELANCE';
                break;
            case Constant::JOB_TYPE['REMOTE']:
                $jobType['lable_style'] = 'label label-success';
                $jobType['lable'] = 'label label-success';
                break;
        }
        return $jobType;
    }
}
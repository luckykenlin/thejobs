<?php

namespace App\Utility;

/**
 * Created by Jianfeng Li.
 * User: Jianfeng Li
 * Date: 2017/4/28
 */
class DataTableUtility
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
}
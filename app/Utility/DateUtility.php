<?php

namespace App\Utility;

use Carbon\Carbon;

class DateUtility
{
    public static function timemaker($timestamp,$current_time=0){
        $timestamp = strtotime($timestamp);
        if(!$current_time) $current_time = time();
        $span=$current_time-$timestamp;
        if($span<60){
            return "just now";
        }else if($span<3600){
            return intval($span/60).($span<120? " min ago" : " mins ago");
        }else if($span<24*3600){
            return intval($span/3600).($span<7200? " hour ago" : " hours ago");
        }else if($span<(7*24*3600)){
            return intval($span/(24*3600)).($span<48*3600? " day ago" : " days ago");
        }else{
            return date('Y-m-d',$timestamp);
        }
    }
}
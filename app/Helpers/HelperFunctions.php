<?php

function employeeSchedule($schedules = array(), $check_date, $schedule_id){
    $schedule_name = date('l',strtotime($check_date));
    if(count($schedules) > 0){
        foreach($schedules as $item){
            if($item['schedule_id'] == $schedule_id && $item['name'] == $schedule_name){
                return $item;
            }
        }
    }
}



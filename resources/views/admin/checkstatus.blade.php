<?php


if(date('Y-m-d') >= $poll->end_date){
    if( date('H:i',$time) >= $poll->end_time ){
        $poll['status'] = "Ended";
    }
    else{
        $poll['status'] = "Running";
    }
}
// elseif ($poll->start_date < date('Y-m-d')) {
//     $poll['status'] = "Pending";
// }
elseif(date('Y-m-d') >= $poll->start_date ){
    if(date('H:i',$time) >= $poll->start_time){
        $poll['status'] = "Running";
    }

    else{
        $poll['status'] = "Pending";
    }
}
else{
    $poll['status'] = "Pending";
}
?>

<?php


if($poll->end_date  <= date('Y-m-d')){
    if( $poll->end_time < date('H:i',$time)){
        $poll['status'] = "Ended";
    }
    else{
        $poll['status'] = "Running";
    }
}
elseif($poll->start_date  >= date('Y-m-d')){
    if($poll->start_time < date('H:i',$time)){
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

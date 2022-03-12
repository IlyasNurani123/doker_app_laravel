<?php

function sendError($message,$data){
    return array('message'=>$message,"data"=>$data,"status"=>false);
}
function sendSuccess($message,$data){
    return array('message'=>$message, "data"=>$data, "status"=>true);
}

function sendApiError($message,$data){
    return response()->json([
        'errors' => $message,
        'data' => $data,
        'status'=> false
    ],400);
}

function sendApiSuccess($message,$data){
    return response()->json([
        'message' => $message,
        'data' => $data,
        'status'=> true
    ],200);
}

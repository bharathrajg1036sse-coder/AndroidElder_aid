<?php
session_start();
function requireRole($role){
    if(!isset($_SESSION['user']) || $_SESSION['role'] != $role){
        http_response_code(403);
        exit(json_encode(["error"=>"Access denied"]));
    }
}
?>

<?php
session_start();
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["us-cdbr-east-04.cleardb.com"];
$cleardb_username = $cleardb_url["bd80d75944e79f"];
$cleardb_password = $cleardb_url["20fd46c8"];
$cleardb_db = substr($cleardb_url["heroku_04e6c6923661b02"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
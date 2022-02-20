<?php
//session_start();
const SERVER = "localhost";
const DB = "brand_shop";
const LOGIN = "root";
const PASS = "";

$connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die("Error: ".mysqli_error($connect));
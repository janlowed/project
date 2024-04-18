<?php
include 'db.php';

$conn = new mysqli("localhost", "root", "");
$conn->query('CREATE DATABASE IF NOT EXISTS project');

?>
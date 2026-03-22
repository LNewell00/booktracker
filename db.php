<?php

function getDB() {
    $host = 'booktracker-postgres';
    $port = '5432';
    $dbname = 'book_tracker';
    $user = 'lnewell00';
    $password = 'admin';

    return new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
}
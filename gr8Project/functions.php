<?php

require_once("database.php");

$db = db_connect();


function add_book($title, $author, $isbn) {
  global $db;
  $query = "INSERT INTO BOOKS VALUES('{$title}', '{$author}', '{$isbn}')";
  mysqli_query($db, $query);
  return $db->affected_rows;
}

function search($search_query) {
  global $db;
  $query = "SELECT * FROM BOOKS WHERE title like '%{$search_query}%' OR author like '%{$search_query}%'";
  //echo $query;
  return mysqli_query($db, $query);
}
<?php


class QB

{

public $dsn ="mysql:host=localhost;dbname=coding-academy";
public $username = "root";
public $pass = "";
private $pdo ;
private $final_Query;

/**

* @param $pdo

*/

public function __construct()
{
$this->pdo = new PDO($this->dsn,$this->username,$this->pass);
}
​

function select($columns , $table , $condition){

    $this->finalQuery="SELECT ".$columns." FROM ".$table." WHERE $condition";
    
    return $this;
    
}

function orderBy ($columns){
    $this->final_Query .= "ORDER BY" ."$columns";
    return $this;
}

​

function GroupBy ($columns){
    $this->final_Query .= " GROUP BY" ."$columns";
    return $this;   
}


function count($column , $as , $table){
    $this->final_query. = "SELECT COUNT($column) AS $as FROM $table ";
    return $this;
}


function innerJoin($columns, $table1, $table2,$condition){
    $this->final_Query = "SELECT $columns FROM $table1 INNER JOIN $table2 ON $condition";
    return $this;
}

​

function leftJoin($columns, $table1, $table2,$condition){
    $this->final_Query = "SELECT $columns FROM $table1 LEFT JOIN $table2 ON $condition";
    return $this;
}

​

function outerJoin($columns, $table1, $table2,$condition){
    $this->final_Query = "SELECT $columns FROM $table1 OUTER JOIN $table2 ON $condition";
    return $this;
}


function limit($no){

    $this->final_Query.=" LIMIT $no";
    return $this;
}


function where($columns , $condition){
    $this->final_query .= "WHERE  $columns = $condition";
    return $this; 
}


function orwhere($columns1 ,$columns2, $condition1, $condition1){
    $this->final_query .= "WHERE  $columns1 = $condition1 OR $columns2 = $condition1";
    return $this; 
}

function runQuery(){
$stm = $this->pdo->prepare($this->final_Query);

$stm->execute();

return $stm->fetchAll(PDO::FETCH_OBJ);

}

}
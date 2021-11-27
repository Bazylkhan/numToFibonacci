<?php
//Формула Фибоначчи
function toFib($n){
    return $n <= 1 ? $n : toFib($n - 1) + toFib($n - 2);
}

//Получить из POST
$numToFib       =   (int)$_POST['num'];

//Поключение к БД
$connection     =   new PDO('mysql:host=localhost;dbname=slonworks', 'root', '');

//Проверить число из БД
$stmt           = $connection->query("SELECT num_to_fib FROM fibonacci_table WHERE num = $numToFib");
$data           = $stmt->fetch(PDO::FETCH_OBJ);
$getFibNum      = (int)$data->num_to_fib;


if ( empty(!$data) ){
    //Существует, выводим
    echo $getFibNum;
}
else{
    //Нет в БД
    //Вычисляем по формуле число Фибоначчи
    $fib = toFib($numToFib);
    //Вставляем в БД
    $sql = 'INSERT INTO `fibonacci_table`(`num`, `num_to_fib`) VALUES (?, ?)';
    $statement  = $connection->prepare($sql);
    $statement->execute([$numToFib, $fib]);
    
    //Выводим из БД
    $stmt = $connection->query("SELECT num_to_fib FROM fibonacci_table WHERE num = $numToFib");
    $data = $stmt->fetch(PDO::FETCH_OBJ);
    $getFibNum      = (int)$data->num_to_fib;
    echo $getFibNum;
}
?> 
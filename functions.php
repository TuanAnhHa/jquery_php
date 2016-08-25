<?php

function connect(){
    global $pdo;

    $pdo = new PDO("mysql:host=localhost;dbname=jquery_php", "root", "Hta24101983");
    /*
        username & password can be 'root', 'root' or 'root', '';
        or
        please use the ones (I created) above just in case
    */
}

function get_actors_by_last_name($letter){
    global $pdo;

    $sql = "SELECT actor_id, first_name, last_name FROM actor WHERE last_name LIKE :letter";
    $stmt = $pdo->prepare($sql);

    $stmt->execute(array(':letter' => $letter . '%')); // bind -> find last Name starting with $letter

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

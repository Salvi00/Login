<?php
echo '<body style ="color:black;background-color:a03010;text-align:center;font-size: 50px;">';
// includo i file
include_once '../config/database.php';
include_once '../objects/user.php';
$message = ""; 
// ottengo la connessione del DB
$database = new Database();
$db = $database->getConnection();
 
// preparo ad usare lo user
$user = new User($db);
// set ID property of user to be edited
$user->username = isset($_GET['username']) ? $_GET['username'] : die();
$user->password = isset($_GET['password']) ? $_GET['password'] : die();
// leggo i dettagli
$stmt = $user->login();
if($stmt->rowCount() > 0){
    // riscrivo la colonna
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // scrivo negli array
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Login!",
        "id" => $row['id'],
        "username" => $row['username']
    );
	$supporto=implode(" ",$user_arr);
	$supporto1=explode(" ",$supporto);
	echo '<h1 style="text-align:center;color:yellow"> Benvenuto '.$supporto1[4]." <br> </h1>";
	echo '<img src="https://i.imgur.com/O6tPfT7.gif">';
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Invalid Username or Password!",
    );
	$supporto=implode(";",$user_arr);
	$supporto1=explode(";",$supporto);
	echo '<h1 style="text-align:center;color:yellow">'.$supporto1[1]." <br> </h1>";
}

// faccio il json
json_encode($user_arr);


?>


<form action="index.php" name="invia_dati" id="verifica">
	<br>
	<input type="submit" style ="color:black;font-size: 30px;" value="LOGOUT">
</form>


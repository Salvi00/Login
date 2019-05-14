<?php
echo '<body style ="color:black;background-color:a03010;text-align:center;font-size: 50px;">';
 
// connessione con il DataBase
include_once '../config/database.php';
 
// includo il file utenti
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
// setto i valori di Default
$user->username = $_POST['username'];
$user->password = $_POST['password'];
$user->created = date('Y-m-d H:i:s');
 
// creo l'utente
if($user->signup()){
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $user->id,
        "username" => $user->username
    );
	$supporto=implode(" ",$user_arr);
	$supporto1=explode(" ",$supporto);
	echo '<h1 style="text-align:center;color:yellow"> Grazie di esserti registrato '.$supporto1[4]." <br> </h1>";
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
	echo '<h1 style="text-align:center;color:yellow"><br>'." ATTENZIONE QUESTO ACCOUNT ESISTE GIA'</h1>";
}

json_encode($user_arr);

?>

<form action="index.php" name="invia_dati" id="verifica">
	<br><br>PER ACCEDERE:
	<input type="submit" style ="color:black;font-size: 30px;" value="CLICCA QUI">
</form>
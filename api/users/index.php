<html>
<body style ="color:black;background-color:a03010;text-align:center;font-size: 50px;">

<script>
	var x = document.getElementsByClassName("op");
	function controlla(){
		vuoto=false;
		for(i=0;i<x.length;i++){
		x[i].style.backgroundColor = "ff8030";
		x[i].style.color = "white";
			if(x[i].value==""){
				vuoto=true;
				x[i].style.color = "black";
				x[i].style.backgroundColor = "yellow";
				x[i].focus;
			}			
		}
		if(vuoto)
			alert("CAMPI MANCANTI!!");
		else
			document.getElementById("verifica").submit();
	}
	
</script>

<h1 style="color:yellow">BENVENUTO IN GeP-LOGIN</h1>
<form action="login.php" method="get" name="invia_dati" id="verifica">
	<p style="color:ffb060">*Username: <input style ="color:white;background-color:ff8030;text-align:center;font-size: 30px;" class="op" type="text" name="username"></p>
	<p style="color:ffb060">*Password: <input style ="color:white;background-color:ff8030;text-align:center;font-size: 30px;" class="op" type="password" name="password"></p>
</form>
	<button style ="color:black;;font-size: 30px;" onclick="controlla()">Invia</button>
<form action="vedi.php" method="salvi" name="invia_dati" id="verifica">
	<br><br><p style="color:ffb060">PER REGISTRARTI:
	<input type="submit" style ="color:black;font-size: 30px;" value="CLICCA QUI"></p>
</form>
</body>
</html>
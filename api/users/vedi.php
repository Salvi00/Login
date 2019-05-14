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

<h1 style="color:yellow">REGISTRAZIONE A GeP-LOGIN</h1>
<form action="signup.php" method="post" name="invia_dati" id="verifica">
	<p style="color:ffb060">*Nuovo username: <input style ="color:white;background-color:ff8030;text-align:center;font-size: 30px;" class="op" type="text" name="username"></p>
	<p style="color:ffb060">*Nuova password: <input style ="color:white;background-color:ff8030;text-align:center;font-size: 30px;" class="op" type="password" name="password"></p>
</form>
	<button style ="color:black;;font-size: 30px;" onclick="controlla()">Invia</button>
</form>
</body>
</html>
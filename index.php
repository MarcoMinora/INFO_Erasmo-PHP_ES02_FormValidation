<html>
<head>
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="stile.css"/>
</head>
<body>
<?php

	require('form_val_function.php');

	//inizializzazione delle variabili 
	//avvaloramento e creazioni delle variabili che conterranno il tipo di errore per ogni campo come vuote
	$erNome=$erCognome=$erData=$erEmail=$erNumTel=$erIndirizzo=$erProvincia=$erComune=$erCAP=$erUsername=$erPassword="";
	$nome=$cognome=$data=$email=$numTelefono=$indirizzo=$provincia=$comune=$cap=$username=$psw="";
		
	//se il pulsante di submit è stato premuto eseguo tutte le funzioni per il controllo di validità
	if(isset($_POST['login'])){	
		//inizializzazione di tutte le variabili php che conterranno il valore inserito nel form html
		$nome=$_POST['nome'];
		$cognome=$_POST['cognome'];
		$data=$_POST['data'];
		$email=$_POST['email'];
		$numTelefono=$_POST['numTelefono'];
		$indirizzo=$_POST['indirizzo'];
		$provincia=$_POST['provincia'];
		$comune=$_POST['comune'];
		$cap=$_POST['cap'];
		$username=$_POST['username'];
		$psw=$_POST['psw'];
		
		
		checkNome($nome, $erNome);
		checkCognome($cognome, $erCognome);
		checkData($data, $erData);
		checkMail($email, $erEmail);
		checkTel($numTelefono, $erNumTel);
		checkIndirizzo($indirizzo, $erIndirizzo);
		checkProvincia($provincia, $erProvincia);
		checkComune($comune, $erComune);
		checkCap($cap, $erCAP);
		checkUsername($username, $nome, $cognome, $erUsername);
		checkPassword($psw, $erPassword);
		
		//se non ci sono stati errori entrare nella pagina riservata
		if($erNome=="" && $erCognome=="" && $erData=="" && $erEmail=="" && $erNumTel=="" && $erIndirizzo=="" && $erProvincia=="" && $erComune=="" && $erCAP=="" && $erUsername=="" && $erPassword=="") {
			echo "Successo nell'accesso alla pagina riservata";
		} 
		else {//se ci sono stati errori caricare il form con la visualizzazione degli errori nel tag span
			form($erNome,$erCognome,$erData,$erEmail,$erNumTel,$erIndirizzo,$erProvincia,$erComune,$erCAP,$erUsername,$erPassword);
		}
	}

	//se il pulsante non è stato premuto entrare nella pagina con il form e gli errori visualizzati nello span saranno vuoti
	else{
		form($erNome,$erCognome,$erData,$erEmail,$erNumTel,$erIndirizzo,$erProvincia,$erComune,$erCAP,$erUsername,$erPassword);
	}

	//caricamento del form e passaggio per indirizzo delle variabili contenenti gli errori
	function form(&$erNome,&$erCognome,&$erData,&$erEmail,&$erNumTel,&$erIndirizzo,&$erProvincia,&$erComune,&$erCAP,&$erUsername,&$erPassword){
		global $nome, $cognome, $data, $email, $numTelefono, $indirizzo, $provincia, $comune, $cap, $username, $psw; 
?>
		<div class="divisione1">
			<h4 class="title">LOGIN</h4>
			
			<div class="contenuto_Form">
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

				<div class="user-details">
					
					<div class="input-box">
						<label for="nome">Nome*</label>
						<input type="text" name="nome" value="<?=$nome?>" placeholder="Nome">
						<span class="error"><?php echo $erNome;?></span>
					</div>

					<div class="input-box">
						<label for="cognome">Cognome*</label>
						<input type="text" name="cognome" value="<?=$cognome?>" placeholder="Cognome">
						<span class="error"><?php echo $erCognome;?></span>
					</div>

					<div class="input-box">
						<label for="data">Data di Nascita*</label>
						<input type="date" name="data" value="<?=$data?>">
						<span class="error"><?php echo $erData;?></span>
					</div>

					<div class="input-box">
						<label for="email">Email*</label>
						<input type="email" name="email" value="<?=$email?>" placeholder="Email">
						<span class="error"><?php echo $erEmail;?></span>
					</div>

					<div class="input-box">
						<label for="numTelefono">Telefono</label>
						<input type="tel" name="numTelefono" value="<?=$numTelefono?>" placeholder="Telefono">	<!--pattern="[0-9]{3} [0-9]{3} [0-9]{4}"-->
						<span class="error"><?php echo $erNumTel;?></span>
					</div>
					
					<div class="input-box">
						<label for="indirizzo">Indirizzo*</label>
						<input type="text" name="indirizzo" value="<?=$indirizzo?>" placeholder="Via/Piazza, civico">
						<span class="error"><?php echo $erIndirizzo;?></span>
					</div>

					<div class="input-box">
						<label for="provincia">Provincia*</label>
						<input type="text" name="provincia" value="<?=$provincia?>" placeholder="Provincia">
						<span class="error"><?php echo $erProvincia;?></span>
					</div>

					<div class="input-box">
						<label for="comune">Comune*</label>
						<input type="text" name="comune" value="<?=$comune?>" placeholder="Comune">
						<span class="error"><?php echo $erComune;?></span>
					</div>

					<div class="input-box">
						<label for="cap">Cap*</label>
						<input type="number" name="cap" value="<?=$cap?>" placeholder="Cap">	<!--min="10000" max="99999"-->
						<span class="error"><?php echo $erCAP;?></span>
					</div>

					<div class="input-box">
						<label for="username">Username*</label>
						<input type="text" name="username" value="<?=$username?>" placeholder="Username">
						<span class="error"><?php echo $erUsername;?></span>
					</div>

					<div class="input-box">
						<label for="psw">Password*</label>
						<input type="password" name="psw" value="<?=$psw?>" placeholder="Password">
						<span class="error"><?php echo $erPassword;?></span>
					</div>
					
				</div>	
				
				<div class="submit_Login">
					<input type="submit" value="login" name="login" id="btn">
				</div>
				
			</form>
			
			</div>
		
		</div>

<?php } ?>

</body>
</html>
<?php

//validazione del nome, passo per indirizzo le variabili che conterranno il nome, l'eventuale errore
function checkNome(&$nome, &$erNome){
	$nome=trim($nome); //tolgo eventuali spazi da prima e dopo la stringa

	//controllo se il nome è vuoto
	if($nome==""){ 
		$erNome = "Campo nome obbligatorio"; //avvaloro la variabile di erroreNome con l'errore corretto
	}
	//controllo se il nome inserito è corretto sintatticamente
	if(!preg_match("/^[a-zA-Z-']*$/",$nome)){
		$erNome = "Il nome non rispetta la sintassi richiesta"; //avvaloro la variabile di erroreNome con l'errore corretto
	}	
}

//validazione del cognome, passo per indirizzo le variabili che conterranno il cognome, l'eventuale errore
//il funzionamento rimane speculare alla funzione precedente
function checkCognome(&$cognome, &$erCognome){
	$cognome=trim($cognome);
	
	if($cognome==""){
		$erCognome = "Campo cognome obbligatorio";
	} 
	
	if(!preg_match("/^[a-zA-Z-' ]*$/",$cognome)){
		$erCognome = "Il cognome non rispetta la sintassi richiesta";
	}
}

//validazione della data, passo per indirizzo le variabili che conterranno la data, l'eventuale errore 
//il funzionamento rimane speculare alla funzione precedente
function checkData(&$data, &$erData){
	
	if(empty(strtotime($data))){
		$erData = "campo Data di Nascita obbligatoria";
	}
}

//validazione della mail, passo per indirizzo le variabili che conterranno la mail, l'eventuale errore 
//il funzionamento rimane speculare alla funzione precedente
function checkMail(&$email, &$erEmail){
	
	if($email==""){
		$erEmail = "Campo Email obbligatorio";
		return 0;	//in modo da uscire dalla funzione e non farla entrare nel secondo if che ha una condizioe simile
	} 
	
	if(!preg_match("/([\w\-]{6,}+\@[\w\-]+\.[\w\-]{2,6})/",$email)){ //filtro applicato sulla variabile mail, con questo si evita di mettere espressioni regolari, in quanto agisce nel modo medesimo
		$erEmail = "La mail non rispetta la sintassi richiesta";
	}
}


//validazione del numero di telefono, passo per indirizzo le variabili che conterranno il numero di telefono, l'eventuale errore 
//il funzionamento rimane speculare alla funzione precedente
function checkTel(&$numTelefono, &$erNumTel){

	if($numTelefono!="" && !preg_match("/([\d\-]{3}+\ [\d\-]{3}+\ [\d\-]{4})/",$numTelefono)){
		$erNumTel = "Il numero telefonico non rispetta la sintassi richiesta";
	}
}

//validazione dell'indirizzo, passo per indirizzo le variabili che conterranno l'indirizzo, l'eventuale errore 
//il funzionamento rimane speculare alla funzione precedente
function checkIndirizzo(&$indirizzo, &$erIndirizzo) {
	
	if($indirizzo==""){
		$erIndirizzo = "Campo Indirizzo obbligatorio";
		return 0;	//in modo da uscire dalla funzione e non farla entrare nel secondo if che ha una condizioe simile
	}
	
	if(!preg_match("/([\w\-]{3,8}+\ [\w '\-]+\, [\d\-]{1,5})/",$indirizzo)){
		$erIndirizzo = "L'indirizzo non rispetta la sintassi richiesta";
	}
}

//validazione della provincia, passo per indirizzo le variabili che conterranno la provincia, l'eventuale errore
//il funzionamento rimane speculare alla funzione precedente
function checkProvincia(&$provincia, &$erProvincia) {
	$provincia=trim($provincia);
	
	if($provincia==""){
		$erProvincia = "Campo Provincia obbligatorio";
	} 
	
	if(!preg_match("/^[a-zA-Z-' ]*$/",$provincia)){
		$erProvincia = "La Provincia inserita non rispetta la sintassi richiesta";
	}
}

//validazione del comune, passo per indirizzo le variabili che conterranno la stringa del comune, l'eventuale errore
//il funzionamento rimane speculare alla funzione precedente
function checkComune(&$comune, &$erComune) {
	$comune=trim($comune);
	
	if($comune==""){
		$erComune = "campo Comune obbligatorio";
	} 
	
	if(!preg_match("/^[a-zA-Z-' ]*$/",$comune)){
		$erComune = "Il Comune inserito non rispetta la sintassi richiesta";
	}
}

//validazione del CAP, passo per indirizzo le variabili che conterranno la stringa del CAP, l'eventuale errore
//il funzionamento rimane speculare alla funzione precedente
function checkCap(&$cap, &$erCAP) {
	
	if($cap==""){
		$erCAP = "Inserire il Cap";
		return 0;	//in modo da uscire dalla funzione e non farla entrare nel secondo if che ha una condizioe simile
	}
	
	if(!preg_match("/^[\d\-]{5}$/",$cap)){
		$erCAP = "Il CAP non rispetta la sintassi richiesta";
	}
}

//funzione per validare l'username, mi serviranno anche nome e cogome in quanto non ci potranno essere questi due valori come username
function checkUsername(&$username, &$nome, &$cognome, &$erUsername) {
	//tolgo gli spazi prima e dopo le stringhe
	$username=trim($username);
	$nome=trim($nome);
	$cognome=trim($cognome);

	//concateno nome e cognome per andare a svolgere controlli sulla validazione dell'username
	$nomeCognome=$nome.$cognome;
	//concateno cognome e nome per andare a svolgere controlli sulla validazione dell'username
	$cognomeNome=$cognome.$nome;
	
	if($username==""){
		$erUsername = "campo username obbligatorio";
		return 0;	//in modo da uscire dalla funzione e non farla entrare nel secondo if che ha una condizioe simile
	}
	
	//controllo delle casistiche per le quali l'username non possa essere accettato
	if(strcasecmp($username,$nome)==0 || strcasecmp($username,$cognome)==0 || strcasecmp($username,$nomeCognome)==0 || strcasecmp($username,$cognomeNome)==0){
		$erUsername = "il campo username non può contenere nome o cognome";
	}
}

//validazione della password, passo per indirizzo le variabili che conterranno la password, l'eventuale errore
//il funzionamento rimane speculare alla funzione precedente
function checkPassword(&$psw, &$erPassword){
	
	if($psw==""){
		$erPassword = "campo password obbligatorio";
		return 0;	//in modo da uscire dalla funzione e non farla entrare nel secondo if che ha una condizioe simile
	}
	if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/",$psw)){
		$erPassword = "la password inserita non soddisfa la sintassi richiesta";
	}
}
?>

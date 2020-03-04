<?php
	// Dades de connexió
	$ldaphost = "ldap://localhost";
	$ldappass = trim($_GET['ctsnya']); 
	$ldapadmin= "cn=".trim($_GET['admin']).",dc=fjeclot,dc=net"; 
	$ldapusr = trim($_GET['usuari']);
	//
	// Connectant-se al servidor openLDAP
	$ldapconn = ldap_connect($ldaphost) or die("No s'ha pogut establir una connexió amb el servidor openLDAP.");
	//
	//Versió del servidor i protocol
	ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
	//
	//Autenticació
	if ($ldapconn) {
		// Autenticant-se en el servidor openLDAP
		$ldapbind = ldap_bind($ldapconn, $ldapadmin, $ldappass);

		// Accedint a les dades de la BD LDAP
		if ($ldapbind) {
			$search = ldap_search($ldapconn, "dc=fjeclot,dc=net", "uid=".$ldapusr);
			$info = ldap_get_entries($ldapconn, $search);
			//Ara, visualitzarem algunes de les dades de l'usuari:
			for ($i=0; $i<$info["count"]; $i++)
			{
				echo "Nom: ".$info[$i]["cn"][0]. "<br />";
				echo "Títol: ".$info[$i]["title"][0]. "<br />";
				echo "Telèfon fixe: ".$info[$i]["telephonenumber"][0]. "<br />";
				echo "Adreça postal: ".$info[$i]["postaladdress"][0]. "<br />";
				echo "Telèfon mòbil: ".$info[$i]["mobile"][0]. "<br />";
				echo "Descripció: ".$info[$i]["description"][0]. "<br />";
			} 
		} 
		else {
			header "error_usuari.php";
		}
	}
	class ldap{
		public $ldaphost;
    	public $ldapconn;
    	public $ldapbind;
    	function __construct($ldaphost) {
	       	$this->ldaphost=$ldaphost;
	       	$this->ldapconn=ldap_connect($ldaphost) or die("No s'ha pogut establir una connexió amb el servidor openLDAP.");
	       	ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
   		}
   		function autenticacion($ldapadmin2, $ldappass){
   			$ldapadmin= "cn=".$ldapadmin2.",dc=fjeclot,dc=net"; 
   			$this->ldapbind = ldap_bind($this->ldapconn, $ldapadmin, $ldappass);
   		}

   		function buscarUsuari($ldapusr){
   			if ($this->ldapbind) {
				$search = ldap_search($ldapconn, "dc=fjeclot,dc=net", "uid=".$ldapusr);
				$info = ldap_get_entries($this->ldapconn, $search);
				//Ara, visualitzarem algunes de les dades de l'usuari:
				for ($i=0; $i<$info["count"]; $i++)
				{
					echo "Nom: ".$info[$i]["cn"][0]. "<br />";
					echo "Títol: ".$info[$i]["title"][0]. "<br />";
					echo "Telèfon fixe: ".$info[$i]["telephonenumber"][0]. "<br />";
					echo "Adreça postal: ".$info[$i]["postaladdress"][0]. "<br />";
					echo "Telèfon mòbil: ".$info[$i]["mobile"][0]. "<br />";
					echo "Descripció: ".$info[$i]["description"][0]. "<br />";
				} 
			} 
			else {
				header "error_usuari.php";
			}
   		}

   		function crearUsuario($firstName,$lastName,$titulo,$telf,$movil,$direc,$desc,$lou,$uo,$uid,$guid,$dir,$shell,$pass){
	   		$dn= "uid=".$lou.",ou=".$uo.",dc=fjeclot,dc=net";
			$info["objectClass"]="persona";
			$info["uid"]= $lou;
			$info["cn"]= $firstName." ".$lastName;
			$info["sn"]=$lastName;
			$info["givenName"]= $firstName;
			$info["title"]= $titulo;
			$info["telephoneNumber"]=$telf;
			$info["mobile"]=$movil;
			$info["postalAddress"]= $direc;
			$info["loginShell"]= $shell;
			$info["gidNumber"]=$guid;
			$info["uidNumber"]= $uid;
			$info["homeDirectory"]= $dir;
			$info["description"]= $desc;
			$info["password"]=$pass;
			 $r = ldap_add($this->ldapconn, $dn, $info);
			 if(!$r) {
			 	$_SESSION["error"]="Error creando usuario";
			 	header "error.php";
			 }
			 else {
			 	$_SESSION["ok"]="El usuario se ha creado correctamente";
			 	header "ok.php";
			 }

   		}

   		function editarUsuario($lou,$uo,$variable,$valor){
   			$dn= "uid=".$lou.",ou=".$uo.",dc=fjeclot,dc=net";
   			$values[$variable] = $valor;
			$r=ldap_modify($this->ldapconn, $dn, $values);
			if(!$r) {
			 	$_SESSION["error"]="Error modificando usuario";
			 	header "error.php";
			 }
			 else {
			 	$_SESSION["ok"]="El usuario se ha modificado correctamente";
			 	header "ok.php";
			 }
   		}

   		function borrarUsuario($lou,$uo){
   			$dn= "uid=".$lou.",ou=".$uo.",dc=fjeclot,dc=net";
   			$r=ldap_delete($this->ldapconn,$dn);
   			if(!$r) {
			 	$_SESSION["error"]="Error borrando usuario";
			 	header "error.php";
			 }
			 else {
			 	$_SESSION["ok"]="El usuario se ha borrado correctamente";
			 	header "ok.php";
			 }
   		}
		// Accedint a les dades de la BD LDAP
			
   		function __destruct() {
       		ldap_close($this->ldaphost);
   		}
	}
	
?>


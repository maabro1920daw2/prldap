<?php
	
	class Ldap{
		public $ldaphost;
    	public $ldapconn;
    	public $ldapbind;
    	function __construct($ldaphost) {
	       	$this->ldaphost=$ldaphost;
	       	$this->ldapconn=ldap_connect($ldaphost) or die("No s'ha pogut establir una connexió amb el servidor openLDAP.");
	       	ldap_set_option($this->ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
   		}
   		function autenticacion($ldapadmin, $ldappass){
   			
   			$dn= "cn=".$ldapadmin.",dc=fjeclot,dc=net"; 
   			$this->ldapbind = ldap_bind($this->ldapconn, $dn, $ldappass);
   			if(!$this->ldapbind ) {
   				$_SESSION["error"]="Contraseña o nombre incorrecto";
   				header('Location: error.php');
   			}
   			else header('Location: principal.php');
   		}

   		function buscarUsuari($ldapusr){
   			
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

   		function crearUsuario($firstName,$lastName,$titulo,$telf,$movil,$direc,$desc,$lou,$uo,$uid,$guid,$dir,$shell,$pass){
	   		
	   		$dn= "cn=".$firstName." ".$lastName.",dc=fjeclot,dc=net";
			$info["objectclass"][0] = 'top';
		    $info["objectclass"][1] = 'person';
		    $info["objectclass"][2] = 'organizationalPerson';
		    $info["objectclass"][3] = 'inetOrgPerson';
		    $info["objectclass"][4] = 'posixAccount';
		    $info["objectclass"][5] = 'shadowAccount';
			$info["uid"]= $lou;
			$info["cn"]= $firstName." ".$lastName;
			$info["sn"]=$lastName;
			$info["givenname"]= $firstName;
			$info["title"]= $titulo;
			$info["telephonenumber"]=$telf;
			$info["mobile"]=$movil;
			$info["postaladdress"]= $direc;
			$info["loginshell"]= '/bin/bash';
			$info["gidnumber"]=$guid;
			$info["uidnumber"]= $uid;
			$info["homedirectory"]= '/home/verlos/';
			$info["description"]= $desc;
			//$info["password"]=$pass;
			
			 $r = ldap_add($this->ldapconn,$dn, $info);
			 $s="";
			 if(!$r) {
			 	foreach($info as $key => $value){
			 	$s=$s." ".$key."=".$value." ";
			 	
			 }
			 	$_SESSION["error"]=$s;
			 	header('Location: error.php');
			 }
			 else {
			 	$_SESSION["ok"]="El usuario se ha creado correctamente";
			 	header('Location: ok.php');
			 }

   		}

   		function editarUsuario($lou,$uo,$variable,$valor){
   			$dn= "uid=".$lou.",ou=".$uo.",dc=fjeclot,dc=net";
   			$values[$variable] = $valor;
			$r=ldap_modify($this->ldapconn, $dn, $values);
			if(!$r) {
			 	$_SESSION["error"]="Error modificando usuario";
			 	header('Location: error.php');
			 }
			 else {
			 	$_SESSION["ok"]="El usuario se ha modificado correctamente";
			 	header('Location: ok.php');
			 }
   		}

   		function borrarUsuario($lou,$uo){
   			$dn= "uid=".$lou.",ou=".$uo.",dc=fjeclot,dc=net";
   			$r=ldap_delete($this->ldapconn,$dn);
   			if(!$r) {
			 	$_SESSION["error"]="Error borrando usuario";
			 	header('Location: error.php');
			 }
			 else {
			 	$_SESSION["ok"]="El usuario se ha borrado correctamente";
			 	header('Location: ok.php');

			 }
   		}
		// Accedint a les dades de la BD LDAP
			
   		function __destruct() {
       		ldap_close($this->ldaphost);
   		}
	}
	
?>


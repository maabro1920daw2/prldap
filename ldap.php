<?php
	
	class Ldap{
		public $ldaphost;
    	public $ldapconn;
    	public $ldapbind;
    	
    	function __construct($ldaphost) {
	       	$this->ldaphost=$ldaphost;
	       	$this->ldapconn=ldap_connect($ldaphost) or die("No se ha podido conectar con el servidor openLDAP.");
	       	ldap_set_option($this->ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
   		}
   		function autenticacion($ldapadmin, $ldappass){
   			$this->ldappass=$ldappass;
   			$dn= "cn=".$ldapadmin.",dc=fjeclot,dc=net"; 
   			$this->ldapbind = ldap_bind($this->ldapconn, $dn, $ldappass);
   			if(!$this->ldapbind ){
   				if($ldapadmin != "admin"){
   					$_SESSION["error"]="Usuario incorrecto.";
   				}elseif ($ldappass != "fjeclot") {
   					$_SESSION["error"]="Contraseña incorrecta.";
   				}else{
   					$_SESSION["error"]="No se ha podido conectar con el servidor openLDAP.";
   				}

   				header('Location: error.php');  				
   			}
   			else header('Location: principal.php');
   		}

   		function buscarUsuari($ldapusr){   			
			$search = ldap_search($this->ldapconn, "dc=fjeclot,dc=net", "uid=".$ldapusr);
			$info = ldap_get_entries($this->ldapconn, $search);
			//$this->__destruct();
			ldap_close($this->ldapconn);
			if($info["count"] == 0){
				$_SESSION["error"]="Usuario no encontrado.";
				header('Location: error.php');
			} else {			 	
				echo "<ul class=\"list-group lista-el\">";
				for ($i=0; $i<$info["count"]; $i++){
					echo "<li class=\"list-group-item\"><strong>Nombre completo: </strong>".$info[$i]["cn"][0]. "</li>";
					echo "<li class=\"list-group-item\"><strong>Nombre: </strong>".$info[$i]["givenname"][0]. "</li>";
					echo "<li class=\"list-group-item\"><strong>Apellido: </strong>".$info[$i]["sn"][0]. "</li>";
					echo "<li class=\"list-group-item\"><strong>Título: </strong>".$info[$i]["title"][0]. "</li>";
					echo "<li class=\"list-group-item\"><strong>Descripció: </strong>".$info[$i]["description"][0]. "</li>";
					echo "<li class=\"list-group-item\"><strong>Teléfono fijo: </strong>".$info[$i]["telephonenumber"][0]. "</li>";
					echo "<li class=\"list-group-item\"><strong>Dirección postal: </strong>".$info[$i]["postaladdress"][0]. "</li>";
					echo "<li class=\"list-group-item\"><strong>Teléfono móvil: </strong>".$info[$i]["mobile"][0]. "</li>";
					echo "<li class=\"list-group-item\"><strong>Directorio home: </strong>".$info[$i]["homedirectory"][0]. "</li>";
					echo "<li class=\"list-group-item\"><strong>Número identificador del usuario: </strong>".$info[$i]["uidnumber"][0]. "</li>";
					echo "<li class=\"list-group-item\"><strong>Número del grupo por defecto del usuario: </strong>".$info[$i]["gidnumber"][0]. "</li>";
					echo "<li class=\"list-group-item\"><strong>Directorio shell: </strong>".$info[$i]["loginshell"][0]. "</li>";
					echo "<li class=\"list-group-item\"><strong>Login usuario: </strong>".$info[$i]["uid"][0]. "</li>";				
				}
				echo "</ul>";
			}		
   		}

   		function crearUsuario($firstName,$lastName,$titulo,$telf,$movil,$direc,$desc,$lou,$uo,$uid,$guid,$dir,$shell,$pass){
			if ($this->ldapconn) {
				$ldapbind = ldap_bind($this->ldapconn, "cn=admin,dc=fjeclot,dc=net", $pass);
		   		$dn= "uid=".$lou.",ou=".$uo.",dc=fjeclot,dc=net";
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
				$info["loginshell"]= $shell;
				$info["gidnumber"]=$guid;
				$info["uidnumber"]= $uid;
				$info["homedirectory"]= $dir;
				$info["description"]= $desc;
				//$info["password"]=$pass;			
			 	$r = ldap_add($this->ldapconn,$dn, $info);
			 	$this->__destruct();
			 	if(!$r) {
			 	
			 		$_SESSION["error"]="Error creando un usuario";
			 		header('Location: error.php');
			 	}
			 	else {
			 		$_SESSION["ok"]="El usuario se ha creado correctamente";
			 		header('Location: ok.php');
			 	}
			}

   		}

   		function editarUsuario($lou,$uo,$variable,$valor){
   			if ($this->ldapconn) {
				$ldapbind = ldap_bind($this->ldapconn, "cn=admin,dc=fjeclot,dc=net", "fjeclot");
   				$dn= "uid=".$lou.",ou=".$uo.",dc=fjeclot,dc=net";
   				$values[$variable] = $valor; 
				$r=ldap_modify($this->ldapconn, $dn, $values);
				$this->__destruct();
				if(!$r) {
				 	$_SESSION["error"]="Error modificando usuario";
				 	header('Location: error.php');
				} else {
				 	$_SESSION["ok"]="El usuario se ha modificado correctamente";
				 	header('Location: ok.php');
				}
			}
   		}

   		function borrarUsuario($lou,$uo){
   			if ($this->ldapconn) {

			$ldapbind = ldap_bind($this->ldapconn, "cn=admin,dc=fjeclot,dc=net", "fjeclot");
   			$dn= "uid=".$lou.",ou=".$uo.",dc=fjeclot,dc=net";
   			$r=ldap_delete($this->ldapconn,$dn);
   			$this->__destruct();
   			if(!$r) {
			 	$_SESSION["error"]="Error borrando usuario";
			 	header('Location: error.php');
			 }
			 else {
			 	$_SESSION["ok"]="El usuario se ha borrado correctamente";
			 	header('Location: ok.php');


			 }
			}
   		}	

   		function __destruct() {
       		ldap_close($this->ldapconn);
   		}
	}	
?>
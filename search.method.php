<?php
defined("INCLUDING") or Header("Location: home.php");
require_once "./config.php";
require_once "./database.php";


$key='%'.$_GET['key'].'%';
$utenti = array();
$aziende = array();

$db = Database::getInstance();
$mysqli = $db->getConnection();

/* RICERCA PERSONE*/
$sql = "SELECT * FROM PERSONE JOIN UTENTI ON ID_UTENTE = ID WHERE NOME LIKE ? OR COGNOME LIKE ?";
$q = $mysqli->prepare($sql);
$q->bind_param('ss', $key, $key);
$q->execute();
$res = $q->get_result();
$utenti  = $res->fetch_all(MYSQLI_ASSOC);

//foreach($result as $r)
//{
	//array_push($utenti, array($r['ID_UTENTE'],$r['NOME'],$r['COGNOME'],$r['FOTO'],$r['RUOLO']));
//}

//echo json_encode($array);


/* RICERCA AZIENDE*/
$sql = "SELECT * FROM AZIENDE JOIN UTENTI ON ID_UTENTE = ID WHERE RAGIONE_SOCIALE LIKE ?";
$q = $mysqli->prepare($sql);
$q->bind_param('ss', $key, $key);
$q->execute();
$res = $q->get_result();
$aziende  = $res->fetch_all(MYSQLI_ASSOC);

?>  
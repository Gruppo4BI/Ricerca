<?php
defined("INCLUDING") or
define("INCLUDING", 'TRUE');
require_once "config.php";
require_once (METHODS_PATH . "/search.method.php");
require_once (METHODS_PATH . '/idea.card.php');
require_once (METHODS_PATH . '/user.card.php');


?>  


<!DOCTYPE html>

<head>
  <title> <?php echo $_GET['key'];?> | Borsa delle Idee</title>
  <?php include(TEMPLATES_PATH.'/head.php'); //classi bootstrap  ?>
</head>

<body>
<?php include (TEMPLATES_PATH.'/navbar.php'); //Navbar ?>
<div class="container main-content">
	<?php include (TEMPLATES_PATH.'/dialog.php'); //Messaggi di errore ?>
	
	<div class="row">
    	<div class="panel main-panel">
			<ul class="nav nav-tabs nav-justified hidden-xs">
			  <li ><a href="#Idee" data-toggle='tab'>Idee</a></li>
			  <li class="active"><a href="#Persone" data-toggle='tab'>Persone</a></li>
			  <li><a href="#Aziende" data-toggle='tab'>Aziende</a></li>
			  <li><a href="#Skills" data-toggle='tab'>Competenze</a></li>
			</ul>
			<ul class="nav nav-tabs visible-xs">
			  <li ><a href="#Idee" data-toggle='tab'>Idee</a></li>
			  <li class="active"><a href="#Persone" data-toggle='tab'>Persone</a></li>
			  <li><a href="#Aziende" data-toggle='tab'>Aziende</a></li>
			  <li><a href="#Skills" data-toggle='tab'>Competenze</a></li>
			</ul>
			
			<div class="panel-body main-panel">
	        <div class="tab-content">
		        <div class="tab-pane fade in" id="Idee">
		        <p>PLACEHOLDER</p>
		        </div>
		        
		        <div class="tab-pane fade in active" id="Persone">
		        <?php 
		        $i=0;
		        echo "<div class='row'>";
		        
		        foreach ($utenti as $u){
		        	$a="";
		        	$b="";
		        	if(++$i % 3 == 0) {
		        		$a="</div>";
		        		$b= "<div class='row'>";}
		        	
		        	echo "<div class='col-md-4 col-xs-12'>" . userprint($u['ID_UTENTE'],$u['NOME']." ".$u['COGNOME'], $u['RUOLO'], $u['FOTO'], $u['REPUTAZIONE'], 12, 0) . "</div>";
		        	echo $a.$b;

		        }
		        echo "</div>";
		        
		        if($i==0) echo "<p>Nessuna persona trovata.</p>";
		        
		        ?>
		        
		        </div>
		        
		        <div class="tab-pane fade in" id="Aziende">
				
					<?php 
					$j=0;
					echo "<div class='row'>";
					
					foreach ($aziende as $az){
						$a2="";
						$b2="";
						if(++$j % 3 == 0) {
							$a2="</div>";
							$b2= "<div class='row'>";}
						
						echo "<div class='col-md-4 col-xs-12'>" . userprint($az['ID_UTENTE'],$az['RAGIONE_SOCIALE'], "Azienda", $az['FOTO'], $az['REPUTAZIONE'], 12, 0) . "</div>";
						echo $a2.$b2;

					}
					echo "</div>";
					
					if($j==0) echo "<p>Nessuna azienda trovata.</p>";
					
					?>
				
		        </div>
		        <div class="tab-pane fade in" id="Skills">
		        <p>PLACEHOLDER</p>
		        </div>			
			
			
		</div>
	</div>

	
</div>
</div>
</div>	
<?php include (TEMPLATES_PATH.'/footer.php'); //Footer ?>
</body>

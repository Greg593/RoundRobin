<?php  
	if (isset($_POST['idProceso']) && !empty($_POST['idProceso']) &&
		isset($_POST['idQuantum']) && !empty($_POST['idQuantum']) ){

			$noPro = $_POST['idProceso'];
			$noQua = $_POST['idQuantum'];

			echo "<!DOCTYPE html><html><head>
				 <link href='css/bootstrap.min.css' rel='stylesheet'>
				 <link href='css/plugins/morris.css' rel='stylesheet'>
				 <link href='css/bootstrap-select.min.css' rel='stylesheet'>
				 <link href='font-awesome-4.1.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
				 <link href='css/modern-business.css' rel='stylesheet'>
				 <title>.:Round Robin:.</title>
				 </head>
				 <body>
				 <center>
				 <div class='row'>
				 <div class='col-md-12'>
				 <h3>Procesos a Ejecutar</h3>
				 <form class='form-inline' method='post' action='RR.php'>
				 <div class='control-group form-group'>";

			for ($i=1; $i<=$noPro; $i++) { 
				echo "<h4>Proceso ".$i."</h4>
					 <div class='controls'>
					 <label>Tiempo en CPU:</label>
					 <input name='wrk".$i."' type='number' min='1' max='25' class='form-control' placeholder='#'>                
					 </div><br>";
			}

			echo "
				 <input name='idProceso' type='hidden' value='".$noPro."'> 
				 <input name='idQuantum' type='hidden' value='".$noQua."'>    
				 </div><br>
				 <button type='submit' class='btn btn-default'>Seguir</button>
				 </form></div></div></center></body></html>";
	}
?>
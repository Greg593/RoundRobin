<?php  
	error_reporting(E_ALL ^ E_NOTICE);	
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
	 <div class='col-md-12'>";

	$noPro = $_POST['idProceso'];
	$noQua = $_POST['idQuantum'];

	echo "<h4>Procesos Ejecutados: ".$noPro."</h4>";
	echo "<h4>Límite de Quantum: ".$noQua."</h4>";

	for ($i=1; $i<=$noPro; $i++) { 
		if (isset($_POST['wrk'.$i])){
			$p[$i] = $_POST['wrk'.$i];
			$q[$i] = "Proceso ".$i;
			$x[$i] = "Proceso ".$i;
			/*echo $q[$i]."=".$p[$i]."<br>";     */
		}
	}

	$cnt 		= $noPro;
	$tot 		= 0;
	$r  		= 1;
	$sCtrl[$r]	= 0;
	$xEIF 		= array();

	for ($j=1; $j<=$cnt; $j++) {
		$seg  = 1;
		while ($seg <= $noQua) {						
			$c[$j] 	 = $q[$j];		
			/*echo "Secuencia:".$seg." - ";
			echo "Trabajo".$p[$j]." - ";
			echo $c[$j];
			echo "<br>";*/
			$seg 	+= 1;			
			$tot 	+= 1;			
			$p[$j] 	-= 1;



			/* Si proceso llego al final de trabajos*/
			if ($p[$j] <= 0) {	
				$r 		  += 1;
				$sCtrl[$r] = $sCtrl[$r-1] + $seg-1; 		
				$o		   = array_search($c[$j],$x);
				/*echo "Busque".$c[$j]." en "."ARRAY:".$o."resultado".$sCtrl[$r]."<br>";*/
				$xR[$o]	   = $sCtrl[$r];
					if ($xEIF[$o] == 0) {
						$xEIF[$o]  = $sCtrl[$r-1];
						/*echo " Inicial: ".$xEIF[$o].$c[$j]."<br>";*/
					}else{				
						if ($xEFI[$o] == 0){
							$xEFI[$o]  = $sCtrl[$r-1];
							/*echo " Final: ".$xEFI[$o].$c[$j]."<br>";*/						
						}else{

						}
					}
				break;
			}
		}

		/* Si el proceso tiene más trabajos por ejecutar */
		if ($p[$j] > 0) {
			$prx     = count($q)+1;
			$q[$prx] = $q[$j];
			$p[$prx] = $p[$j];
			$cnt 	+= 1; 
			$r 		+= 1;
			$sCtrl[$r]= $sCtrl[$r-1]+$noQua;
			$o		 = array_search($c[$j],$x);
			if ($xEI[$o] == 0) {
				$xEI[$o] = $sCtrl[$r-1];	
				/*echo $xEI[$o].$c[$j]."<br>";*/
			}
			if ($xEIF[$o] == 0) {
				$xEIF[$o]= $sCtrl[$r]; 
				/*echo " 	Inicial: ".$xEIF[$o].$c[$j]."<br>";*/
			}
			/*echo "asdfasd".$p[$j].$c[$j]."<br>";
			if ($p[$j] < $noPro){
				$xEFI[$o]  = $sCtrl[$r-1];
				echo " Final: ".$xEFI[$o].$c[$j]."<br>";							
			}*/
			/*echo "seg".$seg;
			echo "sig".$prx;
			echo $q[$prx]." ";
			echo "wrk".$p[$prx]." ";
			echo "cnt".$cnt;
			echo "<br>";*/
			
		}
	}

	$TEProm = 0;
	$TRProm = 0;	
	$TE 	= 0;
	$TR  	= 0;	

	/* Hago logica para buscar los tiempos de Espera */
/*	print_r($xEFI);
	print_r($xEIF);
	print_r($xEI);*/
	for ($a=1; $a<=$noPro; $a++) { 
		$xE[$a] = abs($xEI[$a] + ($xEFI[$a] - $xEIF[$a]));
	}

	/* Presento Información del Algoritmo de RR*/
	echo "<div class='panel panel-default'>
	 <div class='panel-heading'>
	 <h3 class='panel-title'>Diagrama de Gantt</h3>
	 </div>
	 <div class='panel-body'>
	 <table class='table'>
	 <thead>
	 <tr>";
		foreach ($q as $pro){
			echo "<th>".$pro."</th>";
		}
	echo "<br></tr>
	 </thead>
	 <tbody>
	 <tr>";
	 	foreach ($sCtrl as $pro){
			echo "<td>".$pro."</td>";
		}
	echo "</tr>
	 </tbody>
	 </table>
	 </div>
	 </div>";

	 echo "<div class='panel panel-default'>
	 <div class='panel-heading'>
	 <h3 class='panel-title'>Tiempos de Espera</h3>
	 </div>
	 <div class='panel-body'>
	 <table class='table'>
	 <thead>
	 <tr>";
		foreach ($x as $pro){
			echo "<th>".$pro."</th>";
		}
	echo "<br></tr>
	 </thead>
	 <tbody>
	 <tr>";
	 	ksort($xE);
	 	foreach ($xE as $pro){
			echo "<td>".$pro."</td>";
			$TE += $pro;
		}
		unset($pro);
	echo "</tr>
	 </tbody>
	 </table>	 
	 </div>
	 <div class='panel-footer'>
	 <h4 align='right'>";
	    $TEProm = $TE / $noPro;
	 	echo "Promedio: ".$TEProm;
	 echo "</h4>
	 </div>	 
	 </div>";

	 echo "<div class='panel panel-default'>
	 <div class='panel-heading'>
	 <h3 class='panel-title'>Tiempos de Respuesta</h3>
	 </div>
	 <div class='panel-body'>
	 <table class='table'>
	 <thead>
	 <tr>";
		foreach ($x as &$pro){
			echo "<th>".$pro."</th>";
		}
		unset($pro);
	echo "<br></tr>
	 </thead>
	 <tbody>
	 <tr>";
	 	ksort($xR);
	 	foreach ($xR as &$pro){
			echo "<td>".$pro."</td>";
			$TR += $pro;
		}
		unset($pro);
	echo "</tr>
	 </tbody>
	 </table>
	 </div>
	 <div class='panel-footer'>
	 <h4 align='right'>";
	    $TRProm = $TR / $noPro;
	 	echo "Promedio: ".$TRProm;
	 echo "</h4>
	 </div>	 	 
	 </div>";

	 echo "<div class='panel panel-default'>
	 <div class='panel-heading'>
	 <h3 class='panel-title'>Cambios de Contexto</h3>
	 </div>
	 <div class='panel-body'>";
	 	$CAMcon = 0;
	 	$ant	= 1;
	 	for ($i=1; $i<=$cnt; $i++) { 
	 		if ($q[$i] != $ant){
	 			$CAMcon += 1;
	 		}
	 		$ant = $q[$i];	 		
	 	}
	 	echo $CAMcon;
	 echo "</div>	 	 
	 </div>";

	echo "</div><br>
	 </div></div></center></body></html>";	
?> 
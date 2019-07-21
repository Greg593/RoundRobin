<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/plugins/morris.css" rel="stylesheet">
	<link href="css/bootstrap-select.min.css" rel="stylesheet">
	<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/modern-business.css" rel="stylesheet">
	<title>.:: Round Robin ::.</title>
</head>
<body>
    <center>
        <div class="row">
            <div class="col-md-12">
            	<h3>Algoritmo de Round Robin</h3>
                <h4>By Víctor Morales</h4>
            	<div class="col-md-04"><p>
            		Este es uno de los algoritmos más antiguos, sencillos y equitativos en el reparto de la CPU entre los procesos, muy válido para entornos de tiempo compartido. <br> Cada proceso tiene asignado un intervalo de tiempo de ejecución, llamado cuantum o cuanto. Si el proceso agota su cuantum de tiempo, se elige a otro proceso para ocupar la CPU. <br> Si el proceso se bloquea o termina antes de agotar su cuantum también se alterna el uso de la CPU. El proceso de Round Robín es muy fácil de implementar. <br>Todo lo que necesita el planificador es mantener una lista de los procesos listos.
            	</p></div>
            	<h4>Para el algoritmo RR (Round Robin) se tiene principios fundamentales:</h4>         
				1-. El Tiempo de llegada de todos los procesos es cero. <br>
				2-. A cada proceso se les asigna un intervalo de tiempo, llamado Quantum.<br>
				3-. Cada proceso se ejecuta el tiempo que tenga el Quantum. <br>
				4-. Cuando el proceso se ejecuta en la CPU, pueden ocurrir dos cosas: <br>
					4.1-. Que sea menor: El proceso termina antes del Quantum. <br>
					4.2-. Que sea mayor: En este caso el proceso es expulsado y pasa a formar parte de los procesos en espera.<br>            	
                <h3>Ingreso de Datos</h3>
                <form class="form-inline" method="post" action="procesos.php">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Procesos:</label>
                            <input name="idProceso" type="number" min="1" max="10" class="form-control" placeholder="#">                
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Quantum:</label>
                            <input name="idQuantum" type="number" min="1" max="10" class="form-control" placeholder="#">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Seguir</button>
                </form>
            </div>
        </div>
    </center>                                           
</body>
</html>

<h4 align="right"></h4>
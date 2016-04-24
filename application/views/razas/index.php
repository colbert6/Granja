<?php 
	if($razas->result()!=NULL){
		foreach ($razas->result() as $razas) {  
			echo $razas->raz_descripcion."\n";

		}
	}
?>
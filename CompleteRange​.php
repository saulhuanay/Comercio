<?php 

class CompleteRange​{

	public function build($string){
 
		$replace = str_split($string);
		$max = max($replace);
		$min = array($replace);

		for ($i=0; $i < count($replace); $i++) {
			foreach (range($min, 100) as $numero) {
				if (!in_array($numero, $replace)) {
						if($numero < $max){
							array_push($replace,$numero);
		    				asort($replace);
		    				
						}
				}
			}
		}

		return $replace;

	}
}

$CompleteRange​ = new CompleteRange​();

if(isset($_REQUEST['insert'])){

	$input = $_REQUEST['add_number'];
	$replace = $CompleteRange​->build($input);
	echo json_encode($replace);

}
<?php 

class ClearPar{

	public function build($string){
 
		$replace = [];
		$count = substr_count($string, '()'); 
		for ($i=0; $i < $count; $i++) { 
			array_push($replace,'()');
		}


		return $replace;
	}
}

$ClearPar = new ClearPar();

if(isset($_REQUEST['insert'])){

	$input = $_REQUEST['replace_text'];
	$replace = $buildchange->build($input);

	echo json_encode($replace);
}
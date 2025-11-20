<?php
$fich = fopen("matriz.txt", "r");
if ($fich === false){
	echo "No se encuentra el fichero o no se pudo leer<br>";
}else{
	while( !feof($fich) ){
		$num = fscanf($fich, "%d %d %d %d");
		if ($num && count($num) == 4) {
			echo "$num[0] $num[1] $num[2] $num[3] <br>";
		}
	}
}
rewind($fich);
while( !feof($fich) ){
	$result = fscanf($fich, "%d %d %d %d", $num1, $num2, $num3, $num4);
	if ($result === 4) {
		echo "$num1 $num2 $num3 $num4 <br>";
	}
}
fclose($fich);
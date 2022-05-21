<?
/*function crearString($strCadena){
	$string = preg_replace(['/\s+/', '/^\s|\s$/'], [' '.''], $strCadena);
	$string = trim($string);
	$string = stripcslashes($string);
	$string = str_ireplace("<script>", "", $strCadena);
	$string = str_ireplace("</script>", "", $strCadena);
	$string = str_ireplace("<script src>", "", $strCadena);
	$string = str_ireplace("<script type=>", "", $strCadena);
	$string = str_ireplace("SELECT * FROM", "", $strCadena);
	$string = str_ireplace("DELETE FROM", "", $strCadena);
	$string = str_ireplace("INSERT INTO", "", $strCadena);
	$string = str_ireplace("SELECT COUNT(*) FROM", "", $strCadena);
	$string = str_ireplace("DROP TABLE", "", $strCadena);
	$string = str_ireplace("OR '1'='1", "", $strCadena);
	$string = str_ireplace('OR "1"="1"', "", $strCadena);
	$string = str_ireplace('OR ´1´=´1´', "", $strCadena);
	$string = str_ireplace("is NULL; --", "", $strCadena);
	$string = str_ireplace("IS NULL; --", "", $strCadena);
	$string = str_ireplace("LIKE '", "", $strCadena);
	$string = str_ireplace('LIKE "', "", $strCadena);
	$string = str_ireplace('LIKE ´', "", $strCadena);
	$string = str_ireplace("OR 'a'='a", "", $strCadena);
	$string = str_ireplace('OR "a"="a', "", $strCadena);
	$string = str_ireplace('OR ´a´=´a', "", $strCadena);
	$string = str_ireplace('OR ´a´=´a', "", $strCadena);
	$string = str_ireplace("--", "", $strCadena);
	$string = str_ireplace("^", "", $strCadena);
	$string = str_ireplace("[", "", $strCadena);
	$string = str_ireplace("]", "", $strCadena);
	$string = str_ireplace("==", "", $strCadena);

	return $string;
}

function generatePassword($length = 10){
	$pass = "";
	$longituPass = $length;
	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	$longitudCadena = strlen($cadena);

	for($i = 1; $i <= $longituPass; $i++){ // generar contraseña de forma automatica
		$pos = rand(0, $longitudCadena-1);
		$pass .= substr($cadena, $pos, 1);
	}
	return $pass;
}
//generar un token
function token(){
	$r1 = bin2hex(random_bytes(10));
	$r2 = bin2hex(random_bytes(10));
	$r3 = bin2hex(random_bytes(10));
	$r4 = bin2hex(random_bytes(10));

	$token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;

	return $token;
}

function formatMoney($cantidad){
	$cantidad = number_format($cantidad, 2, SPD, SPM);
	return $cantidad;
}*/

?>
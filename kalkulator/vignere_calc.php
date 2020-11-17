<?php

// initialize variables
$pswd = "";
$code = "";
$error = "";
$valid = true;
$color = "#FF0000";

// if form was submit
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	// declare encrypt and decrypt funtions
	require_once('vignere.php');
	
	// set the variables
	$pswd = $_POST['pswd'];
	$code = $_POST['code'];
	
	// check if password is provided
	if (empty($_POST['pswd']))
	{
		$error = "Masukkan Kunci";
		$valid = false;
	}
	
	// check if text is provided
	else if (empty($_POST['code']))
	{
		$error = "Masukkan Plaintext atau Chipertext";
		$valid = false;
	}
	
	// check if password is alphanumeric
	else if (isset($_POST['pswd']))
	{
		if (!ctype_alpha($_POST['pswd']))
		{
			$error = "Kunci hanya huruf alphabets";
			$valid = false;
		}
	}
	
	// inputs valid
	if ($valid)
	{
		// if encrypt button was clicked
		if (isset($_POST['encrypt']))
		{
			$code = encrypt($pswd, $code);
			$error = "Enkripsi Berhasil";
			$color = "#526F35";
		}
			
		// if decrypt button was clicked
		if (isset($_POST['decrypt']))
		{
			$code = decrypt($pswd, $code);
			$error = "Dekripsi Berhasil";
			$color = "#526F35";
		}
	}
}

?>

<html>
	<head>
		<title>Vigenere Cipher</title>
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
		<script type="text/javascript" src="Script.js"></script>
		<style type="text/css">
			textarea {
	width: 500;
	height: 200;
	background-color: E0E0E0;
	color: #0000FF;
}

input {
	font-family: Courier New;
}

.button {
	width: 500;
	height: 40;
}

b {
	font-size: 20pt;
	color: #303030;
}

body {
	background-color: #808080;
	font-family: Courier New;
}

table {
	border-color: #A0A0A0;
	background-color: #C0C0C0;
}
		</style>
	</head>
	<body class="w3-grey">
<div class="w3-top">
  <div class="w3-dark-grey w3-xlarge" style="max-width:3000px;margin:auto">
     <a href="/kriptografi_UTS/index.html"><div class="w3-button w3-padding-16 w3-left">Back</div></a>
    <div class="w3-right w3-padding-16"></div>
    <div class="w3-center w3--text-black w3-padding-16">Kriptografi</div>
  </div>
</div>
		<div class="w3-container w3-dark-grey w3-padding-32 w3-center w3-content">
			<br><br><br>
			<form action="vignere_calc.php" method="post">
				<table cellpadding="5" align="center" cellpadding="2" border="7">
					<caption><hr><b>Vigenere Chiper</b><hr></caption>
					<tr>
						<td align="center">Key: <input type="text" name="pswd" id="pass" value="<?php echo htmlspecialchars($pswd); ?>" /></td>
					</tr>
					<tr>
						<td align="center"><textarea id="box" name="code"><?php echo htmlspecialchars($code); ?></textarea></td>
					</tr>
					<tr>
						<td><input type="submit" name="encrypt" class="button" value="Enkripsi" onclick="validate(1)" /></td>
					</tr>
					<tr>
						<td><input type="submit" name="decrypt" class="button" value="Dekripsi" onclick="validate(2)" /></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
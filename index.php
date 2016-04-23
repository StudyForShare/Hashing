<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="Free Password Hashing">
<meta name="keywords" content="MD5, SHA1, CRC32, Hash">
<meta name="author" content="Sigit Priyanto">
<meta name="copyright" content="Oliver Twist">
<meta name="trademark" content="Oliver Twist">
<base href="#" target="_self">

	<title>Hashing Your Text - Sigit Priyanto</title>

<link href="images/favicon.gif" rel="icon">

<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".btn-nav").click(function(){
			var nav = $("nav");
			nav.animate({
				width: 'toggle',
				opacity: 'toggle'
			}, "4s", "swing");
		});
	});
</script>
</head>
<style type="text/css">
	body {
		margin: 0 150px;
	}

	.text{
		height: 20px;
		background: url(images/loading.gif)center no-repeat !important;
		color: transparent;
		border-color: grey;
		border-style: solid;
	}

	.text:focus {
		background: url(images/matrix.gif) !important;
		border-color: dodgerblue;
		border-style: solid;
		color: grey;
	}

	.submit {
		font-family:'Comic San MS';
		font-weight: bold;
		height: 26px;
		position: relative;
		left: -5px;
		cursor: pointer;
		border: none;
		background: dodgerblue;
		color: black;
	}

	.submit:hover {
		background: blue;
		color: white;
		border: none;
	}
</style>
<body>
<style type="text/css">
	

	nav{
		display: none;
		top: 0;
		width: 200px;
		height: 657px;
		position: fixed;
		right: 0;
		z-index: 999;
		background: black;
	}

	nav a {
		text-decoration: none;
	}

	nav ul {
		top: -16px;
		padding: 20px 0 0 60px ;
		background: dodgerblue;
		font-family:"Microsoft JhengHei UI";
		position: relative;	
		list-style: none;
		display: inline-table;
		font-size: 16px;
		text-transform: capitalize;
		width: 140px;
		height: auto;
	}

	nav ul ul {
		display: none;
	}

	nav ul li {
		padding: 5px;
		position: relative;
		display: block;
	}

	.btn-nav {
		content: "";
		width: 30px;
		height: 20px;
		cursor: pointer;
		z-index: 1000;
		background: grey;
		position: fixed;
		display: block;
		right: 0;
		top: 0;
		border-radius: 2px;
	}

	.btn-nav:hover {
		background: deepskyblue;
	}
</style>
<div class="btn-nav"></div>
<nav>
<ul>
	<li><a href="#">Home</a></li>
	<li><a href="#">Profile</a></li>
	<li><a href="#">Product</a></li>
	<li><a href="#">Contact</a></li>
	<li><a href="#">About</a></li>
</ul>
</nav>

<center><h1>Hashing Your Text</h1></center>
<br>
<br>
<br>
<form method="POST" action="<?php echo "?act=hash"; ?>">
<caption>Let's Hashing Now!</caption>
<br>
<input class="text" type="text" name="hash" tabindex="0" size="36">
<input formtarget="_self" class="submit" type="submit" name="submit" value="Hash" tabindex="1">
<br>
<input type="radio" name="method" value="1">MD2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="method" value="2">MD4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="method" value="3">MD5<br>
<input type="radio" name="method" value="4">SHA1&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="method" value="5">SHA256
<input type="radio" name="method" value="6">SHA384&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
<input type="radio" name="method" value="7">SHA512
<input type="radio" name="method" value="8">CRC32&nbsp;&nbsp;
<input type="radio" name="method" value="9">RIPEMD160<br>
<input type="radio" name="method" value="10">GOST
<input type="radio" name="method" value="11">SHA224
<br>
<?php
function md_lima(){
$h = md5($_POST["hash"]);
echo $h;
}

function sha_satu(){
$h = sha1($_POST["hash"]);
echo $h;
}

function crc_tigadua(){
$h = crc32($_POST["hash"]);
echo $h;
}

function sha_dualimaenam(){
$h = hash('sha256', $_POST["hash"]);
echo $h;
}

function md_empat(){
$h = hash('md4', $_POST["hash"]);
echo $h;
}

function md_dua(){
$h = hash('md2', $_POST["hash"]);
echo $h;
}

function sha_tigadelapanempat(){
$h = hash('sha384', $_POST["hash"]);
echo $h;
}

function sha_limasatudua(){
$h = hash('sha512', $_POST["hash"]);
echo $h;
}

function ripemd_satuenamnol(){
$h = hash('ripemd160', $_POST["hash"]);
echo $h;
}

function gost(){
$h = hash('gost', $_POST["hash"]);
echo $h;
}

function sha_duaduaempat(){
$h = hash('gost', $_POST["hash"]);
echo $h;
}

$action = $_GET['act'];
if (!$action) {
	header("location: ?act=nothing");
}
if ($action == "hash") {
define("meth", $_POST['method']);
if (meth == "1") {
	md_dua();
} elseif (meth == "2") {
	md_empat();
} elseif (meth == "3") {
	md_lima();
} elseif (meth == "4") {
	sha_satu();
} elseif (meth == "5") {
	sha_dualimaenam();
} elseif (meth == "6") {
	sha_tigadelapanempat();
} elseif (meth == "7") {
	sha_limasatudua();
} elseif (meth == "8") {
	crc_tigadua();
} elseif (meth == "9") {
	ripemd_satuenamnol();
} elseif (meth == "10") {
	gost();
} elseif (meth == "11") {
	sha_duaduaempat();
} else {
	header("location: ?act=nothing");
}
}
if ($action == "nothing") {
	echo "Anda belum memilih method untuk hashing!";
}
?>
<br>
</form>
</body>
</html>
<html>
<head>
	<title>Pannello</title>
 	<link rel="stylesheet" type="text/css" href="pannello/css/login.css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<script src="/pannello/js/login.js" type="text/javascript"></script><meta name="language" content="it" />
	<meta name="robots" content="index, follow" />
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css" />
	<?php include "analitycs.php"; ?>
</head>
<body>
<div class="generale">
	<div class="header">
		<div class="menu">
			<div class="bottone"><a href="http://www.softwarearredamento.com" class="bottone"><div>Home</div></a></div>
			<div class="bottoneattivo"><a href="http://www.softwarearredamento.com/index.html?prev=1" class="bottoneattivo"><div>Acquista</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/galleria.html" class="bottone"><div>Galleria</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/blog/" class="bottone"><div>Blog</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/guida/index.html" class="bottone"><div>Guida</div></a></div>
			<div class="bottone"><a href="http://ticket.arkosoft.it" class="bottone"><div>Supporto</div></a></div>

		</div>
		<div class="logo">&nbsp;</div>
	</div>
	<div class="boxmadregalleria">
		<div class="box-container">
			<div class="boxacquista">
<?php			if(isset($_GET['msg']) and $_GET['msg']=="0"){ ?><div class="errore">Username o Password errati!</div><?php } ?>			
				<div class="loginpan">
					<div class="logintit">Login</div>
					<form action="/pannello/bacheca.php" method="POST">
						<div class="loginuser"><input class="inputoff" type="text" name="user" id="user" value="Username" Onclick="cancellainput(this);"></div>
						<div class="loginpsw"><input class="inputoff" type="text" name="psw" id="psw" value="Password" Onfocus="cancellainput1(this);"></div>
						<div class="logincmd"><input type="Submit" name="cmd" id="cmd" value="Login"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include "footer.php"; ?>
</div>	
</body>
</html>
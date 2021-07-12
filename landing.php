<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144069649-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-144069649-1');
</script>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://trytix.ml/style_land.css">
<title> <?= $title ?> </title>
</head>
<body style="background: url(./assets/bgln.png); background-size: contain;">
	<!--<nav class="navbar fixed-top navbar-light bg-light">
	  	<a class="navbar-brand" href="#">"<?= $brand ?>"-</a>
	  	 <?= $button ?>   
	</nav>-->

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
<div class="container">
  <a class="navbar-brand" href="#"><img src="./assets/logo.png"> Wi-port</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</div>
</nav>
	<div class="jumbotron jumbotron-fluid">
	  <div class="container jumbo">
      <div class="row justify-content-md-center">
        <div class="col-sm-8">
    	    <h1 class="display-4">Meet the <span class="pink">Wi-Port</span></h1>
    	    <p class="lead">Это модифицированный jumbotron, который занимает все горизонтальное пространство своего родителя.</p>
        </div>
      </div>
	  </div>
	</div>
	<div class="container content">
		<?php include "elems/info.php"; ?> <!-- Информирование о статусах -->
		<!-- <?= $content ?> -->
	</div>
	<div class="container">
	  <div class="row">
	    <div class="col-sm-12">
	        <img src="./assets/pc1.png";
               srcset="./assets/3@2x.png,
                       ./assets/3@3x.png"
               class="layer">
	    </div>
	  </div>
        <div class="row">
      <div class="col-sm-12">
        <div class="container">

        </div>
      </div>
    </div>
	</div>

	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
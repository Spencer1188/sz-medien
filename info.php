<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unbenanntes Dokument</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet">
	<script language="javascript" type="text/javascript" src="js/materialize.js"></script>
</head>
<body>
			  <nav>
				<div class="nav-wrapper grey lighten-1">
					<a class="brand-logo"><img src="images/logo/Unbenannt-2.png" alt="logo" width="30%"></img></a>

				</div>
			  </nav>
  <div class="carousel carousel-slider">
    <a class="carousel-item" href="#one!"><img src="https://lorempixel.com/800/400/food/1"></a>
    <a class="carousel-item" href="#two!"><img src="https://lorempixel.com/800/400/food/2"></a>
    <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/800/400/food/3"></a>
    <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/800/400/food/4"></a>
  </div>
	
	<script>
		  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, 0);
  });

  var instance = M.Carousel.init({
    fullWidth: true
  });

		
	</script>
</body>
</html>
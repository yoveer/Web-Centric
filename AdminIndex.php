<!DOCTYPE html>
<html>

<head>
	<!-- <title>2</title> -->
	<?php include 'components/header.php'; ?>

</head>

<body>
	<?php include 'components/navigation_bar.php'; ?>
	<section class="content">
			<div>
				<center><h2>The Manager's Choice of the week</h2></center>
			</div>
			<div id="prodcarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000" width=100px>
				<ol class="carousel-indicators">
					<li data-target="#prodcarousel" data-slide-to="0" class="active"></li>
					<li data-target="#prodcarousel" data-slide-to="1"></li>
					<li data-target="#prodcarousel" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img src="images/product/gf2-2.jpg">
						<div class="carousel-caption">
							<h5>Test 1 caption</h5>
						</div>
					</div>
					<div class="carousel-item">
						<img src="images/product/gf2-4.jpg">
						<div class="carousel-caption">
							<h5>Test 2 caption</h5>
							<h6>Hello</h6>
						</div>
					</div>
					<div class="carousel-item">
						<img src="images/product/gf14-5.jpg">
						<div class="carousel-caption">
							<h5>Test 3 caption</h5>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#prodcarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#prodcarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>
	

</body>

</html>
<!DOCTYPE html>
<html>

<head>
	<!-- <title>2</title> -->
	<?php include 'components/header.php'; ?>

</head>

<body>
	<?php include 'components/navigation_bar.php';
		require_once "includes/dbh.inc.php";
	?>
	<?php
	if (@$_GET['login'] == 'success'){
		echo '<script language="javascript">';
		echo 'alert("Welcome back dude")';
		echo '</script>';
	}
	?>
    
	<section class="content">
			<div>
				<center><h2>The Manager's Choice of the week</h2></center>
			</div>
			<div id="prodcarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000" width=100px>
				<ol class="carousel-indicators">
					<li data-target="#prodcarousel" data-slide-to="0" class="active"></li>
					<li data-target="#prodcarousel" data-slide-to="1"></li>
					<li data-target="#prodcarousel" data-slide-to="2"></li>
					<li data-target="#prodcarousel" data-slide-to="3"></li>
				</ol>

				<div class="carousel-inner" role="listbox">

				<div class="carousel-item active">
						<img src="https://cdn.discordapp.com/attachments/666663327153258506/678283398678052931/Untitled.png" alt="First slide">
						<div class="carousel-caption d-none d-md-block">
							<div class="banner-text">
								<h2>NML</h2>
							</div>
						</div>
					</div>

				<?php 
					$sql = "SELECT * FROM Product, Managerchoice WHERE Product.ProductID = Managerchoice.ProductID";
					$Result = $conn->query($sql);
					while ($row = mysqli_fetch_assoc($Result)) {
						$name = $row['Name'];
						$photo = $row['photo'];
				?>


					<div class="carousel-item">
						<img src=<?php echo $photo ?>>
						<div class="carousel-caption d-none d-md-block">
							<div class="banner-text">
								<h2 style="color:black;"><?php echo $name ?></h2>
							</div>
						</div>
					</div>
					<!-- <div class="carousel-item">
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
					</div> -->
				<?php
					}
				?>
				</div>
				<a class="carousel-control-prev" href="#prodcarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#prodcarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>
		<!-- <centre><img class="center" src="images/one.jpg" alt=""></centre> -->
		<p>
			What is a paragraph?
			Paragraphs are the building blocks of papers. Many students define paragraphs in terms of length: a paragraph is a group of at least five sentences, a paragraph is half a page long, etc. In reality, though, the unity and coherence of ideas among sentences is what constitutes a paragraph. A paragraph is defined as “a group of sentences or a single sentence that forms a unit” (Lunsford and Connors 116). Length and appearance do not determine whether a section in a paper is a paragraph. For instance, in some styles of writing, particularly journalistic styles, a paragraph can be just one sentence long. Ultimately, a paragraph is a sentence or group of sentences that support one main idea. In this handout, we will refer to this as the “controlling idea,” because it controls what happens in the rest of the paragraph.
			</br>
			</br>
			How do I decide what to put in a paragraph?
			Before you can begin to determine what the composition of a particular paragraph will be, you must first decide on an argument and a working thesis statement for your paper. What is the most important idea that you are trying to convey to your reader? The information in each paragraph must be related to that idea. In other words, your paragraphs should remind your reader that there is a recurrent relationship between your thesis and the information in each paragraph. A working thesis functions like a seed from which your paper, and your ideas, will grow. The whole process is an organic one—a natural progression from a seed to a full-blown paper where there are direct, familial relationships between all of the ideas in the paper.
			</br>
			</br>
			The decision about what to put into your paragraphs begins with the germination of a seed of ideas; this “germination process” is better known as brainstorming. There are many techniques for brainstorming; whichever one you choose, this stage of paragraph development cannot be skipped. Building paragraphs can be like building a skyscraper: there must be a well-planned foundation that supports what you are building. Any cracks, inconsistencies, or other corruptions of the foundation can cause your whole paper to crumble.
			</br>
			</br>
			So, let’s suppose that you have done some brainstorming to develop your thesis. What else should you keep in mind as you begin to create paragraphs? Every paragraph in a paper should be:
			</br>
			</br>
			Unified: All of the sentences in a single paragraph should be related to a single controlling idea (often expressed in the topic sentence of the paragraph).
			Clearly related to the thesis: The sentences should all refer to the central idea, or thesis, of the paper (Rosen and Behrens 119).
			Coherent: The sentences should be arranged in a logical manner and should follow a definite plan for development (Rosen and Behrens 119).
			Well-developed: Every idea discussed in the paragraph should be adequately explained and supported through evidence and details that work together to explain the paragraph’s controlling idea (Rosen and Behrens 119).
		</p>
	</section>
	<?php include 'components/footer.php'; ?>

</body>

</html>
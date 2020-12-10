<?php
include("header.php");
?>
<!-- full Title -->
<div class="full-title">
	<div class="container">
		<!-- Page Heading/Breadcrumbs -->
		<h1 class="mt-4 mb-3">Portfolio Item
			<small>Subheading</small>
		</h1>
	</div>
</div>

<!-- Page Content -->
<div class="container">
	<div class="breadcrumb-main">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.html">Home</a>
			</li>
			<li class="breadcrumb-item active">Portfolio Item</li>
		</ol>
	</div>

	<!-- Portfolio Item Row -->
	<div class="row">
		<div class="col-md-8">
			<img class="img-fluid" src="images/portfolio-big-Item.jpg" alt="" />
		</div>
		<div class="col-md-4">
			<h3 class="my-3">Phasellus et nisi ut sapien ultricies laoreet.</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
			<h3 class="my-3">Project Details</h3>
			<ul>
				<li>Lorem Ipsum</li>
				<li>Dolor Sit Amet</li>
				<li>Consectetur</li>
				<li>Adipiscing Elit</li>
			</ul>
		</div>
	</div>
	<!-- /.row -->

	<div class="related-projects">
		<!-- Related Projects Row -->
		<h3>Related Projects</h3>
		<div class="row">
			<div class="col-md-3 col-sm-6 mb-4">
				<a href="#">
					<img class="img-fluid" src="images/related-pro-01.jpg" alt="" />
				</a>
			</div>

			<div class="col-md-3 col-sm-6 mb-4">
				<a href="#">
					<img class="img-fluid" src="images/related-pro-02.jpg" alt="" />
				</a>
			</div>

			<div class="col-md-3 col-sm-6 mb-4">
				<a href="#">
					<img class="img-fluid" src="images/related-pro-03.jpg" alt="" />
				</a>
			</div>

			<div class="col-md-3 col-sm-6 mb-4">
				<a href="#">
					<img class="img-fluid" src="images/related-pro-04.jpg" alt="" />
				</a>
			</div>

		</div>
		<!-- /.row -->
	</div>
</div>
<!-- /.container -->
<?php
include("footer.php");
?>
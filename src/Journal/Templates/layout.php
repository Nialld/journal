<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>The Journal</title>
	<meta name="description" content="The Journal test project">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/examples/blog/blog.css">
</head>

<body>
	<header>
		<div class="blog-masthead">
			<div class="container">
				<nav class="nav">
					<a class="nav-link active" href="/">Home</a>
				</nav>
			</div>
		</div>

		<div class="blog-header">
			<div class="container">
				<h1 class="blog-title">The Journal</h1>
				<p class="lead blog-description">An demo built with Bootstrap.</p>
			</div>
		</div>
	</header>
	<?=$this->section('content')?>
	<footer class="blog-footer">
		<p>Demo built for <a href="http://www.thejournal.ie/">The Journal</a> by <a href="https://www.linkedin.com/in/nialldawson" target="NiallDawson">Niall Dawson</a>.</p>
		<p>
			<a href="#">Back to top</a>
		</p>
	</footer>
</body>
</html>

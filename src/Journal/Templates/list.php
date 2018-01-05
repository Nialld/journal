<?php $this->layout('layout') ?>

<main role="main" class="container">

	<div class="row">

		<div class="col-sm-8 blog-main">

			<? foreach ($articles as $article): /* @var $article \Journal\Article */ ?>
			<? if (!$article->canRender()) continue; ?>
			<?php $this->insert('article', ['article'=>$article]) ?>
			<? endforeach; ?>

		</div><!-- /.blog-main -->

		<aside class="col-sm-3 ml-sm-auto blog-sidebar">
			<div class="sidebar-module">
				<h4>Slugs</h4>
				<ol class="list-unstyled">
					<? foreach($articles as $article): ?>
						<li><a class="badge badge-primary" href="/<?= $article->getSlug() ?>"><?= $article->getSlug(); ?></a></li>
					<? endforeach   ; ?>
				</ol>
			</div>
		</aside>

	</div><!-- /.row -->

</main>
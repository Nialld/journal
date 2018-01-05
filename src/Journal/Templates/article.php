<? $x = 1; /* @var $article \Journal\Article */?>
<div class="blog-post">
	<h5><?= $this->e($article->getTitle()); ?></h5>
	<p class="blog-post-meta"><?= $article->getDate('jS M, Y'); ?> by <a href="https://twitter.com/<?= $this->e($article->getAuthorTwitter()); ?>"><?= $this->e($article->getAuthorName()); ?></a>
	</p>
	<p><?= $article->getExcerpt(); ?></p>
	<a href="<?= $article->getPermalink() ?>" target="journal"><img src="<?= $article->getImage() ?>" alt="<?= $this->e($article->getTitle()); ?>" class="img-thumbnail"></a>
</div><!-- /.blog-post -->
<hr/>
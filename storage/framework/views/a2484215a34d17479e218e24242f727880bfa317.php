
<div class="meta group">
	<?php if($article->created_at): ?>
    	<p class="date"><i class="icon-calendar"></i><?php echo e($article->created_at->format('F j, Y')); ?></p>
    <?php endif; ?>
    <p class="author"><i class="icon-user"></i> <span><?php echo e(Lang::get('site.article')['by_user']); ?> <a href="author.html" title="<?php echo e(Lang::get('site.article')['posts_by'] . ' ' . $article->user->name); ?>" rel="author"><?php echo e($article->user->name); ?></a></span></p>
    <?php if($article->category->alias == 'blog' || $article->category->alias == 'portfolio'): ?>
        <p class="categories"><i class="icon-tags"></i> <span><?php echo e(Lang::get('site.article')['in_category']); ?> <a href="<?php echo e(route(Route::currentRouteName())); ?>" title="<?php echo e(Lang::get('site.article')['view_all_posts_in'] . ' ' . $article->category->title); ?>" rel="category tag"><?php echo e($article->category->title); ?></a></span></p>
    <?php else: ?>
        <p class="categories"><i class="icon-tags"></i> <span><?php echo e(Lang::get('site.article')['in_category']); ?> <a href="<?php echo e(route('articlesCategory', ['alias' => $article->category->alias])); ?>" title="<?php echo e(Lang::get('site.article')['view_all_posts_in'] . ' ' . $article->category->title); ?>" rel="category tag"><?php echo e($article->category->title); ?></a></span></p>
    <?php endif; ?>
    <p class="comments"><i class="icon-comment"></i> <span><a href="<?php echo e(route('articleShow', ['alias' => $article->alias])); ?>#comments" title="<?php echo e(Lang::get('site.article')['comment_on'] . ' ' . $article->title); ?>"><?php echo e(count($article->comments) . ' ' . Lang::choice('site.article.comments', count($article->comments))); ?></a></span></p>
</div>
<div class="thumbnail">
    <h1 class="post-title"><a href="<?php echo e(route('articleShow', ['alias' => $article->alias])); ?>"><?php echo e($article->title); ?></a></h1>
    <div class="image-wrap">
    	<?php if($article->image->path): ?>
        	<img width="720" height="298" src="<?php echo e(asset(env('THEME'))); ?>/images/articles/<?php echo e($article->image->path); ?>" class="attachment-blog_big wp-post-image" alt="<?php echo e($article->title); ?>" title="<?php echo e($article->title); ?>" />
        <?php endif; ?>                            
    </div>
</div>
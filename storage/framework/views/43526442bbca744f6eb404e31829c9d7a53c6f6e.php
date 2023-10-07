<?php if($portfolio): ?>
    <div class="clear"></div>
    <div class="posts">
        <div class="portfolio type-portfolio status-publish hentry hentry-post group portfolio-post internal-post">
            <div class="post_header portfolio_header group">
            	<?php if($portfolio->image->path): ?>
                	<img width="700" height="260" src="<?php echo e(asset(env('THEME'))); ?>/images/portfolios/<?php echo e($portfolio->image->path); ?>" class="internal wp-post-image" alt="work" title="work" />                                
                <?php endif; ?>
                <h2><?php echo e($portfolio->title); ?></h2>
            </div>
            <div class="post_content group  no-skills ">
                <p><?php echo $portfolio->body; ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>
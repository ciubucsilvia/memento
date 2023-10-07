<?php echo $__env->make(env('THEME') . '.site.parts.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    

<div id="respond">
    <h3 id="reply-title">Leave a <span>Reply</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h3>
    <form action="<?php echo e(route('commentsStore')); ?>" method="post" id="commentform">
        <?php if(!Auth::check()): ?>
            <p class="comment-form-author"><label for="author"><?php echo e($field_comment['name']); ?></label> <input id="author" name="name" type="text" value="" size="30" aria-required="true" /></p>
            <p class="comment-form-email"><label for="email"><?php echo e($field_comment['email']); ?></label> <input id="email" name="email" type="text" value="" size="30" aria-required="true" /></p>
            <p class="comment-form-url"><label for="url"><?php echo e($field_comment['website']); ?></label><input id="url" name="site" type="text" value="" size="30" /></p>
        <?php endif; ?>
        <p class="comment-form-comment"><label for="comment"><?php echo e($field_comment['your_comment']); ?></label><textarea id="comment" name="body" cols="45" rows="8"></textarea></p>
        <div class="clear"></div>
        <p class="form-submit">
            <input type="submit" id="submit" value="<?php echo e($field_comment['submit']); ?>" />
            <input type="hidden" name="comment_post_ID" value="<?php echo e($article->id); ?>" id="comment_post_ID" />
            <input type="hidden" name="comment_parent" id="comment_parent" value="0" />
        </p>
        <?php echo e(csrf_field()); ?>

    </form>
</div>
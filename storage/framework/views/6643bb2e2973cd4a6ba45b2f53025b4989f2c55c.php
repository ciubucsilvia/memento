<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="comment byuser comment-author-marco even thread-even depth-1">
        
        <div id="comment-<?php echo e($item->id); ?>" class="comment-container">
            <div class="comment-author vcard">
                <?php $hash =  isset($item->email) ? md5($item->email) : md5($item->user->email) ?>
                <img alt="" src="https://www.gravatar.com/avatar/<?php echo e($hash); ?>?d=mm&s=75" class="avatar avatar-75 photo" height="75" width="75" />                <cite class="fn"><?php echo e(isset($item->user->name) ? $item->user->name : $item->name); ?></cite>             
            </div>
            <div class="comment-meta commentmetadata">
                <div class="intro">
                    <div class="commentDate">
                        <a href="#comment-<?php echo e($item->id); ?>">
                        <?php echo e(is_object($item->created_at) ? $item->created_at->format('F j, Y \a\t H:i') : ''); ?></a>
                    </div>
                    <!-- <div class="commentNumber">#&nbsp;</div> -->
                </div>
                <div class="comment-body">
                    <p><?php echo e($item->body); ?></p>
                </div>
                <div class="reply group">
                    <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-<?php echo e($item->id); ?>&quot;, &quot;<?php echo e($item->id); ?>&quot;, &quot;respond&quot;, &quot;<?php echo e($item->article_id); ?>&quot;)"><?php echo e(Lang::get('site.article')['reply']); ?></a>                
                </div>
            </div>
        </div>
     
         <?php if(isset($com[$item->id])): ?>
        <ul class="children">
            <?php echo $__env->make(env('THEME') . '.site.comment', ['items'=>$com[$item->id]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </ul>
        <?php endif; ?>
        
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
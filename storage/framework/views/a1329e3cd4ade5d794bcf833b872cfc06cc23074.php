		<div id="footer" class="sidebar-right">
            <div class="group inner footer_row_1 footer_cols_3">
                
                <div class="widget-first widget recent-posts">
                    <h3><?php echo e(Lang::get('site.index')['from_our_blog']); ?></h3>
                    <div class="recent-post group">
                        <?php if($articles): ?>
                            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="hentry-post group">
                                    <?php if($article->created_at): ?>
                                        <p class="post-date"><span class="day"><?php echo e($article->created_at->format('d')); ?></span><span class="month"><?php echo e($article->created_at->format('M')); ?></span><span class="year"><?php echo e($article->created_at->format('Y')); ?></span></p>
                                    <?php endif; ?>
                                    <h3><a href="<?php echo e(route('articleShow', ['alias' => $article->alias])); ?>" title="<?php echo e($article->title); ?>" class="title"><?php echo e($article->title); ?></a></h3>
                                    <p class="meta">
                                        <span class="comments"><a href="<?php echo e(route('articleShow', ['alias' => $article->alias])); ?>#respond" title="<?php echo e(Lang::get('site.index')['comment_on'] . $article->title); ?>">
                                            <?php if(count($article->comments) > 0): ?>
                                                <?php echo e(count($article->comments)); ?> . ' ' . Lang::choice(('site.index')['comments'], count($article->comments))
                                            <?php else: ?> 
                                                <?php echo e(Lang::get('site.index')['comments_no']); ?>

                                            <?php endif; ?>
                                        </a></span><br />
                                        <a href="<?php echo e(route('articleShow', ['alias' => $article->alias])); ?>" class="read-more"></a>
                                    </p>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>                                           
                    </div>
                </div>
                
                <div class="widget widget_nav_menu">
                    <h3><?php echo e(Lang::get('site.index')['custom_menu']); ?></h3>
                    <?php if($menuBottom): ?>
                    <div class="menu-footer-menu-container">
                        <ul id="menu-footer-menu" class="menu">
                            <?php $__currentLoopData = $menuBottom->roots(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <li class="columns2">
                                    <a href="<?php echo e($item->url()); ?>"><?php echo e($item->title); ?></a>
                                </li> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="quick-contact-widget widget two-third last">
                    <div class="widget-last widget quick-contact">
                        <h3><?php echo e(Lang::get('site.index')['quick_contact']); ?></h3>
                        
                        <?php echo $__env->make(env('THEME') . '.parts.form_contact_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- START FOOTER -->
        <div id="copyright" class="group">
            <div class="inner group">
                <div class="left">
                    <p>
                    	Copyright <a href="http://yithemes.com/live/?theme=memento"><strong>Mem[é]nto</strong></a> 2012 -
                    	Powered by <a href="http://yithemes.com" title="Free HTML Template"><strong>Your Inspiration Themes</strong></a>
                    </p>
                </div>
                <div class="right">
                    <a href="#" class="socials facebook" style="font-size:30px;" title="Facebook">F</a>
                    <a href="#" class="socials twitter" style="font-size:30px;" title="Twitter">L</a>
                    <a href="#" class="socials skype" style="font-size:30px;" title="Skype">H</a>
                    <a href="#" class="socials google" style="font-size:30px;" title="Google">G</a>
                    <a href="#" class="socials linkedin" style="font-size:30px;" title="Linkedin">I</a>
                    <a href="#" class="socials rss" style="font-size:30px;" title="Rss">R</a>
                </div>
            </div>
        </div>
<?php 
if (post_password_required()) return; 

?>

<div class="container-fluid">
    <div class="row">
        
            <div class="content_comments">
                <div id="comments" class="comments">

                    <?php if(have_comments()){ ?>
                        <div>
                            <h4 class="block-title">
                                <?php comments_number(esc_html__('0 Comment', 'eventmana'), esc_html__('1 Comment', 'eventmana'), esc_html__('% Comments', 'eventmana')); ?>
                            </h4>
                        </div>

                    <?php } ?>

                    <?php if (have_comments()) { ?>
                        <ul class="commentlists">
                            <?php wp_list_comments('callback=eventmana_theme_comment'); ?>
                        </ul>
                        <?php
                        // Are there comments to navigate through?

                        if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                            <footer class="navigation comment-navigation" role="navigation">
                                <?php esc_html_e( 'Comment navigation', 'eventmana' ); ?>
                                <div class="previous"><?php previous_comments_link(__('&larr; Older Comments', 'eventmana')); ?></div>
                                <div class="next right"><?php next_comments_link(__('Newer Comments &rarr;', 'eventmana')); ?></div>
                            </footer><!-- .comment-navigation -->
                        <?php endif; // Check for comment navigation ?>

                        <?php if (!comments_open() && get_comments_number()) : ?>
                            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'eventmana'); ?></p>
                        <?php endif; ?>
                    <?php } ?>

                    <?php

                    $aria_req = ($req ? " aria-required='true'" : '');
                    $comment_args = array(
                        'title_reply' => wp_kses('<h4 class="block-title">' . esc_html__('Leave a reply', 'eventmana') . '</h4>', true),
                        'fields' => apply_filters('comment_form_default_fields', array(
                            'author' => '<div class="col-md-6"><input type="text" name="author" value="' . esc_attr($commenter['comment_author']) . '" ' . esc_attr($aria_req) . ' class="form-control" placeholder="'. esc_html__('Name','eventmana') .'" />',
                            'email' => '<input type="text" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" ' . esc_attr($aria_req) . ' class="form-control" placeholder="'. esc_html__('Email','eventmana') .'" />',
                            'phone' => '<input type="text" name="url" value="' . esc_url($commenter['comment_author_url']) . '" ' . esc_attr($aria_req) . ' class="form-control" placeholder="'. esc_html__('Website','eventmana') .'" /></div>',
                            
                        )),
                        'comment_field' => '<div class="col-md-6">                               
                                                    <textarea class="form-control" rows="7" name="comment" placeholder="'. esc_html__('Your Comment ...','eventmana') .'"></textarea>
                                            </div>',
                                            'label_submit' => ''.esc_html__('Submit Comment','eventmana').'',
                                            'comment_notes_before' => '',
                                            'comment_notes_after' => '',
                    );
                    ?>

                    <?php global $post; ?>
                    <?php if ('open' == $post->comment_status) { ?>
                        <div class="commentform row">
                            
                                <?php comment_form($comment_args); ?>
                            
                        </div><!-- end commentform -->
                    <?php } ?>


                </div><!-- end comments -->
            </div>
        
    </div>
</div>



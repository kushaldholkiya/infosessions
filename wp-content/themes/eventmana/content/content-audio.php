<?php $sticky_class = is_sticky()?'sticky':''; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class); ?>  >
		
		<?php if(has_post_format('audio')){ ?>
        <div class="post-media">
        	<?php eventmana_postformat_audio(); /* Display video of post */ ?>
        </div>
        <?php } ?>

        <div class="post-title">
	            <?php eventmana_content_title(); /* Display title of post */ ?>
	    </div>

        <div class="post-meta">
	        <?php eventmana_content_meta(); /* Display Date, Author, Comment */ ?>
	    </div>

	    <div class="post-body">
	            <?php eventmana_content_body(); /* Display content of post or intro in category page */ ?>
	    </div>

	    <?php if(!is_single()){ ?> 
	            <?php eventmana_content_readmore(); /* Display read more button in category page */ ?>
	    <?php }?>

	    <?php if(is_single()){ ?>
	    <?php eventmana_content_tag(); /* Display tags, category */ ?>
	    <?php } ?>

</article>
<?php 
$show_page_heading = get_post_meta(get_the_id(), "eventmana_met_page_heading", true) ? get_post_meta(get_the_id(), "eventmana_met_page_heading", true) : 'show';
 ?>
<?php if($show_page_heading == 'show'){ ?>
    <h1 class="post-title">
    	<?php the_title();?>
    </h1>
<?php } ?>

<?php 
	the_content();
	wp_link_pages();
?>

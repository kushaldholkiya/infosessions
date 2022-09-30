<?php 
function eventmana_breadcrumbs() { 
global $wp_query;


ob_start();

global $post;
global $wp_query;
$type = get_post_type();

if ( is_home () && is_front_page () ) {
    echo "<h1>".esc_html__('Home','eventmana')."</h1>";
} elseif ( is_home () ) {
    echo "<h1>".esc_html__('Home','eventmana')."</h1>";
} elseif ( is_search () ) {
	echo "<h1>".esc_html__('Search','eventmana')."</h1>";
} else if(is_category () ){
	 echo single_cat_title('<h1>');
}else if (is_tag ()){
	echo "<h1>".esc_html__('Tags', 'eventmana')."</h1>";
}else if( is_tax () || is_archive() ){
	echo "<h1>".get_the_archive_title()."</h1>";
}else if ( is_tax('eventgroup') ){
	echo '<h1>'.$wp_query->query_vars['eventgroup'].'</h1>';
} elseif ( !is_404 () ) {
   echo "<h1>".get_the_title()."</h1>";
} 

?>

<?php  if(class_exists('Woocommerce') && is_woocommerce()){
       		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
       		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 10 );
       		add_action('eventmana_woocommerce_breadcrumb', 'woocommerce_breadcrumb', 10);
       		do_action('eventmana_woocommerce_breadcrumb');
       		return false;
       }
       
?>

<div id="breadcrumbs" >
        <?php
      
        if(in_array("search-no-results",get_body_class())){ ?>
           <div class="breadcrumbs" class="col-sm-12">
           <a href="<?php get_template_directory_uri().'/'; ?>"><?php esc_html__('Home', 'eventmana'); ?></a>
           <span class="separator">/</span>
           <span class="current"><?php esc_html__('Search results for', 'eventmana'); ?> "<?php echo get_search_query(); ?>"</span> </div>
        <?php
            }else{
            	$separator = '<span class="separator">>></span>';
		        $home = esc_html__('Home', 'eventmana');
		        $before = '<li>';
		        $after = '</li>'; 
		?>


		            <div class="breadcrumbs">
						<div class="breadcrumbs-pattern">
							<div class="container">
								<div class="row">
									<ul class="breadcrumb"><?php
		        
		        $homeLink = home_url('/');



		        echo '<li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $separator . ' ';


		      if($type == 'event'){

					if (is_single()){
						$taxonomies  = get_object_taxonomies($type);
						$excluded_taxonomies =  apply_filters('eventgroup', array('post_tag','post_format'));
						$terms = '';
						if(!empty($taxonomies)){
							foreach($taxonomies as $taxonomy){
								if(!in_array($taxonomy, $excluded_taxonomies)){
									$terms .= get_the_term_list( $post->ID, $taxonomy, '', '$$$', '' );
								}
							}
						}
						$terms = explode('$$$',$terms);
						echo $terms[0].$separator;
						print $before . get_the_title() . $after;

					}else if (is_tax('eventgroup')){
						$term_tax = get_term_by('slug',$wp_query->query_vars['eventgroup'], 'eventgroup');
						echo $before .$term_tax->name. $after;
					}

					
				
					
				}else if ( is_category() ) {
				
			        global $wp_query;
			        $cat_obj = $wp_query->get_queried_object();
			        $thisCat = $cat_obj->term_id;
			        $thisCat = get_category($thisCat);
			        $parentCat = get_category($thisCat->parent);
			        if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' '));
			        print $before . '' . single_cat_title('', false) . '' . $after;
		        } elseif ( is_day() ) {
			        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $separator . ' ';
			        echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $separator . ' ';
			        print $before . esc_html__('Archive by date', 'eventmana').' "' . get_the_time('d') . '"' . $after;
		        } elseif ( is_month() ) {
			        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $separator . ' ';
			        print $before . esc_html__('Archive by month', 'eventmana').' "' . get_the_time('F') . '"' . $after;
		        } elseif ( is_year() ) {
		        	print $before . esc_html__('Archive by year', 'eventmana').'"' . get_the_time('Y') . '"' . $after;
		        } elseif ( is_single() && !is_attachment() ) {
			        if ( get_post_type() != 'post' ) {
				        $post_type = get_post_type_object(get_post_type());
				        $slug = $post_type->rewrite;
				        echo '<a href="' . $homeLink .  $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>' . $separator . ' ';
				        print $before . get_the_title() . $after;
			        } else {
				        $cat = get_the_category(); $cat = $cat[0];
				        echo ' ' . get_category_parents($cat, TRUE, ' ' . $separator . ' ') . ' ';
				        print $before . '' . get_the_title() . '' . $after;
			        }
		        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			        $post_type = get_post_type_object(get_post_type());
			        print $before . $post_type->labels->singular_name . $after;
		        } elseif ( is_attachment() ) {
			        $parent_id  = $post->post_parent;
			        $breadcrumbs = array();
			        while ($parent_id) {
				        $page = get_page($parent_id);
				        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				        $parent_id    = $page->post_parent;
			        }
			        $breadcrumbs = array_reverse($breadcrumbs);
			        foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $separator . ' ';
			        print $before . '' . get_the_title() . '' . $after;
		        } elseif ( is_page() && !$post->post_parent ) {
		        	print $before . '' . get_the_title() . '' . $after;
		        } elseif ( is_page() && $post->post_parent ) {
			        $parent_id  = $post->post_parent;
			        $breadcrumbs = array();
			        while ($parent_id) {
				        $page = get_page($parent_id);
				        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				        $parent_id    = $page->post_parent;
			        }
			        $breadcrumbs = array_reverse($breadcrumbs);
			        foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $separator . ' ';
		        	print $before . '' . get_the_title() . '"' . $after;
		        } elseif ( is_search()) {
		            print $before . esc_html__('Search results for', 'eventmana').' "' . get_search_query() . '"' . $after;
		        } elseif ( is_tag() ) {
		        	print $before . esc_html__('Archive by tag', 'eventmana').' "' . single_tag_title('', false) . '"' . $after;
		        } elseif ( is_author() ) {
		        global $author;
		        $userdata = get_userdata($author);
		        	print $before . esc_html__('Articles posted by', 'eventmana').' "' . $userdata->display_name . '"' . $after;
		        } elseif ( is_404() ) {
		        	print $before . esc_html__('You got it Error 404 not Found', 'eventmana').'&nbsp;' . $after;
		        }
		        if ( get_query_var('paged') ) {
			        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' ';
			        //echo ('Page') . ' ' . get_query_var('paged');
			        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
		        }
								        echo '</ul>
										</div>
									</div>
								</div>
							</div>';
            }
        ?>
</div>
<?php 

$list_post2 = ob_get_contents();ob_end_clean();?>
 <?php print  $list_post2; 
} ?>

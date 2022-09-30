<?php
add_action('init','init_visual_composer_custom',1000);
function init_visual_composer_custom(){
    if(function_exists('vc_map')){

vc_map( array(
	 "name" => __("Slideshow", 'eventmana'),
	 "base" => "eventmana_slideshow",
	 "class" => "",
	 "category" => __("My shortcode", 'eventmana'),
	 "icon" => "icon-qk",   
	 "params" => array(
	  
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Slug Group",'eventmana'),
		       "param_name" => "slug_group",
		       "value" => "",
		       "description" => 'Insert slug of group. For instalce: home-1. You can find in Slideshows >> Group<br/> '
		    ),
		  array(
		     "type" => "dropdown",
		     "holder" => "div",
		     "class" => "",
		     "heading" => __("Order by",'eventmana'),
		     "param_name" => "orderby",
		     "value" => array(   
		            __('id', 'eventmana') => 'ID',
		            __('title', 'eventmana') => 'title',
		            __('date', 'eventmana') => 'date',
		            __('modified', 'eventmana') => 'modified',
		            __('rand', 'eventmana') => 'rand',
		            ),
		     "default" => 'ID'
		  ),
		  array(
		     "type" => "dropdown",
		     "holder" => "div",
		     "class" => "",
		     "heading" => __("Order",'eventmana'),
		     "param_name" => "order",
		     "value" => array(   
		            __('DESC', 'eventmana') => 'DESC',
		            __('ASC', 'eventmana') => 'ASC',                    
		            ),
		     "default" => 'DESC'
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Count items",'eventmana'),
		       "param_name" => "count",
		       "value" => "2",               
		  ),
		  array(
		     "type" => "dropdown",
		     "holder" => "div",
		     "class" => "",
		     "heading" => __("Auto Slider",'eventmana'),
		     "param_name" => "auto_slider",
		     "value" => array(   
		            __('Yes', 'eventmana') => 'true',
		            __('No', 'eventmana') => 'false',                    
		            ),
		     "default" => 'true'
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Duration when auto play slider ms. 3000ms = 3s",'eventmana'),
		       "param_name" => "duration",
		       "value" => "3000",               
		  ),
		  array(
		     "type" => "dropdown",
		     "holder" => "div",
		     "class" => "",
		     "heading" => __("Show navigation",'eventmana'),
		     "param_name" => "navigation",
		     "value" => array(   
		            __('Yes', 'eventmana') => 'true',
		            __('No', 'eventmana') => 'false',                    
		            ),
		     "default" => 'true'
		  ),
		  array(
		     "type" => "dropdown",
		     "holder" => "div",
		     "class" => "",
		     "heading" => __("Loop",'eventmana'),
		     "param_name" => "loop",
		     "value" => array(   
		            __('Yes', 'eventmana') => 'true',
		            __('No', 'eventmana') => 'false',                    
		            ),
		     "default" => 'true'
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Class",'eventmana'),
		       "param_name" => "class",
		       "value" => "",
		       "description" => 'Insert class to use for your style'
		    )

	 
)));



vc_map( array(
	 "name" => __("Slideshow Multi Background", 'eventmana'),
	 "base" => "eventmana_slideshow_multi_bg",
	 "class" => "",
	 "category" => __("My shortcode", 'eventmana'),
	 "icon" => "icon-qk",   
	 "params" => array(
	  
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Slug Group",'eventmana'),
		       "param_name" => "slug_group",
		       "value" => "",
		       "description" => 'Insert slug of group. For instalce: home-1. You can find in Slideshows >> Group<br/> '
		    ),
		  array(
		     "type" => "dropdown",
		     "holder" => "div",
		     "class" => "",
		     "heading" => __("Order by",'eventmana'),
		     "param_name" => "orderby",
		     "value" => array(   
		            __('id', 'eventmana') => 'ID',
		            __('title', 'eventmana') => 'title',
		            __('date', 'eventmana') => 'date',
		            __('modified', 'eventmana') => 'modified',
		            __('rand', 'eventmana') => 'rand',
		            ),
		     "default" => 'ID'
		  ),
		  array(
		     "type" => "dropdown",
		     "holder" => "div",
		     "class" => "",
		     "heading" => __("Order",'eventmana'),
		     "param_name" => "order",
		     "value" => array(   
		            __('DESC', 'eventmana') => 'DESC',
		            __('ASC', 'eventmana') => 'ASC',                    
		            ),
		     "default" => 'DESC'
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Count items",'eventmana'),
		       "param_name" => "count",
		       "value" => "2",               
		  ),
		  array(
		     "type" => "dropdown",
		     "holder" => "div",
		     "class" => "",
		     "heading" => __("Auto Slider",'eventmana'),
		     "param_name" => "auto_slider",
		     "value" => array(   
		            __('Yes', 'eventmana') => 'true',
		            __('No', 'eventmana') => 'false',                    
		            ),
		     "default" => 'true'
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Duration when auto play slider ms. 3000ms = 3s",'eventmana'),
		       "param_name" => "duration",
		       "value" => "3000",               
		  ),
		  array(
		     "type" => "dropdown",
		     "holder" => "div",
		     "class" => "",
		     "heading" => __("Show navigation",'eventmana'),
		     "param_name" => "navigation",
		     "value" => array(   
		            __('Yes', 'eventmana') => 'true',
		            __('No', 'eventmana') => 'false',                    
		            ),
		     "default" => 'true'
		  ),
		  array(
		     "type" => "dropdown",
		     "holder" => "div",
		     "class" => "",
		     "heading" => __("Loop",'eventmana'),
		     "param_name" => "loop",
		     "value" => array(   
		            __('Yes', 'eventmana') => 'true',
		            __('No', 'eventmana') => 'false',                    
		            ),
		     "default" => 'true'
		  ),
		   array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Height Desk",'eventmana'),
		       "param_name" => "height_desk",
		       "value" => "768px",
		     
		    ),
		    array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Height Ipad",'eventmana'),
		       "param_name" => "height_ipad",
		       "value" => "768px",
		     
		    ),
		    array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Height Mobile",'eventmana'),
		       "param_name" => "height_mobile",
		       "value" => "768px",
		     
		    ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Class",'eventmana'),
		       "param_name" => "class",
		       "value" => "",
		       "description" => 'Insert class to use for your style'
		    )

	 
)));

vc_map( array(
	 "name" => __("Countdown", 'countdown'),
	 "base" => "eventmana_countdown",
	 "class" => "",
	 "category" => __("My shortcode", 'eventmana'),
	 "icon" => "icon-qk",   
	 "params" => array(
	  	
	  		array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("End Year",'eventmana'),
		       "param_name" => "end_year",
		       "value" => "",
		       "description" => __('For example: 2015','eventmana')

		  ),
  		array(
	       "type" => "textfield",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("End Month",'eventmana'),
	       "param_name" => "end_month",
	       "value" => "",
	       "description" => __('Insert from 1 to 12. For example: 5','eventmana')

		  ),
  		array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("End day",'eventmana'),
		       "param_name" => "end_day",
		       "value" => "",
		       "description" => __('For example: 10','eventmana')

		  ),
		  
	  	  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("End Hour",'eventmana'),
		       "param_name" => "end_hour",
		       "value" => "",
		       "description" => __('From 1 - 24 hours','eventmana')

		  ),	
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("End Minutes",'eventmana'),
		       "param_name" => "end_minutes",
		       "value" => "",
		       "description" => __('From 1 - 60 hours','eventmana')

		  ),	
		  
		  
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Display format",'eventmana'),
		       "param_name" => "display_format",
		       "value" => "dHMS",
		       "description" => __("Display Format: dHMS. d: Day, H: Hour, M: Month, S: Second. You can insert HMS or dHM or dH. default dHMS",'eventmana')          
		  ),
		  
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Time zone",'eventmana'),
		       "param_name" => "timezone",
		       "value" => "0",
		       "description" => __('The timezone (hours or minutes from GMT) for the target times. <br/>
					For example:<br/>
					If Timezone is UTC-9:00 you have to insert -9 <br/>
					If Timezone is UTC-9:30, you have to insert -9*60+30=-570. <br/>
					Read about UTC Time: http://en.wikipedia.org/wiki/List_of_UTC_time_offsets','eventmana') 
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label Years",'eventmana'),
		       "param_name" => "years",
		       "value" => "years"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label months",'eventmana'),
		       "param_name" => "months",
		       "value" => "months"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label weeks",'eventmana'),
		       "param_name" => "weeks",
		       "value" => "weeks"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label days",'eventmana'),
		       "param_name" => "days",
		       "value" => "days"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label hours",'eventmana'),
		       "param_name" => "hours",
		       "value" => "hours"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label minutes",'eventmana'),
		       "param_name" => "minutes",
		       "value" => "minutes"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label seconds",'eventmana'),
		       "param_name" => "seconds",
		       "value" => "seconds"
		  ),

		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label Year",'eventmana'),
		       "param_name" => "year",
		       "value" => "year"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label month",'eventmana'),
		       "param_name" => "month",
		       "value" => "month"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label week",'eventmana'),
		       "param_name" => "week",
		       "value" => "week"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label day",'eventmana'),
		       "param_name" => "day",
		       "value" => "day"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label hour",'eventmana'),
		       "param_name" => "hour",
		       "value" => "hour"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label minute",'eventmana'),
		       "param_name" => "minute",
		       "value" => "minute"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("label second",'eventmana'),
		       "param_name" => "second",
		       "value" => "second"
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Id",'eventmana'),
		       "param_name" => "id",
		       "value" => ""
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Class",'eventmana'),
		       "param_name" => "class",
		       "value" => "",
		       "description" => 'Insert class to use for your style'
		    )

	 
)));


vc_map( array(
	 "name" => __("Heading", 'eventmana_heading'),
	 "base" => "eventmana_heading",
	 "class" => "",
	 "category" => __("My shortcode", 'eventmana'),
	 "icon" => "icon-qk",   
	 "params" => array(
	  
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Insert font awesome",'eventmana'),
		       "param_name" => "icon",
		       "value" => "",
		       "description" => __("Insert font awesome. You can find it here: http://fortawesome.github.io/Font-Awesome/icons/","eventmana")
		  ),
		  array(
		       "type" => "colorpicker",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Background of icon",'eventmana'),
		       "param_name" => "icon_bg",
		       "value" => ""
		  ),
		  array(
		       "type" => "colorpicker",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Color of icon",'eventmana'),
		       "param_name" => "icon_color",
		       "value" => ""
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Title",'eventmana'),
		       "param_name" => "title",
		       "value" => ""
		  ),
		  array(
		       "type" => "textfield",
		       "holder" => "div",
		       "class" => "",
		       "heading" => __("Description",'eventmana'),
		       "param_name" => "desc",
		       "value" => ""
		  ),
		  array(
		     "type" => "dropdown",
		     "holder" => "div",
		     "class" => "",
		     "heading" => __("Display Slash",'eventmana'),
		     "param_name" => "display_slash",
		     "value" => array(   
		            __('Yes', 'eventmana') => 'true',
		            __('No', 'eventmana') => 'false',                    
		            ),
		     "default" => 'true'
		  ),
		  
		  array(
	       "type" => "textfield",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Class",'eventmana'),
	       "param_name" => "class",
	       "value" => "",
	       "description" => 'Insert class to use for your style'
	    )


	 
)));


vc_map( array(
    "name" => __("Button", 'eventmana'),
    "base" => "eventmana_button",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",   
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("label button",'eventmana'),
            "param_name" => "label",
            "value" => ""
        ),          
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("link",'eventmana'),
            "param_name" => "link",
            "value" => "#"
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Target",'eventmana'),
            "param_name" => "target",
            "value" => array(
                  __('new window', 'eventmana') => '_blank',
                  __('Same window', 'eventmana') => '',
            ),
            "default"    => '_blank'
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Insert font awesome ",'eventmana'),
            "description" => __("Insert font awesome",'eventmana'),
            "param_name" => "icon",
            "value" => ""
           
        ),
        
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
))); 




vc_map( array(
    "name" => __("Event filter", 'eventmana'),
    "base" => "eventmana_eventfilter",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",   
    "params" => array(
        array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __("Array slug of event categories",'eventmana'),
            "param_name" => "array_slug",
            "value" => "",
            "description" => 'Insert slugs. From Left sidebar >> Events >> Group >> See Slug column in list category. For example: festival,conference,playground'
        ),          
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Count",'eventmana'),
            "param_name" => "count",
            "value" => "10",
            "description" => 'Item count for each category'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Show Past Event",'eventmana'),
            "param_name" => "show_past_event",
            "value" => array(
                  __('Yes', 'eventmana') => 'yes',
                  __('No', 'eventmana') => 'no'
            ),
            "default"    => 'yes'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Order by ",'eventmana'),
            "param_name" => "order_by",
            "value" => array(
                  __('ID', 'eventmana') => 'ID',
                  __('Title', 'eventmana') => 'title',                      
                  __('Start Date', 'eventmana') => 'eventmana_met_event_date',
                  __('End Date', 'eventmana') => 'eventmana_met_event_end_date',
                  __('Modified', 'eventmana') => 'modified',
                  __('Rand', 'eventmana') => 'rand',
            ),
            "default"    => 'ID'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Order",'eventmana'),
            "param_name" => "order",
            "value" => array(
                  __('DESC', 'eventmana') => 'DESC',
                  __('ASC', 'eventmana') => 'ASC',
            ),
            "default"  => 'DESC',
            "description" => 'Order for each category'
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Tab active default. ",'eventmana'),
            "description" => __("Insert a slug of event group, like festival. if empty will active All tab",'eventmana'),
            "param_name" => "tab_active",
            "value" => ""
           
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Change All text in filter navigation",'eventmana'),
            "param_name" => "alltext",
            "value" => "All"
           
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Change label of button",'eventmana'),
            "param_name" => "ticketdetail",
            "value" => "Ticket & Detail"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Insert icon time",'eventmana'),
            "description" => __("Insert font-awesome", "eventmana"),
            "param_name" => "icon_time",
            "value" => "fa-file-text-o"
           
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Insert icon in filter navigation ",'eventmana'),
            "description" => __("Insert font-awesome", "eventmana"),
            "param_name" => "icon_time",
            "value" => "fa-star"
        ),
    	array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Style",'eventmana'),
            "param_name" => "style",
            "value" => array(
                  __('Style 1', 'eventmana') => 'style1',
                  __('Style 2', 'eventmana') => 'style2',
            ),
            "default"  => 'style1'
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
))); 


vc_map( array(
    "name" => __("Feature", 'eventmana'),
    "base" => "eventmana_feature",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",   
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Insert font awesome",'eventmana'),
            "param_name" => "icon",
            "value" => ""
        ),          
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("title",'eventmana'),
            "param_name" => "title",
            "value" => ""
        ),
        array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __("Description",'eventmana'),
            "param_name" => "desc",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("label button",'eventmana'),
            "param_name" => "label_button",
            "value" => ""
        ),

        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("button link",'eventmana'),
            "param_name" => "button_link",
            "value" => "#"
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("target",'eventmana'),
            "param_name" => "target",
            "value" => array(
                  __('New Window', 'eventmana') => '_blank',
                  __('Same window', 'eventmana') => '',
            ),
            "default"  => '_blank'
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
)));


vc_map( array(
    "name" => __("Hotel", 'eventmana'),
    "base" => "eventmana_hotel",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",
    "as_parent" => array('only' => 'eventmana_hotel_item', ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "js_view" => 'VcColumnView',
    "show_settings_on_create" => false,
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Count items each slide",'eventmana'),
            "param_name" => "item_slide",
            "value" => "4"
        ),          
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Duration ms. 1000ms=3s",'eventmana'),
            "param_name" => "duration",
            "value" => "3000"
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Auto play",'eventmana'),
            "param_name" => "autoplay",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Navigation",'eventmana'),
            "param_name" => "navigation",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Loop",'eventmana'),
            "param_name" => "loop",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
)));

vc_map( array(
    "name" => __("Hotel item", 'eventmana'),
    "base" => "eventmana_hotel_item",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",
    "content_element" => true,
    "as_child" => array('only' => 'eventmana_hotel'),
    "params" => array(
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("image",'eventmana'),
            "param_name" => "image",
            "value" => ""
        ),          
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Title",'eventmana'),
            "param_name" => "title",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Rate",'eventmana'),
            "param_name" => "rate",
            "description" => __("Insert from 1 to 5.", 'eventmana'),
            "value" => "5"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Description",'eventmana'),
            "param_name" => "desc",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("label detail button",'eventmana'),
            "param_name" => "label_detail_button",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("link detail button",'eventmana'),
            "param_name" => "link_detail_button",
            "value" => "#"
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("target detail button",'eventmana'),
            "param_name" => "target_detail_button",
            "value" => array(
                  __('New window', 'eventmana') => '_blank',
                  __('Same window', 'eventmana') => '',
            ),
            "default"  => '_blank'
        ),

        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("label detail book",'eventmana'),
            "param_name" => "label_detail_book",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("link detail book",'eventmana'),
            "param_name" => "link_detail_book",
            "value" => "#"
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("target detail book",'eventmana'),
            "param_name" => "target_detail_book",
            "value" => array(
                  __('New window', 'eventmana') => '_blank',
                  __('Same window', 'eventmana') => '',
            ),
            "default"  => '_blank'
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
)));
 if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_eventmana_hotel extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_eventmana_hotel_item extends WPBakeryShortCode {
    }
}



vc_map( array(
    "name" => __("Testimonial", 'eventmana'),
    "base" => "eventmana_testimonial",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",
    "as_parent" => array('only' => 'eventmana_testimonial_item', ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "js_view" => 'VcColumnView',
    "show_settings_on_create" => false,
    "params" => array(
               
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Duration ms. 1000ms=3s",'eventmana'),
            "param_name" => "duration",
            "value" => "3000"
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Auto play",'eventmana'),
            "param_name" => "autoplay",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Display pagination",'eventmana'),
            "param_name" => "dots",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Loop",'eventmana'),
            "param_name" => "loop",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Style",'eventmana'),
            "param_name" => "style",
            "value" => array(
                  __('Style 1', 'eventmana') => 'style1',
                  __('Style 2', 'eventmana') => 'style2',
            ),
            "default"  => 'style1'
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
)));

vc_map( array(
    "name" => __("Testimonial item", 'eventmana'),
    "base" => "eventmana_testimonial_item",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",
    "content_element" => true,
    "as_child" => array('only' => 'eventmana_testimonial'),
    "params" => array(
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("image",'eventmana'),
            "param_name" => "image",
            "value" => ""
        ),          
        array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __("Description",'eventmana'),
            "param_name" => "description",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Author",'eventmana'),
            "param_name" => "author",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Sub title. Only use for style2",'eventmana'),
            "param_name" => "subtitle",
            "value" => ""
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Style",'eventmana'),
            "param_name" => "style",
            "value" => array(
                  __('Style 1', 'eventmana') => 'style1',
                  __('Style 2', 'eventmana') => 'style2',
            ),
            "default"  => 'style1'
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
)));
 if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_eventmana_testimonial extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_eventmana_testimonial_item extends WPBakeryShortCode {
    }
}


vc_map( array(
	"name" => __("sponsors", 'eventmana'),
	"base" => "sponsors",
	"as_parent" => array('only' => 'item_sponsors'),
	"js_view" => 'VcColumnView',
	"content_element" => true,
	"class" => "",
	"category" => __("My shortcode", 'eventmana'),
	"icon" => "icon-qk",   
	"params" => array(
	  array(
	     "type" => "dropdown",
	     "holder" => "div",
	     "class" => "",
	     "heading" => __("Auto slide",'eventmana'),
	     "param_name" => "auto",
	     "value" => array(   
	            __('True', 'eventmana') => 'true',
	            __('False', 'eventmana') => 'false',
	            ),
	     "default"  => 'true'
	  ),
	  array(
	     "type" => "dropdown",
	     "holder" => "div",
	     "class" => "",
	     "heading" => __("show navigation",'eventmana'),
	     "param_name" => "show_nav",
	     "value" => array(   
	            __('True', 'eventmana') => 'true',
	            __('False', 'eventmana') => 'false',
	            ),
	     "default"  => 'true'
	  ),
	  array(
	     "type" => "textfield",
	     "holder" => "div",
	     "class" => "",
	     "heading" => __("Display count item in each slide",'eventmana'),
	     "param_name" => "itemslide", 
	     "value"  => '5'
	  ),
	  array(
	     "type" => "dropdown",
	     "holder" => "div",
	     "class" => "",
	     "heading" => __("Loop",'eventmana'),
	     "param_name" => "loop",
	     "value" => array(   
	            __('True', 'eventmana') => 'true',
	            __('False', 'eventmana') => 'false',
	            ),
	     "default"  => 'true'
	  ),
	  array(
	       "type" => "textarea",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Time switch each the slide",'eventmana'),
	       "param_name" => "autoplaytimeout",
	       "value" => "3000",
	       "description" => __("Time switch each the slide. For example 3000ms=3s",'eventmana')
	    ),
	  array(
	       "type" => "textarea",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Animation",'eventmana'),
	       "param_name" => "animation",
	       "value" => "fadeInUp",
	       "description" => __('For example: fadeInUp. You can find animation here: http://daneden.github.io/animate.css/', 'eventmana')
	    ),
	  array(
	       "type" => "textarea",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Animation delay (ms)",'eventmana'),
	       "param_name" => "animation_delay",
	       "value" => "300",
	       "description" => __('For example: 300', 'eventmana')
	    )
 
)));

vc_map( array(
	"name" => __("item sponsors", 'eventmana'),
	"base" => "item_sponsors",
	"content_element" => true,
	"as_child" => array('only' => 'sponsors'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"class" => "",
	"category" => __("My shortcode", 'eventmana'),
	"icon" => "icon-qk",   
	"params" => array(
	  array(
	     "type" => "attach_image",
	     "holder" => "div",
	     "class" => "",
	     "heading" => __("Thumbnail",'eventmana'),
	     "param_name" => "thumbnail",
	     "value" => "",
	     "description" =>  __("Insert path of thumbnail",'eventmana')
	  ),
	  array(
	       "type" => "textarea",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Link",'eventmana'),
	       "param_name" => "link",
	       "value" => "",
	       "description" => __("link",'eventmana')
	    ),
	  array(
	       "type" => "textarea",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Alt",'eventmana'),
	       "param_name" => "alt",
	       "value" => "",
	       "description" => __("alt",'eventmana')
	    )

 
)));  


if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_sponsors extends WPBakeryShortCodesContainer {
  }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_item_sponsors extends WPBakeryShortCode {
  }
}



vc_map( array(
    "name" => __("Speaker", 'eventmana'),
    "base" => "eventmana_speaker",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",
    "as_parent" => array('only' => 'eventmana_speaker_item', ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "js_view" => 'VcColumnView',
    "show_settings_on_create" => false,
    "params" => array(
               
    	array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Count items each slide",'eventmana'),
            "param_name" => "item_slide",
            "value" => "4"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Duration ms. 1000ms=3s",'eventmana'),
            "param_name" => "duration",
            "value" => "3000"
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Auto play",'eventmana'),
            "param_name" => "autoplay",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Display navigation",'eventmana'),
            "param_name" => "navigation",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Loop",'eventmana'),
            "param_name" => "loop",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
)));

vc_map( array(
    "name" => __("Speaker item", 'eventmana'),
    "base" => "eventmana_speaker_item",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",
    "content_element" => true,
    "as_child" => array('only' => 'eventmana_speaker'),
    "params" => array(
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("image",'eventmana'),
            "param_name" => "image",
            "value" => ""
        ),          
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Name",'eventmana'),
            "param_name" => "name",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Job",'eventmana'),
            "param_name" => "job",
            "value" => ""
        ),
        array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __("Description",'eventmana'),
            "param_name" => "desc",
            "value" => ""
        ),
        array(
             "type" => "textarea",
             "holder" => "div",
             "class" => "",
             "heading" => __("Social",'eventmana'),
             "param_name" => "social",
             "default"  => ''
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Link",'eventmana'),
            "param_name" => "link",
            "value" => ""
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Target",'eventmana'),
            "param_name" => "target",
            "value" => array(
                  __('New window', 'eventmana') => '_blank',
                  __('Same window', 'eventmana') => '',
            ),
            "default"  => '_blank'
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
)));
 if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_eventmana_speaker extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_eventmana_speaker_item extends WPBakeryShortCode {
    }
}


vc_map( array(
	"name" => __("latest blog", 'eventmana'),
	"base" => "eventmana_latestblog",
	"class" => "",
	"category" => __("My shortcode", 'eventmana'),
	"icon" => "icon-qk",   
	"params" => array(
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Count",'eventmana'),
		   "param_name" => "count",
		   "value" => "3",
		   "description" => 'Post Count'
		),
		array(
		   "type" => "dropdown",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Show date",'eventmana'),
		   "param_name" => "showdate",
		   "value" => array(   
		          __('True', 'eventmana') => 'true',
		          __('False', 'eventmana') => 'false',                
		          ),
		   "description" => 'Show date',
		   "default" => "true"
		),
		array(
		   "type" => "dropdown",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Show comment",'eventmana'),
		   "param_name" => "showcomment",
		   "value" => array(   
		          __('True', 'eventmana') => 'true',
		          __('False', 'eventmana') => 'false',
		          ),
		   "description" => 'Show Comment',
		   "default" => "true"
		),
		array(
		   "type" => "dropdown",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Show Description",'eventmana'),
		   "param_name" => "showdescription",
		   "value" => array(   
		          __('True', 'eventmana') => 'true',
		          __('False', 'eventmana') => 'false',
		          ),
		   "description" => 'Show Description',
		   "default" => "true"
		),
		array(
		   "type" => "dropdown",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Show Readmore",'eventmana'),
		   "param_name" => "showreadmore",
		   "value" => array(   
		          __('True', 'eventmana') => 'true',
		          __('False', 'eventmana') => 'false',                
		          ),
		   "description" => 'Show Read More',
		   "default" => "true"
		),
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("readmore text",'eventmana'),
		   "param_name" => "readmore_text",
		   "value" => "Read more",
		   "description" => 'Read more'
		),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Count items each slide",'eventmana'),
            "param_name" => "item_slide",
            "value" => "4"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Duration ms. 1000ms=3s",'eventmana'),
            "param_name" => "duration",
            "value" => "3000"
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Auto play",'eventmana'),
            "param_name" => "autoplay",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Display navigation",'eventmana'),
            "param_name" => "navigation",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Loop",'eventmana'),
            "param_name" => "loop",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
		


	
)));


vc_map( array(
	"name" => __("Location", 'eventmana'),
	"base" => "eventmana_location",
	"class" => "",
	"category" => __("My shortcode", 'eventmana'),
	"icon" => "icon-qk",
	"params" => array(
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Defineid",'eventmana'),
		   "param_name" => "defineid",
		   "value" => "map-canvas",
		   "description" => 'Insert id to display map. For instance: map-canvas'
		),
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Latitude",'eventmana'),
		   "param_name" => "latitude",
		   "value" => "40.9807648",
		   "description" => 'Insert latitude parameter for google map. For instance: 40.9807648'
		),
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Longitude",'eventmana'),
		   "param_name" => "longitude",
		   "value" => "28.9866516",
		   "description" => 'Insert longitude parameter for google map. For instance: 28.9866516'
		),
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Zoom",'eventmana'),
		   "param_name" => "zoom",
		   "value" => "12",
		   "description" => 'Insert zoom parameter for google map. Default 12'
		),
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Marker title",'eventmana'),
		   "param_name" => "marker_title",
		   "value" => "",
		   "description" => __('Insert marker title', 'eventmana')
		), 
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Heading",'eventmana'),
		   "param_name" => "heading",
		   "value" => "",
		   "description" => 'Insert heading'
		),
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("fontclass",'eventmana'),
		   "param_name" => "fontclass",
		   "value" => "",
		   "description" => 'Insert awesome class beside heading'
		),
		array(
		   "type" => "dropdown",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Style Icon",'eventmana'),
		   "param_name" => "style_icon",
		   "value" => array(   
		        __('Hexagon', 'eventmana') => 'rhex',
		        __('Circle', 'eventmana') => 'crcle',
		        __('Square', 'eventmana') => 'wohex'
		        ),
		  "default"  => 'rhex',
		  "description" => 'Choose style to display'
		   
		),
		array(
		   "type" => "textarea_html",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Main Content",'eventmana'),
		   "param_name" => "content",
		   "value" => "",
		   "description" => 'Insert main content'
		),
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Button name",'eventmana'),
		   "param_name" => "button_name",
		   "value" => "",
		   "description" => 'Insert button name'
		),
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("button_font_class",'eventmana'),
		   "param_name" => "button_font_class",
		   "value" => "",
		   "description" => 'Insert awesome class beside button'
		),
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Button link",'eventmana'),
		   "param_name" => "button_link",
		   "value" => "",
		   "description" => 'Insert button link'
		),
		array(
		   "type" => "dropdown",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Target button link",'eventmana'),
		   "param_name" => "target_link",
		   "value" => array(   
		        __('New window', 'eventmana') => '_blank',
		        __('Same window', 'eventmana') => '',
		        
		        ),
		  "default"  => '_blank',
		),
		array(
		   "type" => "textfield",
		   "holder" => "div",
		   "class" => "",
		   "heading" => __("Class",'eventmana'),
		   "param_name" => "class",
		   "value" => "",
		   "description" => 'Insert class'
		),


)));



vc_map( array(
    "name" => __("Gallery", 'eventmana'),
    "base" => "eventmana_gallery",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",
    "as_parent" => array('only' => 'eventmana_gallery_item', ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "js_view" => 'VcColumnView',
    "show_settings_on_create" => false,
    "params" => array(
               
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Insert font awesome",'eventmana'),
            "param_name" => "icon",
            "value" => ""
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Insert filter like: Photos:photos,Videos:videos,Gallery:gallery.  Note: Photos is name filter, photo is slug that you will insert in gallery item element",'eventmana'),
             "param_name" => "filter",
             "default"  => 'Photos:photos,Videos:videos,Gallery:gallery'
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("All text",'eventmana'),
            "param_name" => "all_text",
            "value" => ""
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
)));

vc_map( array(
    "name" => __("Gallery item", 'eventmana'),
    "base" => "eventmana_gallery_item",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",
    "content_element" => true,
    "as_child" => array('only' => 'eventmana_gallery'),
    "params" => array(
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("Thumbnail",'eventmana'),
            "param_name" => "thumbnail",
            "value" => ""
        ),          
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Alt for image",'eventmana'),
            "param_name" => "alt",
            "value" => ""
        ),
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("lightbox image",'eventmana'),
            "param_name" => "lightbox_image",
            "value" => ""
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("insert slug in Gallery item. like photo, video",'eventmana'),
             "param_name" => "filter",
             "default"  => ''
        ),
        
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Title",'eventmana'),
             "param_name" => "title",
             "default"  => ''
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Category",'eventmana'),
             "param_name" => "cat",
             "default"  => ''
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
)));
 if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_eventmana_gallery extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_eventmana_gallery_item extends WPBakeryShortCode {
    }
}



vc_map( array(
   "name" => __("Button 2", 'eventmana'),
   "base" => "eventmana_button2",
   "class" => "",
   "category" => __("My shortcode", 'eventmana'),
   "icon" => "icon-qk",   
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title",'eventmana'),
         "param_name" => "title",
         "value" => "",
         "description" => 'Title'
      ),
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link",'eventmana'),
         "param_name" => "link",
         "value" => "",
         "description" => 'Link'
      ),
    array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Target",'eventmana'),
         "param_name" => "target",
         "value" => array(   
                __('New Window', 'eventmana') => 'blank',
                __('Inline Page', 'eventmana') => 'inline',
                __('Scroll To', 'eventmana') => 'scrollto',
                ),
         "description" => 'Select target',
         "default" => "blank"
      ),
    array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Show Icon",'eventmana'),
         "param_name" => "showicon",
         "value" => array(   
                __('Left Position', 'eventmana') => 'left',
                __('Right Position', 'eventmana') => 'right',
                __('none', 'eventmana') => 'none',
                ),
         "description" => 'You can choose display left, right, or dont display',
         "default" => "left"
      ),
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Fontawesome",'eventmana'),
         "param_name" => "fontawesome",
         "value" => "",
         "description" => 'Insert fontawesome. You can find it here: http://fortawesome.github.io/Font-Awesome/icons/'
      ),
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Margin",'eventmana'),
         "param_name" => "margin",
         "value" => "",
         "description" => 'Insert value for top right bottom left. For instance 0px 0px 0px 20px'
      ),
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class",'eventmana'),
         "param_name" => "class",
         "value" => "",
         "description" => 'Insert class'
      ),
    
   
)));
  
  vc_map( array(
     "name" => __("buttonpopup", 'eventmana'),
     "base" => "eventmana_buttonpopup",
     "class" => "",
     "category" => __("My shortcode", 'eventmana'),
     "icon" => "icon-qk",   
     "params" => array(
      array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Title",'eventmana'),
           "param_name" => "title",
           "value" => "",
           "description" => 'Title'
        ),
      array(
           "type" => "attach_image",
           "holder" => "div",
           "class" => "",
           "heading" => __("Image Path",'eventmana'),
           "param_name" => "imagepath",
           "value" => "",
           "description" => 'Link Image'
        ),
      array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Video Path",'eventmana'),
           "param_name" => "videopath",
           "value" => "",
           "description" => 'Insert link video: vimeo, youtube'
        ),
      array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Margin",'eventmana'),
           "param_name" => "margin",
           "value" => "",
           "description" => 'Insert value for top right bottom left. For instance 0px 0px 0px 20px'
        ),
      array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Class",'eventmana'),
           "param_name" => "class",
           "value" => "",
           "description" => 'Insert class'
        ),
      
)));




vc_map( array(
    "name" => __("images carousel", 'eventmana'),
    "base" => "eventmana_imgcarousel",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",
    "as_parent" => array('only' => 'eventmana_imgcarousel_item', ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "js_view" => 'VcColumnView',
    "show_settings_on_create" => false,
    "params" => array(
              
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Duration ms. 1000ms=3s",'eventmana'),
            "param_name" => "duration",
            "value" => "3000"
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Auto play",'eventmana'),
            "param_name" => "autoplay",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Navigation",'eventmana'),
            "param_name" => "navigation",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Loop",'eventmana'),
            "param_name" => "loop",
            "value" => array(
                  __('true', 'eventmana') => 'true',
                  __('false', 'eventmana') => 'false',
            ),
            "default"  => 'true'
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
)));

vc_map( array(
    "name" => __("image carousel item", 'eventmana'),
    "base" => "eventmana_imgcarousel_item",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",
    "content_element" => true,
    "as_child" => array('only' => 'eventmana_imgcarousel'),
    "params" => array(
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("image",'eventmana'),
            "param_name" => "image",
            "value" => ""
        ),          
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Alt",'eventmana'),
            "param_name" => "alt",
            "value" => ""
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
)));
 if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_eventmana_imgcarousel extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_eventmana_imgcarousel_item extends WPBakeryShortCode {
    }
}


vc_map( array(
"name" => __("Schedule", 'eventmana'),
"base" => "eventmana_schedule",
"class" => "",
"category" => __("My shortcode", 'eventmana'),
"icon" => "icon-qk",   
"params" => array(

	array(
	     "type" => "textarea",
	     "holder" => "div",
	     "class" => "",
	     "heading" => __("Slug Array. Only insert level 1 of schedule category",'eventmana'),
	     "param_name" => "array_slug",
	     "value" => "",
	     "description" => __('Insert slug of level 1 category. for instance: day-01, day-02, day-03, day-04<br/>You will find all category slug in Schedule >> Categories','eventmana')
	),

	array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => __("Order by for displaying schedule",'eventmana'),
        "param_name" => "schedule_order_by",
        "value" => array(
              __('ID', 'eventmana') => 'ID',
              __('Title', 'eventmana') => 'title',                      
              __('Date', 'eventmana') => 'date',
              __('Modified', 'eventmana') => 'modified',
              __('Rand', 'eventmana') => 'rand',
        ),
        "default"    => 'ID',  
        
    ),
    array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => __("Order",'eventmana'),
        "param_name" => "schedule_order",
        "value" => array(
              __('DESC', 'eventmana') => 'DESC',
              __('ASC', 'eventmana') => 'ASC',
        ),
        "default"  => 'DESC',

    ),
    array(
	     "type" => "textfield",
	     "holder" => "div",
	     "class" => "",
	     "heading" => __("Count",'eventmana'),
	     "param_name" => "schedule_count",
	     "value" => "100"
	),
	array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => __("Display thumbnail",'eventmana'),
        "param_name" => "schedule_display_thumbnail",
        "value" => array(
              __('True', 'eventmana') => '1',
              __('False', 'eventmana') => '0',
        ),
        "default"  => '1',

    ),
    array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => __("Display time",'eventmana'),
        "param_name" => "schedule_display_time",
        "value" => array(
              __('True', 'eventmana') => '1',
              __('False', 'eventmana') => '0',
        ),
        "default"  => '1',

    ),
    
    array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => __("Display author",'eventmana'),
        "param_name" => "schedule_display_author",
        "value" => array(
              __('True', 'eventmana') => '1',
              __('False', 'eventmana') => '0',
        ),
        "default"  => '1',

    ),
    array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => __("Display author job",'eventmana'),
        "param_name" => "schedule_display_author_job",
        "value" => array(
              __('True', 'eventmana') => '1',
              __('False', 'eventmana') => '0',
        ),
        "default"  => '1',

    ),
    array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => __("Display intro",'eventmana'),
        "param_name" => "schedule_display_desc",
        "value" => array(
              __('True', 'eventmana') => '1',
              __('False', 'eventmana') => '0',
        ),
        "default"  => '1',

    ),
    array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => __("Display social",'eventmana'),
        "param_name" => "schedule_display_social",
        "value" => array(
              __('True', 'eventmana') => '1',
              __('False', 'eventmana') => '0',
        ),
        "default"  => '1',

    ),
    array(
        "type" => "dropdown",
        "holder" => "div",
        "class" => "",
        "heading" => __("Display ",'eventmana'),
        "param_name" => "schedule_display_speaker",
        "value" => array(
              __('True', 'eventmana') => '1',
              __('False', 'eventmana') => '0',
        ),
        "default"  => '1',

    ),
    array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => __("Insert fontaesome for time icon",'eventmana'),
        "param_name" => "schedule_icon_time",
        "value" => "",

    ),
    array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => __("Insert fontaesome for microphone icon",'eventmana'),
        "param_name" => "schedule_icon_microphone",
        "value" => ""

    ),
    array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => __("Speaker text",'eventmana'),
        "param_name" => "speakers_text",
        "value" => ""

    ),
	array(
	     "type" => "textfield",
	     "holder" => "div",
	     "class" => "",
	     "heading" => __("Class",'eventmana'),
	     "param_name" => "class",
	     "value" => "",
	     "description" => 'Insert class to use for your style'
	  )


)));







vc_map( array(
    "name" => __("Faq", 'eventmana'),
    "base" => "eventmana_faq",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",
    "as_parent" => array('only' => 'eventmana_faq_item', ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "js_view" => 'VcColumnView',
    "show_settings_on_create" => false,
    "params" => array(

    	array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("You will use id in faq item element. for example: accordion1",'eventmana'),
             "param_name" => "id",
             "default"  => ''
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),
       
)));

vc_map( array(
    "name" => __("faq item", 'eventmana'),
    "base" => "eventmana_faq_item",
    "class" => "",
    "category" => __("My shortcode", 'eventmana'),
    "icon" => "icon-qk",
    "content_element" => true,
    "as_child" => array('only' => 'eventmana_faq'),
    "params" => array(
    	array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Id of faq parent. for example: accordion1",'eventmana'),
            "param_name" => "id_parent",
            "value" => ""
        ), 
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Title",'eventmana'),
            "param_name" => "title",
            "value" => ""
        ),          
        array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __("Description",'eventmana'),
            "param_name" => "desc",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Id. For example: faq1",'eventmana'),
            "param_name" => "id",
            "value" => ""
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Open tab",'eventmana'),
            "param_name" => "open",
            "value" => array(   
              __('True', 'eventmana') => 'in',
              __('False', 'eventmana') => 'no_in',                
             ),
            "default"	=> 'in'
        ),
        array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => __("Class",'eventmana'),
             "param_name" => "class",
             "default"  => ''
        ),

       
)));
 if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_eventmana_faq extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_eventmana_faq_item extends WPBakeryShortCode {
    }
}


vc_map( array(
 "name" => __("Event slider", 'eventmana'),
 "base" => "eventmana_event_slider",
 "class" => "",
 "category" => __("My shortcode", 'eventmana'),
 "icon" => "icon-qk",   
 "params" => array(
 	
 	array(
	     "type" => "dropdown",
	     "holder" => "div",
	     "class" => "",
	     "heading" => __("Order by",'eventmana'),
	     "param_name" => "orderby",
	     "value" => array(   
	            __('id', 'eventmana') => 'ID',
	            __('title', 'eventmana') => 'title',
	            __('date', 'eventmana') => 'date',
	            __('modified', 'eventmana') => 'modified',
	            __('rand', 'eventmana') => 'rand',
	            ),
	     "default" => 'ID'
	  ),
	array(
	     "type" => "dropdown",
	     "holder" => "div",
	     "class" => "",
	     "heading" => __("Order",'eventmana'),
	     "param_name" => "order",
	     "value" => array(   
	            __('desc', 'eventmana') => 'DESC',
	            __('asc', 'eventmana') => 'ASC',                    
	            ),
	     "default" => 'DESC'
	  ),
	array(
	       "type" => "textfield",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Count items",'eventmana'),
	       "param_name" => "count",
	       "value" => "5",               
	  ),
	
	array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => __("label button",'eventmana'),
       "param_name" => "label_button",
       "value" => "Tickets & details"
    ),
  	array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => __("Class",'eventmana'),
       "param_name" => "class",
       "value" => ""
    ),

)));


vc_map( array(
 "name" => __("Iframe Eventbrite", 'eventmana'),
 "base" => "eventmana_iframe_eventbrite",
 "class" => "",
 "category" => __("My shortcode", 'eventmana'),
 "icon" => "icon-qk",   
 "params" => array(
 	
 	
	array(
	       "type" => "textfield",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Insert ID of event at eventbrite.com",'eventmana'),
	       "description" => "Find ID. This is your event url: https://www.eventbrite.com/e/sell-imevent-wordpress-theme-tickets-18691767580 => ID is 18691767580",
	       "param_name" => "id",
	       "value" => "",               
	  ),
  	array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => __("Class",'eventmana'),
       "param_name" => "class",
       "value" => ""
    ),

)));


vc_map( array(
 "name" => __("Add cart for event", 'eventmana'),
 "base" => "eventmana_minicart",
 "class" => "",
 "category" => __("My shortcode", 'eventmana'),
 "icon" => "icon-qk",   
 "params" => array(
 	
 	
	array(
	       "type" => "textfield",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Insert ID of event at eventbrite.com",'eventmana'),
	       "description" => "Find ID. This is your event url: https://www.eventbrite.com/e/sell-imevent-wordpress-theme-tickets-18691767580 => ID is 18691767580",
	       "param_name" => "id",
	       "value" => "",               
	  ),
  	array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => __("Class",'eventmana'),
       "param_name" => "class",
       "value" => ""
    ),

)));


/* Add to cart */
$products_array = array();
if(class_exists('Woocommerce')){

	// Choose Product
	$args = array(
	  'post_type' => 'product',	
	  'orderby' => 'name',
	  'order' => 'ASC',
	  'posts_per_page' => '1000000'
	  );

	$products = new WP_Query($args);
	$products_array = array();

	$products_array['Choose Product'] = 'empty';

	if($products->have_posts()){
        while($products->have_posts()): $products->the_post();
        	global $post;
			$products_array[$post->post_title] = $post->ID;
		endwhile;
	}
	
}

vc_map( array(
 "name" => __("Add to cart", 'eventmana'),
 "base" => "eventmana_addtocart",
 "class" => "",
 "category" => __("My shortcode", 'eventmana'),
 "icon" => "icon-qk",
 "params" => array(
 	
	array(
	       "type" => "dropdown",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Product ID",'eventmana'),
	       "param_name" => "product_id",
	       "value" => $products_array,
	       "default" => 'all',
	),
	array(
	       "type" => "textfield",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Attribute ID",'eventmana'),
	       "param_name" => "attribute_id",
	       "description" => __("Products >> Attributes >> Insert slug of attribute. Find it here: http://demo.ovathemes.com/documentation/eventmana/attribute.png<br/> Note use lowercase",'eventmana'),
	       "value" => '',
	       "default" => '',

	),
	array(
	       "type" => "textfield",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Variation ID",'eventmana'),
	       "param_name" => "variation_id",
	       "value" => "",               
	       "description" => __("Find it here: http://demo.ovathemes.com/documentation/eventmana/varition.png",'eventmana'),
	),
	array(
	       "type" => "textfield",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Variation Slug",'eventmana'),
	       "param_name" => "variation_name",
	       "description" => __("Step 1: http://demo.ovathemes.com/documentation/eventmana/variation_slug1.png<br/>Step 2: http://demo.ovathemes.com/documentation/eventmana/variation_slug2.png","eventmana"),
	       "value" => "",               
	),
	array(
	       "type" => "textfield",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Button text",'eventmana'),
	       "param_name" => "button_text",
	       "value" => "",               
	),
  	array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => __("Class",'eventmana'),
       "param_name" => "class",
       "value" => ""
    ),

)));


vc_map( array(
 "name" => __("Pricing", 'eventmana'),
 "base" => "eventmana_pricing",
 "class" => "",
 "category" => __("My shortcode", 'eventmana'),
 "icon" => "icon-qk",   
 "params" => array(
  array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => __("Name",'eventmana'),
       "param_name" => "name",
       "value" => "",
       "description" => 'Name of package. For instance: Personal'
    ),

  array(
       "type" => "dropdown",
       "holder" => "div",
       "class" => "",
       "heading" => __("Pricing style",'eventmana'),
       "param_name" => "pricing_style",
       "value" => array(   
              __('Currency - Value', 'eventmana') => 'ca',                
              __('Price - Value', 'eventmana') => 'ac',
              ),
       "default" => 'ca'
    ),
  array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => __("Value",'eventmana'),
       "param_name" => "value",
       "value" => "",
       "description" => 'Value of package. For instance: 111'
    ),
  array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => __("Currency",'eventmana'),
       "param_name" => "currency",
       "value" => "",
       "description" => 'Currency of package. For instance: $'
    ),
  array(
       "type" => "dropdown",
       "holder" => "div",
       "class" => "",
       "heading" => __("Feature Package",'eventmana'),
       "param_name" => "feature",
       "value" => array(   
              __('Normal', 'eventmana') => 'nofeature',                
              __('Feature', 'eventmana') => 'featured',
              ),
       "description" => 'Choose package is feature',
       "default" => "nofeature"
    ),
  array(
       "type" => "textarea_html",
       "holder" => "div",
       "class" => "",
       "heading" => __("Content",'eventmana'),
       "param_name" => "content",
       "value" => '',
       "description" => 'Insert Content'
    ),
    array(
       "type" => "dropdown",
       "holder" => "div",
       "class" => "",
       "heading" => __("Register Button",'eventmana'),
       "param_name" => "extra_link",
       "value" => array(   
              __('Woocommerce', 'eventmana') => 'true',
              __('Other system', 'eventmana') => 'false',                
              ),
       "description" => 'Register Package with Woocommerce or Other System',
       "default" => "true"
    ),
    array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => __("Name button",'eventmana'),
       "param_name" => "name_button",
       "value" => "",
       "description" => 'Name Button of package. For instance: Register'
    ),
    array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => __("Link button",'eventmana'),
       "param_name" => "link_button",
       "value" => "",
       "description" => 'Insert Link button if you register with other system. <br/>Empty if you register with Woocommerce'
    ),
    array(
	       "type" => "dropdown",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Product ID",'eventmana'),
	       "param_name" => "product_id",
	       "value" => $products_array,
	       "default" => 'all',
	       "description" => 'Choose Product in Woocommerce if you register with Woocommerce'
	),
	array(
	       "type" => "textfield",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Attribute ID",'eventmana'),
	       "param_name" => "attribute_id",
	       "description" => __("Choose Product in Woocommerce if you register with Woocommerce. <br/>Products >> Attributes >> Insert slug of attribute. Find it here: http://demo.ovathemes.com/documentation/eventmana/attribute.png<br/> Note use lowercase",'eventmana'),
	       "value" => '',
	       "default" => '',

	),
	array(
	       "type" => "textfield",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Variation ID",'eventmana'),
	       "param_name" => "variation_id",
	       "value" => "",
	       "description" => __("Choose Product in Woocommerce if you register with Woocommerce. <br/>Find it here: http://demo.ovathemes.com/documentation/eventmana/varition.png",'eventmana'),
	),
	array(
	       "type" => "textfield",
	       "holder" => "div",
	       "class" => "",
	       "heading" => __("Variation Slug",'eventmana'),
	       "param_name" => "variation_name",
	       "description" => __("Choose Product in Woocommerce if you register with Woocommerce. <br/>Step 1: http://demo.ovathemes.com/documentation/eventmana/variation_slug1.png<br/>Step 2: http://demo.ovathemes.com/documentation/eventmana/variation_slug2.png","eventmana"),
	       "value" => "",               
	),
    array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => __("Class",'eventmana'),
       "param_name" => "class",
       "value" => "",
       "description" => 'Insert class'
    ),

 )));





}} /* /if //function */
?>
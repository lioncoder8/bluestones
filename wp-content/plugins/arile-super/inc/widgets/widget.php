<?php
$activate = array(
        'sidebar-main' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
		'footer-sidebar-one' => array(
			'text-1',
        ),
	    'footer-sidebar-two' => array(
            'categories-1',
        ),
		'footer-sidebar-three' => array(
            'archives-1',
        ),
		'footer-sidebar-four' => array(
			'search-1',
        )
    );
    /* the default titles will appear */
        update_option('widget_text', array(
        1 => array('title' => 'Quick contact info',
        'text'=>'<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lorem ipsum dolor sit amet, the administration of justice, I may hear, finally, be expanded on, say, a certain pro cu neglegentur. </font><font style="vertical-align: inherit;">Mazim.Unusual or something.</font></font></p>
		<address><i class="fa fa-map-marker"></i>2130 Fulton Street, San Francisco<br>
		<i class="fa fa-envelope-o"></i><a href="mailto:support@test.com">support@test.com</a><br>
		<i class="fa fa-phone"></i><a href="tel:+(15) 718-999-3939">+(15) 94117-1080</a></address>
		'),        
		2 => array('title' => 'Recent Posts'),
		3 => array('title' => 'Categories'), 
        ));
		 update_option('widget_categories', array(
			1 => array('title' => 'Categories'), 
			2 => array('title' => 'Categories')));

		update_option('widget_archives', array(
			1 => array('title' => 'Archives'), 
			2 => array('title' => 'Archives')));
			
		update_option('widget_search', array(
			1 => array('title' => 'Search'), 
			2 => array('title' => 'Search')));	
		
		update_option('sidebars_widgets',  $activate);
?>
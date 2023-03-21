( function( api ) {

	// Extends our custom "example-1" section.
	api.sectionConstructor['plugin-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );


function aasta_frontpage_sections_scroll( section_id ){
    var scroll_section_id = "theme-slider";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {
        case 'accordion-section-aasta_theme_top_header_area':
        scroll_section_id = "site-header";
        break;

        case 'aaccordion-section-aasta_main_theme_slider':
        scroll_section_id = "theme-slider";
        break;

        case 'accordion-section-aasta_theme_info_area':
        scroll_section_id = "theme-info-area";
        break;

        case 'accordion-section-aasta_theme_service':
        scroll_section_id = "theme-services";
        break;

        case 'accordion-section-aasta_theme_project':
        scroll_section_id = "theme-project";
        break;

        case 'accordion-section-aasta_theme_funfact':
        scroll_section_id = "theme-funfact";
        break;

        case 'accordion-section-aasta_theme_testimonial':
        scroll_section_id = "theme-testimonial";
        break;

        case 'accordion-section-aasta_theme_wooshop':
        scroll_section_id = "theme-shop";
        break;

        case 'accordion-section-aasta_theme_cta':
        scroll_section_id = "theme-cta";
        break;

        case 'accordion-section-aasta_theme_team':
        scroll_section_id = "theme-team-mambers";
        break;
		
		case 'accordion-section-aasta_theme_blog':
        scroll_section_id = "theme-blog";
        break;
		
		case 'accordion-section-aasta_theme_client':
        scroll_section_id = "theme-sponsors";
        break;
    }

    if( $contents.find('#'+scroll_section_id).length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + scroll_section_id ).offset().top
        }, 1000);
    }
}

 jQuery('body').on('click', '#sub-accordion-panel-aasta_frontpage_settings .control-subsection .accordion-section-title', function(event) {
        var section_id = jQuery(this).parent('.control-subsection').attr('id');
        aasta_frontpage_sections_scroll( section_id );
});
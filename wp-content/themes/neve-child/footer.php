<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "wrapper" div and all content after.
 *
 * @package Neve
 * @since   1.0.0
 */

/**
 * Executes actions before main tag is closed.
 *
 * @since 1.0.4
 */
do_action( 'neve_before_primary_end' ); ?>

</main><!--/.neve-main-->

<?php

/**
 * Executes actions after main tag is closed.
 *
 * @since 1.0.4
 */
do_action( 'neve_after_primary' );

/**
 * Filters the content parts.
 *
 * @since 1.0.9
 *
 * @param bool   $status Whether the component should be displayed or not.
 * @param string $context The context name.
 */
if ( apply_filters( 'neve_filter_toggle_content_parts', true, 'footer' ) === true ) {

	/**
	 * Executes actions before the footer was rendered.
	 *
	 * @since 1.0.0
	 */
	do_action( 'neve_before_footer_hook' );

	/**
	 * Executes the rendering function for the footer.
	 *
	 * @since 1.0.0
	 */
	do_action( 'neve_do_footer' );

	/**
	 * Executes actions after the footer was rendered.
	 *
	 * @since 1.0.0
	 */
	do_action( 'neve_after_footer_hook' );
}
?>

</div><!--/.wrapper-->
<?php

wp_footer();

/**
 * Executes actions before the body tag is closed.
 *
 * @since 2.11
 */
do_action( 'neve_body_end_before' );

?>



<script>
	jQuery(document).ready(function(){

		var window_width = jQuery( window ).width();

		var device = 'desktopfrorm';


		if(window_width >= 768 && window_width <= 1024 ){
			device = 'tabviewform';

		}

		if(window_width <= 767){
			device = 'mobileviewform';

		}

		if(window_width <= 1024){
			
			jQuery( "#"+device +" input.button.button-primary.qbutton").click(function(){
				console.log(jQuery(this).parent().parent().parent().parent());
				jQuery(this).parent().parent().parent().parent().find("#mfcf7_zl_multifilecontainer span p input.wpcf7-form-control.wpcf7-multilinefile").trigger('click');
			})

		}
		


		console.log(device);

		//elementorProFrontend.modules.popup.showPopup( { id: 3577 } );

		jQuery(".openPopup").click(function(){
			var popup_id = jQuery(this).attr('rel');
			console.log(popup_id);
		    elementorProFrontend.modules.popup.showPopup( { id: popup_id } );
		    
		})

		/* team accordian */
		// jQuery(".teamAccordion .eael-accordion-header").click(function(){

		// jQuery(".teamAccordion .eael-accordion-header").removeClass('show');
		// jQuery(".teamAccordion .eael-accordion-header").removeClass('active');
		// jQuery(".teamAccordion .eael-accordion-content").hide();

		// jQuery(this).addClass('show');
		// jQuery(this).addClass('active');

		// jQuery(this).parent().find(".eael-accordion-content").show();



		//})
	});
</script>
</body>

</html>

<?php
if ( get_post_status( $id ) != 'publish' || get_post_type( $id ) != 'super-simple-slider' ) {
	return;
}

$slides = get_post_meta( $id, 'super-simple-slider-slide-settings-group', true );


/* echo "<pre>";
print_r($slides);
echo "</pre>"; */


$settings = $this->settings['fields'];
$slider_settings = array();

foreach ( $settings as $name => $config ) {
	$slider_settings[$name] = $this->sanitize_field( get_post_meta( $id, $name, true ), $config['type'] );
}

	if ( $slides ) :
		$has_min_width		= $slider_settings['super_simple_slider_has_min_width'];
		$min_width			= $slider_settings['super_simple_slider_min_width'];
	
		$container_classes = array();
				
		$arrow_style = null;

		$slider_id = uniqid();
		
		include($this->parent->assets_dir . '/includes/dynamic-css-slider.php');
?>


<div id="super-simple-slider-<?php echo $slider_id ?>" class="super-simple-slider-container super-simple-slider-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( implode( ' ', $container_classes ) ); ?> loading">
			

			<div class="thumbTiles swiper-container">
	<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->

				<?php foreach ( $slides as $slide ) :
					$image_id 	 = $slide['super_simple_slider_slide_image'];
					$slide_image = wp_get_attachment_image_src( $image_id, 'full' );
					
					$slide_image_alt 	= $slide['super_simple_slider_slide_image_alt'];
					$slide_image_title 	= $slide['super_simple_slider_slide_image_title'];

					$overlay_color_rgb 		= 'rgba(0, 0, 0, ' .$slide['super_simple_slider_slide_overlay_opacity']. ')';
					$text_overlay_color_rgb = 'rgba(0, 0, 0, ' .$slide['super_simple_slider_slide_text_overlay_opacity']. ')';
					
					$text_overlay_text_shadow = $this->getIfSet( $slide['super_simple_slider_slide_text_overlay_text_shadow'], false);
					
					$opacity_classes = array();
					
					if ( $text_overlay_text_shadow ) {
						$opacity_classes[] = 'text-shadow';
					}


					$title = trim( $slide['super_simple_slider_slide_title'] );
			            $text  = trim( $slide['super_simple_slider_slide_text'] );
			            
			            $has_buttons   = false;
			            $button_1_text = trim( $this->getIfSet( $slide['super_simple_slider_slide_button_1_text'], '' ) );

						if ( $button_1_text ) {
							$has_buttons 			  = true;
							$button_1_link_content 	  = intval( $slide['super_simple_slider_slide_button_1_link_content'] );
							$button_1_link_custom_url = $slide['super_simple_slider_slide_button_1_link_custom_url'];
							$button_1_link_url		  = '';
							
							if ( $button_1_link_content != 'custom' && $button_1_link_content > 0 ) {
								$button_1_link_url = get_permalink( $button_1_link_content );
							} else if ( $button_1_link_content == 'custom' ) {
								$button_1_link_url = esc_url( $button_1_link_custom_url );
							}
							
							if ( $slide['super_simple_slider_slide_button_1_link_target'] == 'new-window' ) {
				            	$button_1_link_target  = '_blank';
				            } else {
								$button_1_link_target  = '';
							}
						}
				?>

					<div class="swiper-slide">
					<a class="thumbTile" href="<?php echo $button_1_link_url; ?>">
						<img class="thumbTile__image"
							src="<?php echo esc_url( $slide_image[0] ); ?>"
							alt="The Queen's Gambit" />

						</a>
					
						<?php
			            if ( !empty( $title ) || !empty( $text ) || !empty( $button_1_text ) ) {
			            ?>
						<div class="slider-content opacity half <?php echo esc_attr( implode( ' ', $opacity_classes ) ); ?>" style="background-color: <?php echo $text_overlay_color_rgb; ?>;">
									<?php 
									if ( !empty( $title ) ) {
									?>
									<h4 class="sldTitle"><?php esc_html_e( $title ); ?></h4>
									<?php 
									}
									?>
									
									<?php 
									if ( !empty( $text ) ) {
									?>
									<div class="text <?php echo empty( $title ) ? 'no-title' : ''; ?> <?php echo $has_buttons ? '' : 'no-buttons'; ?>">
										<?php echo wpautop( $text ); ?>
									</div>
									<?php 
									}
									?>
									
									<?php
									if ( $button_1_text ) {
									?>
									<div class="buttons">
									<button rel="<?php echo $button_1_link_url; ?>" target="<?php echo $button_1_link_target; ?>"><?php echo $button_1_text; ?></button>
									</div>
									<?php 
									}
									?>
								</div>
						<?php 
						}
						?>
						


						
					</div>


				<?php endforeach; ?>
					
				</div>
				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev arrows"></div>
				<div class="swiper-button-next arrows"></div>
			</div>

		</div>
		
		<script type="text/javascript">
			var mySwiper = new Swiper('.swiper-container', {
            // Optional parameters
            spaceBetween: 0,
            slidesPerView: 2,
            loop: false,
            freeMode: true,			
            // loopAdditionalSlides: 5,
             speed: 500,
             //centeredSlides: true,
            // // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                // when window width is >= 640px
                640: {
                    slidesPerView: 2	,
                    slidesPerGroup: 1,
                    freeMode: false
                }
            }
        })
			
		</script>

	<?php else : ?>

		<div class="placeholder">
			<?php esc_html_e( 'Invalid Shortcode ID,', 'super-simple-slider' ); ?> <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=super-simple-slider' ) ); ?>" target="_blank"><?php esc_html_e( 'Create a new Slider', 'super-simple-slider' ); ?></a>
		</div>
	
	<?php endif; ?>
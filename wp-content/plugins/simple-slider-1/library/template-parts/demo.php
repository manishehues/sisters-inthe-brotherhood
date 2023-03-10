<ul class="super-simple-slider">

				<?php
				foreach ( $slides as $slide ) :
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
				?>

					<li class="slide">
						<img src="<?php echo esc_url( $slide_image[0] ); ?>" width="<?php echo esc_attr( $slide_image[1] ); ?>" height="<?php echo esc_attr( $slide_image[2] ); ?>" class="slide-image" alt="<?php echo esc_attr( $slide_image_alt ); ?>" title="<?php echo esc_attr( $slide_image_title ); ?>" />
						<div class="opacity" style="background-color: <?php echo $overlay_color_rgb; ?>;"></div>
						
			            <?php
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
			            
			            if ( !empty( $title ) || !empty( $text ) || !empty( $button_1_text ) ) {
			            ?>
						<div class="overlay-container">
							<div class="overlay">
								<div class="opacity half <?php echo esc_attr( implode( ' ', $opacity_classes ) ); ?>" style="background-color: <?php echo $text_overlay_color_rgb; ?>;">
									<?php 
									if ( !empty( $title ) ) {
									?>
									<h2 class="title"><?php esc_html_e( $title ); ?></h2>
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
							</div>
						</div>
						<?php 
						}
						?>
						
					</li>

				<?php endforeach; ?>
				
			</ul>
			
			<div class="super-simple-slider-pagination"></div>
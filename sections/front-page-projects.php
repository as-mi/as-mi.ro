<?php
/**
 *  The template for displaying the projects section in front page.
 *
 *  @package WordPress
 *  @subpackage illdy
 */
?>
<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$general_title = get_theme_mod( 'illdy_projects_general_title', esc_html__( 'Projects', 'illdy' ) );
	$general_entry = get_theme_mod( 'illdy_projects_general_entry', esc_html__( 'You\'ll love our work. Check it out!', 'illdy' ) );
} else {
	$general_title = get_theme_mod( 'illdy_projects_general_title' );
	$general_entry = get_theme_mod( 'illdy_projects_general_entry' );
}

?>

<?php if ( '' != $general_title || '' != $general_entry || is_active_sidebar( 'front-page-projects-sidebar' ) ) { ?>

<section id="projects" class="front-page-section" style="
<?php
if ( ! $general_title && ! $general_entry ) :
	echo 'padding-top: 0;';
endif;
?>
">
	<?php if ( $general_title || $general_entry ) : ?>
		<div class="section-header" style="margin:0">
			<div class="container">
				<div class="row">
					<?php if ( $general_title ) : ?>
						<div class="col-sm-12">
							<h3><?php echo do_shortcode( wp_kses_post( $general_title ) ); ?></h3>
						</div><!--/.col-sm-12-->
					<?php endif; ?>
					<?php if ( $general_entry ) : ?>
						<div class="col-sm-10 col-sm-offset-1">
							<div class="section-description"><?php echo do_shortcode( wp_kses_post( $general_entry ) ); ?></div>
						</div><!--/.col-sm-10.col-sm-offset-1-->
					<?php endif; ?>
				</div><!--/.row-->
			</div><!--/.container-->
		</div><!--/.section-header-->
	<?php endif; ?>
	<div class="section-content">
		<div class="container-fluid" style="padding:0">
	      <style media="screen">
					.carousel{
							overflow:hidden;
							position:relative;
							width:100%;
							height:400px;
							-webkit-perspective:500px;
							perspective:500px;
							-webkit-transform-style:preserve-3d;
							transform-style:preserve-3d;
							-webkit-transform-origin:0% 50%;
							transform-origin:0% 50%
					}
					.carousel .carousel-item{
							visibility:hidden;
							width:200px;
							height:200px;
							position:absolute;
							top:0;
							left:0;
							background-color: steelblue;
		          border-radius: 50%;
		          color: #fff;
		          display: flex;
		          justify-content: center;
		          align-items: center;
		          text-align: center;
		          overflow: hidden;
					}
					.carousel .carousel-item>img{
							width:100%
					}
	        .carousel .carousel-item > h2{
						padding: 10px;
						font-family: sans-serif;
					  font-size: 35px;
						line-height: normal;
						font-weight: 700;
	        }
	      </style>
	      <div class="carousel">
					<?php
					$args = array(
			    'post_type'=> 'projects',
					'posts_per_page' => -1
			    );
					$post_query = new WP_Query( $args );
					if($post_query->have_posts() ) :
						while ( $post_query->have_posts() ):
							 $post_query->the_post();
							 $image = get_field('image_link');
					         $link = get_field('page_link');
					         $title = get_the_title();
							 ?>
 							<a class="carousel-item" href="<?php echo ($link)? $link : the_permalink() ?>" style="<?php if($image) echo "background-color:#fff" ?>" >
 							    <?php
 							    if($image){
 							        ?>
 							        <img src="<?php echo $image ?>">
 							        <?php
 							    }
 							    else{
 							        ?>
 							        <h2><?php echo $title ?></h2>
 							        <?php
 							    } ?>
 			        </a>
 							<?php
						endwhile;
					endif;
					?>
	      </div>
	      <!-- Compiled and minified JavaScript -->
	      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	      <script type="text/javascript">
	        document.addEventListener('DOMContentLoaded', function() {
	          var elems = document.querySelectorAll('.carousel');
	          var instances = M.Carousel.init(elems, {
							padding: 200,
							shift: -50,
							dist: -50
						});
	        });
	      </script>
	  <!--/.row-->
		</div><!--/.container-fluid-->
	</div><!--/.section-content-->
</section><!--/#projects.front-page-section-->

<?php }// End if().
	?>

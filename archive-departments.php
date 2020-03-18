<?php
/**
 *  The template for displaying the archive.
 *
 *  @package WordPress
 *  @subpackage illdy
 */
?>
<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<section id="blog" style="width:100%;display:flex;justify-content:center;align-items:flex-start;flex-wrap:wrap">
				<?php do_action( 'illdy_above_content_after_header' ); ?>
                <?php
                    $index
                ?>
				<?php while ( have_posts() ) : the_post(); ?>
                <?php if(wp_is_mobile()){
                    ?>
                    <div style="width:100%;margin-top:40px;margin-bottom:20px;display:flex;justify-content:flex-start;align-items:center;flex-wrap:wrap">
                        <h3 class="entry-title" style="margin:0;color:#f18b6d;margin-right:50px"><?php the_title(); ?></h3>
                        <div class="entry-content" style="width:100%;padding-left:20px;min-width:741">
                        
                            <?php echo get_field('description') ?>
            
                        </div>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <div style="width:100%;margin-top:40px;margin-bottom:20px;display:flex;justify-content:flex-end;align-items:center;flex-wrap:wrap">
                        <h3 class="entry-title" style="margin:0;color:#f18b6d;margin-right:50px"><?php the_title(); ?></h3>
                        <div class="entry-content" style="width:65%;border-left:1px solid gray;padding-left:50px;min-width:741">
                        
                            <?php echo get_field('description') ?>
            
                        </div>
                    </div>
                    <?php
                }
                ?>
 
<?php endwhile; // end of the loop. ?>
				<?php do_action( 'illdy_after_content_above_footer' ); ?>
			</section><!--/#blog-->
		</div><!--/.col-sm-7-->
	</div><!--/.row-->
</div><!--/.container-->
<?php get_footer(); ?>

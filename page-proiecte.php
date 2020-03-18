<?php
/**
 *  The template for displaying the archive.
 *
 *  @package WordPress
 *  @subpackage illdy
 */
?>
<style>
/*
  CARD MODULE
*/
.card{
    position:relative;
    margin:.5rem 0 1rem 0;
    background-color:#fff;
    -webkit-transition:-webkit-box-shadow .25s;
    transition:-webkit-box-shadow .25s;
    transition:box-shadow .25s;
    transition:box-shadow .25s, -webkit-box-shadow .25s;
    border-radius:2px
}
.card .card-title{
    font-size:24px;
    font-weight:300
}
.card .card-title.activator{
    cursor:pointer
}
.card.small,.card.medium,.card.large{
    position:relative
}
.card.small .card-image,.card.medium .card-image,.card.large .card-image{
    max-height:60%;
    overflow:hidden
}
.card.small .card-image+.card-content,.card.medium .card-image+.card-content,.card.large .card-image+.card-content{
    max-height:40%
}
.card.small .card-content,.card.medium .card-content,.card.large .card-content{
    max-height:100%;
    overflow:hidden
}
.card.small .card-action,.card.medium .card-action,.card.large .card-action{
    position:absolute;
    bottom:0;
    left:0;
    right:0
}
.card.small{
    height:300px
}
.card.medium{
    height:400px
}
.card.large{
    height:500px
}
.card.horizontal{
    display:-webkit-box;
    display:-webkit-flex;
    display:-ms-flexbox;
    display:flex
}
.card.horizontal.small .card-image,.card.horizontal.medium .card-image,.card.horizontal.large .card-image{
    height:100%;
    max-height:none;
    overflow:visible
}
.card.horizontal.small .card-image img,.card.horizontal.medium .card-image img,.card.horizontal.large .card-image img{
    height:100%
}
.card.horizontal .card-image{
    max-width:50%
}
.card.horizontal .card-image img{
    border-radius:2px 0 0 2px;
    max-width:100%;
    width:auto
}
.card.horizontal .card-stacked{
    display:-webkit-box;
    display:-webkit-flex;
    display:-ms-flexbox;
    display:flex;
    -webkit-box-orient:vertical;
    -webkit-box-direction:normal;
    -webkit-flex-direction:column;
    -ms-flex-direction:column;
    flex-direction:column;
    -webkit-box-flex:1;
    -webkit-flex:1;
    -ms-flex:1;
    flex:1;
    position:relative
}
.card.horizontal .card-stacked .card-content{
    -webkit-box-flex:1;
    -webkit-flex-grow:1;
    -ms-flex-positive:1;
    flex-grow:1
}
.card.sticky-action .card-action{
    z-index:2
}
.card.sticky-action .card-reveal{
    z-index:1;
    padding-bottom:64px
}
.card .card-image{
    position:relative
}
.card .card-image img{
    display:block;
    border-radius:2px 2px 0 0;
    position:relative;
    left:0;
    right:0;
    top:0;
    bottom:0;
    width:100%
}
.card .card-image .card-title{
    color:#fff;
    position:absolute;
    bottom:0;
    left:0;
    max-width:100%;
    padding:24px
}
.card .card-content{
    padding:24px;
    border-radius:0 0 2px 2px
}
.card .card-content p{
    margin:0
}
.card .card-content .card-title{
    display:block;
    line-height:32px;
    margin-bottom:8px
}
.card .card-content .card-title i{
    line-height:32px
}
.card .card-action{
    background-color:inherit;
    border-top:1px solid rgba(160,160,160,0.2);
    position:relative;
    padding:16px 24px
}
.card .card-action:last-child{
    border-radius:0 0 2px 2px
}
.card .card-action a:not(.btn):not(.btn-large):not(.btn-small):not(.btn-large):not(.btn-floating){
    color:#ffab40;
    margin-right:24px;
    -webkit-transition:color .3s ease;
    transition:color .3s ease;
    text-transform:uppercase
}
.card .card-action a:not(.btn):not(.btn-large):not(.btn-small):not(.btn-large):not(.btn-floating):hover{
    color:#ffd8a6
}
.card .card-reveal{
    padding:24px;
    position:absolute;
    background-color:#fff;
    width:100%;
    overflow-y:auto;
    left:0;
    top:100%;
    height:100%;
    z-index:3;
    display:none
}
.card .card-reveal .card-title{
    cursor:pointer;
    display:block
}
</style>
<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12" style="display:flex; justify-content: space-around; flex-wrap: wrap;">
			<?php
			$args = array(
			'post_type'=> 'projects',
			'posts_per_page' => -1,
			'order' => 'ASC'
			);
			$post_query = new WP_Query( $args );
			if($post_query->have_posts() ) :
				while ( $post_query->have_posts() ):
					 $post_query->the_post();
					 $description = get_field('description');
					 $image = get_field('image_link');
					 $link = get_field('page_link');
					 $title = get_the_title();
					 ?>
					 <div class="card" style="width:28%; min-width: 200px;">
						 <a href="<?php echo ($link)? $link : the_permalink() ?>">
						 <?php
						if($image){
							?>
							<div class="card-image" style="background-image: url('<?php echo $image ?>'); background-size: contain; width:100%; height:200px;background-repeat: no-repeat;background-position: center">
							</div>
							<?php
						}
						else{
							?>
							<div class="card-image" style="background-color: steelblue; width:100%; height:200px; display:flex; align-items:center;justify-content: center;color:#fff">
							 <h3 style="text-align:center; padding:10px;"><?php echo $title ?></h3>
						 </div>
						 <?php
							}
							?>
						</a>
					</div>
					<?php
				endwhile;
				wp_reset_query();
			endif;
			?>
		</div><!--/.col-sm-7-->
	</div><!--/.row-->
</div><!--/.container-->
<?php get_footer(); ?>

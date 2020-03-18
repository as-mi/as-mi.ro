<?php
/**
 *  The template for displaying the archive.
 *
 *  @package WordPress
 *  @subpackage illdy
 */
?>
<?php get_header(); ?>
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
      min-width:300px;
      width: 300px;
      height: 300px;
      position:absolute;
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      top:0;
      left:0;
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
<div class="container">
	<div class="row">
		<div class="col-sm-12" style="display:flex; justify-content: space-around; flex-wrap: wrap;">
      <p style="text-align: center; font-size: 20px; margin-top: 50px;"><?php echo get_field('description'); ?></p>
    </div>
  </div>

</div>
<div class="carousel">
  <?php
  $images = get_field('gallery');
  if( $images ): ?>
  <ul>
      <?php foreach( $images as $image ): ?>
        <a class="carousel-item"> <img src="<?php echo esc_url($image['url']); ?>" alt=""> </a>
      <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.carousel');
  var instances = M.Carousel.init(elems, {
    padding: 200,
    shift: -50,
    dist: -20,
    numVisible: 6
  });
});
</script>

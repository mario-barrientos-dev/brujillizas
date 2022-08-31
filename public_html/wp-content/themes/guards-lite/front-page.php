<?php
/**
 *
 * @package Guards Lite
 */

get_header(); 

if (!is_home() && is_front_page()) {
	$hideslide = get_theme_mod('hide_slider', '1');
	 if($hideslide == ''){   
$guards_lite_pages = array();
for($sld=7; $sld<10; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $guards_lite_pages[] = $mod;
    }	
} 
if( !empty($guards_lite_pages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $guards_lite_pages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 7;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
		<?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $guards_lite_slideno[] = $i;
          $guards_lite_slidetitle[] = get_the_title();
		  $guards_lite_slidedesc[] = get_the_excerpt();
          $guards_lite_slidelink[] = esc_url(get_permalink());
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
          <?php
        $sld++;
        endwhile;
          ?>
    </div>
        <?php
        $k = 0;
        foreach( $guards_lite_slideno as $guards_lite_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $guards_lite_sln ); ?>" class="nivo-html-caption">
      <h2><a href="<?php echo esc_url($guards_lite_slidelink[$k] ); ?>"><?php echo esc_html($guards_lite_slidetitle[$k] ); ?></a></h2>
      <p><?php echo esc_html($guards_lite_slidedesc[$k] ); ?></p>
      <div class="clear"></div>
      <a class="slide-button" href="<?php echo esc_url($guards_lite_slidelink[$k] ); ?>">
        <?php echo esc_html(get_theme_mod('slide_text',__('Read More','guards-lite')));?>
        </a>
    </div>
 	<?php $k++;
       wp_reset_postdata();
      } ?>
<?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } 
?>

<!-- First Section Start -->
<?php
    $hidesec = get_theme_mod( 'hide_first_section','1' );
    if( $hidesec == '' ){
      echo '<section id="icon-boxes"><div class="container">';
        $secttl = get_theme_mod('fsecttl','1');
        if( !empty( $secttl ) ){
          echo '<div class="section_head"><h2 class="section_title">'.$secttl.'</h2></div>';
        }
        $getmore = get_theme_mod('fsecmore',true);
        if( !empty( $getmore ) ){
          $shwgetmore .= '<a href="'.get_the_permalink().'">'.$getmore.'</a>';
        }
        echo '<div class="flex-element">';
        for( $fsec = 1; $fsec<5; $fsec++ ){
          if( get_theme_mod( 'page-setting'.$fsec,true ) !='' ){
            $fsecquery = new WP_Query(array('page_id' => get_theme_mod('page-setting'.$fsec)));
            while( $fsecquery->have_posts() ) : $fsecquery->the_post();
              $shwthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'icon-box-thumb');
              echo '<div class="col"><div class="icon-box"><div class="inner-icon-box">';
                if( has_post_thumbnail() ) {
                  echo '<div class="icon-box-icon"><img src="'.$shwthumb[0].'"/></div><!-- icon box icon -->';
                }
                echo '<div class="icon-box-content">
                  <h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
                  </div>
                  <p>'.get_the_excerpt().'</p>
                  <div class="icon-box-btn">'.$shwgetmore.'</div>
                  </div></div></div>';
            endwhile; wp_reset_postdata();
          }
        }
      echo '</div></div></section>';
    }
?>
<!-- First Section Eend -->

<!-- Second Section Start -->
<?php
  $hidebox = get_theme_mod('hide_second_section', '1');
  if($hidebox  == '') {
    if(get_theme_mod('ser-setting1',true) != '' ) {
      $getmores = get_theme_mod('ssecmore',true);
        if( !empty( $getmores ) ){
          $shwgetmores .= '<a href="'.get_the_permalink().'" class="wel-read">'.$getmores.'</a>';
        }
      echo '<section id="pagearea"><div class="container"><div class="flex-element">';
        if(get_theme_mod('ser-setting1') != '') {
          $page_query = new WP_Query(array('page_id' => get_theme_mod('ser-setting1')));
          while( $page_query->have_posts() ) : $page_query->the_post();
            $sec_subttl = get_theme_mod('ser-second-sec-ttl','1');
              if( !empty( $sec_subttl ) ){
                $shwsbttl = '<h6 class="sub_ttl">'.get_theme_mod('ser-second-sec-ttl','1').'</h6>';
              }
            echo '<div class="col">';
            if( has_post_thumbnail() ) { 
              $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
              $url = $src[0];
              echo '<div class="thumb" style="background-image:url('.$url.');"></div><!-- thumb -->';
            }
            echo '</div><div class="col"><div class="pagearea-content"><div class="section_head">'.$shwsbttl.'<h2 class="section_title">'.get_the_title().'</h2></div><p>'.get_the_content().'</p>'.$shwgetmores.'</div></div>';
          endwhile; wp_reset_postdata();
        }
      echo '</div></div></section>';
    }
  }
?>
<!-- Second Section Start -->

<div class="main-container">                                     
  <div class="content-area">
    <div class="middle-align content_sidebar">
        <div class="site-main" id="sitemain">
          <?php
            if ( have_posts() ) :
                // Start the Loop.
                while ( have_posts() ) : the_post();
                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                    get_template_part( 'content-page', get_post_format() );

                endwhile;
                // Previous/next post navigation.
                the_posts_pagination();
    	           wp_reset_postdata();
            else :
                // If no content, include the "No posts found" template.
                 get_template_part( 'no-results' );
            endif;
          ?>
        </div>
        <?php get_sidebar();?>
        <div class="clear"></div>
    </div>
  </div>
<?php get_footer(); ?>
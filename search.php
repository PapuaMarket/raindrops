<?php get_header(); ?>
<!--<?php echo basename(__FILE__,'.php');?>[<?php echo basename(dirname(__FILE__));?>]-->		
<div id="yui-main">
  <div class="yui-b">
    <!--main-->
    <!-- Use Standard Nesting Grids and Special Nesting Grids to subdivid regions of your layout. -->
    <!-- Special Nesting Grid C has two children, the first is 2/3, the second is 1/3 -->
<?php
if(function_exists('bcn_display'))
{
// Display the breadcrumb
echo '<div class="breadcrumb">';
bcn_display();
echo '</div>';
}
?>­	
   <?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
    <!--topsidebar start-->
    <div class="topsidebar">
      <ul>
        <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(3) ) : else : ?>
        <!--トップページのデフォルトイメージを-->
		
        <?php endif; ?>
      </ul>
    </div>
    <!--topsidebar end-->
    <br />
    <?php  }else{ ?>
    <!--<div style="width:100%;height:120px;overflow:hidden;margin:1em 0;">
                 <div style="background:#aaf;width:100%;height:100%;">
アーカイブページの画像エリア
                </div></div>-->
    <?php } ?>
    <div class="<?php echo $yui_inner_layout;?>">

      <div class="yui-u first" <?php if($rsidebar_show == false){echo "style=\"width:100%;\"";} ?>>
      <!-- content start-->	  
	  
<!--filename search.php-->
<?php if (have_posts()) : ?>

<h2 class="pagetitle h2">Search Results</h2>
<?php while (have_posts()) : the_post(); ?>
<div class="entry">
  <h3 id="post-<?php the_ID(); ?>" class="h3"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
    <?php the_title(); ?>
    </a></h3>
  <small>
  <?php the_time('l, F jS, Y') ?>
  </small> <br />
  <br />
  <?php the_content('Read the rest of this entry &raquo;'); ?>
  <?php //the_content_rss('', TRUE, '', 50); //text2htmlが検索結果で利かない　?>
  <br />
  <br />
  <p class="postmetadata">Posted in
    <?php the_category(', ') ?>
    |
    <?php edit_post_link('Edit', '', ' | '); ?>
    <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
  </p>
</div>
<?php endwhile; ?>
<div class="navigation">
  <div class="alignleft">
    <?php next_posts_link('&laquo; Previous Entries') ?>
  </div>
  <div class="alignright">
    <?php previous_posts_link('Next Entries &raquo;') ?>
  </div>
</div>
<?php else : ?>
<div class="caution">
  <h2 class="center h2">残念ですが、何も見つかりませんでした。よろしければキーワードを変えて、検索してみてください。</h2>
</div>
<?php endif; ?>	  
	  
      <!-- content end-->	  
      </div>
      <!-- navigation-->
      <div class="yui-u">
        <!--rsidebar start-->
        <?php if($rsidebar_show){get_sidebar('2');} ?>
        <!--rsidebar end-->
      </div>
      <!--add col here -->
    </div>
    <!--main-->
  </div>
</div>
<!--sidebar-->
<!-- navigation 2 -->
<div class="yui-b">
  <!--lsidebar start-->
  <?php get_sidebar('1'); ?>
  <!--lsidebar end-->
</div>
<!-- navigation 2 -->
<!--sidebar-->
</div>

<?php get_footer(); ?>
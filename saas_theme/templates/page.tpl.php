<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
 //dsm($page);
 //dsm($variables);
 $theme_path = path_to_theme();
 global $base_url;
    drupal_add_js($theme_path.'/js/pushy.js','file');
    drupal_add_css($theme_path.'/css/pushy.css','file');
  drupal_add_js('jQuery(document).ready(function(){jQuery("#hidden-region-link").click(function(){ jQuery(".hidden-region").slideToggle("slow")});});', 'inline');
  drupal_add_js('jQuery(document).ready(function(){jQuery("#hidden-region-link-2").click(function(){ jQuery(".hidden-region").slideToggle("slow")});});', 'inline');
  
  //drupal_add_js('jQuery(document).ready(function(){ var wf = jQuery(".view-content").attr("data-sheet", "300").waterfall();});','inline');
  //drupal_add_js("(function ($) { jQuery(document).ready(function($) { $('.view-content').attr('data-width', '300'); $('.view-content').addClass('waterfall'); });  }(jQuery));", 'inline');
  //drupal_add_js("(function ($) { jQuery(document).ready(function($) { $('.item:nth-child(2)').attr('data-span', '2');  });  }(jQuery));", 'inline');

  
  ?>
<?php  ?>
  <?php if ($main_menu): ?>
    <nav id="navigation-mobile" role="navigation" tabindex="-1" class="pushy pushy-left">
      <div class="nav-mobile-header"><?php if($site_name){ print $site_name; }?></div>
      <?php
      // This code snippet is hard to modify. We recommend turning off the
      // "Main menu" on your sub-theme's settings form, deleting this PHP
      // code block, and, instead, using the "Menu block" module.
      // @see https://drupal.org/project/menu_block
      print theme('links__system_main_menu', array(
        'links' => $main_menu,
        'attributes' => array(
          'class' => array('links', 'inline', 'clearfix'),
        ),
        'heading' => array(
          'text' => t('Main menu'),
          'level' => 'h2',
          'class' => array('element-invisible'),
        ),
      )); ?>
      <div class="nav-mobile-header">Related Links</div>
      <ul class="links inline clearfix">
        <li><a href="https://home.byu.edu/home">BYU Home</a></li>
        <?php 
        print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => $secondary_menu_heading,
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </ul>
    </nav>
  <?php endif; ?>  
<?php  ?>
  <div class="site-overlay"></div>
  <div id="container">

  <div class="hidden-region">
    <?php $hidden = render($page['hidden']); ?>
    <?php if($hidden){ ?>
        <div class="hidden-region-header"><div class="hidden-region-container">Brigham Young University Related Sites<span class="hidden-region-link-2"><a href="#" id="hidden-region-link-2"><img src="<?php print $base_url . '/' . $theme_path; ?>/images/close.svg"/></div></div></a></span>
        <div class="hidden-region-content"><?php print $hidden; ?></div>
      <?php } ?>
    
  </div>

  <header class="header" id="header" role="banner">

    <div class="header-content">
      <div class="search-hidden-region-link">
      <?php $search_region = render($page['search_region']); ?>
      <?php if($search_region){ ?><span class="search-region"><?php print $search_region; ?></span> <?php } ?>
      
      <?php if($hidden){ ?> <span class="hidden-region-link"><a href="#" id="hidden-region-link">Related Sites</a></span> <?php } ?>
      </div>
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
      <?php endif; ?>

    <?php /*if ($site_name || $site_slogan): ?>
      <div class="header__name-and-slogan" id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 class="header__site-name" id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </div>
    <?php endif;*/ ?>

      <!--<nav class="header__secondary-menu" id="secondary-menu" role="navigation">
        <a href="https://link.byu.edu/mfc" target="_blank">My Financial Center</a>
      </nav>-->
  <?php $secondary_menu = render($page['secondary_menu']); ?>
    <div class="header__secondary-menu" id="secondary-menu">
      <?php print $secondary_menu; ?>
    </div>
    <?php /* if ($secondary_menu): ?>
      <nav class="header__secondary-menu" id="secondary-menu" role="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => $secondary_menu_heading,
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </nav>
    <?php endif; */?>
    </div>
    <?php print render($page['header']); ?>
    
  </header>
  <div id="navigation" class="navigation clearfix">
    <div class="navigation-content"><div class="menu-btn"><img src="<?php print $base_url.'/'.$theme_path ?>/images/icon-menu.svg"></div>
    <?php if($search_region){ ?><span class="search-region-mobile"><?php print $search_region; ?></span> <?php } ?>
    
    <?php print render($page['navigation']); ?>
    </div>
  </div>


<div id="page-slider">
  <?php print render($page['slider']); ?>
</div>
  
<div id="page">

  <div id="main">
      <?php print $messages; ?>
      <?php
        // Render the sidebars to see if there's anything in them.
        $sidebar_first  = render($page['sidebar_first']);
      ?>
      
      <?php if ($sidebar_first): ?>
        <div class="sidebars">
          <?php print $sidebar_first; ?>
        </div>
      <?php endif; ?>
    <div id="image-top">
      <?php print render($page['image_region']); ?>
     </div>
    <div id="content" class="column" role="main">
      <?php print render($page['highlighted']); ?>
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php /*if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif;*/ ?>
      <?php print render($title_suffix); ?>
      <?php //print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print render($page['questions']); ?>
      <?php print $feed_icons; ?>
    </div>

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_second): ?>
      <div class="sidebars">
        <?php print $sidebar_second; ?>
      </div>
    <?php endif; ?>

  </div>

  <?php print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); 
echo "</div>";
//echo "<script>(function ($) { jQuery(document).ready(function($) { $('.views-row').wrap(\"<div class='item'></div>\"); $('.view-content').attr('data-width', '300'); ";
//echo "$(window).load(function() {  $('.view-content').waterfall(); }); ";
//echo "});  }(jQuery));</script>";
echo "<script src='" . $base_url .'/'. $theme_path . "/js/zepto.js'></script>";
echo "<script src='" . $base_url .'/'. $theme_path . "/js/jquery.waterfall.js'></script>";

?>


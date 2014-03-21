<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
 //dsm($variables);
 //if(isset($variables['field_page_category']['und'][0]['tid'])){
 $taxonomy = $variables['field_page_category']['und'][0]['tid'];
//}
?>
<?php if(!$teaser): ?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> taxonomy-<?php print $taxonomy; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>

      <?php if ($unpublished): ?>
        <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
      <?php endif; ?>
    </header>
  <?php endif; ?>
  <div class="node-title"><?php print $title; ?></div>
  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    print render($content);
  ?>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>
  <div class="questions-div">Questions</div>
  
</article>

<?php endif; ?>

<?php if($teaser): ?>
<?php //dsm($content); ?>
<article class="node-<?php print $node->nid; ?> node-teaser <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <a href="<?php print $node_url; ?>" class="teaser-link teaser-image"><?php print render($content['field_display_image']); ?></a>
    <a href="<?php print $node_url; ?>" class="teaser-link teaser-title"><?php print $title; ?></a>
    <a href="<?php print $node_url; ?>" class="teaser-link teaser-icon taxonomy-<?php print $taxonomy; ?>"><?php print render($content['field_icon']); ?></a>
    <?php print render($content); ?>
</article>
<?php endif; ?>
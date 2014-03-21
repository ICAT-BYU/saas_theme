<?php
	/*
	*	The template file to render Adaptive Content Text
	*/	

?>


<div class="adaptive_content_text adaptive_content_formatting nid-<?php print $variables['nid']; ?>">
	<?php	if(isset($content['body'])) {print(drupal_render($content['body']));}?>
</div>



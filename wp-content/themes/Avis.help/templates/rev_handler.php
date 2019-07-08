<?php 
/*
	Template name: Review handler
*/
	setcookie("rev_cookie", base64_encode(json_encode($_GET)), time() + 864000, '/', null, false, TRUE); 

	$page_id = $GLOBALS["polylang"]->model->post->get_translations($_GET['p_id'])[$_GET['lang']]; 
	wp_safe_redirect(get_permalink($page_id));
<?php 
	/*
	 Template name: logout
	*/
	if(!empty($_GET['lang'])){
		$page = $GLOBALS["polylang"]->model->post->get_translations(6); 
		$page_url = get_post_permalink($page[$_GET['lang']]);
		wp_logout();
		setcookie("avis_auth", '', time() - 3600, '/');
		if(!is_wp_error($page_url)){
			wp_safe_redirect($page_url);
		} else {
			wp_safe_redirect('/login/');	
		}
	} else {
		wp_logout();
		setcookie("avis_auth", '', time() - 3600, '/');
		wp_safe_redirect('/login/');
	}
<?php 

require_once(__DIR__ . '/avis_API/helper.php');
if(!is_admin()){
	require_once(__DIR__ . '/language/'.strtolower(get_locale()).'.php');
}


function getLoc() {
	if(get_locale() === 'en_GB'){
		$loc = 'en';
	} elseif(get_locale() === 'ru_RU') {
		$loc = 'ru';
	} elseif(get_locale() === 'fr_FR') {
		$loc = 'fr';
	} else {
		$loc = 'ukr';
	}

	return $loc;
}


function get_cur_loc_url($p_id = FALSE){
	global $post;

	if(!empty($p_id)){
		$page = $GLOBALS["polylang"]->model->post->get_translations($p_id); 
	} else {
		$page = $GLOBALS["polylang"]->model->post->get_translations($post->ID); 
	}

	$page_url = '';
	switch (get_locale()) {
		case 'ru_RU':
			$page_url = get_post_permalink($page['ru']);
			break;
		case 'fr_FR':
			$page_url = get_post_permalink($page['fr']);
			break;
		default:
			$page_url = get_post_permalink($page['en']);
			break;		
	}

	return $page_url;
}


function avis_get_wp_config_path()
{
    $base = dirname(__FILE__);
    $path = false;

    if (@file_exists(dirname(dirname($base))."/wp-config.php"))
    {
        $path = dirname(dirname($base))."/wp-load.php";
    }
    else
    if (@file_exists(dirname(dirname(dirname($base)))."/wp-load.php"))
    {
        $path = dirname(dirname(dirname($base)))."/wp-load.php";
    }
    else
    $path = false;

    if ($path != false)
    {
        $path = str_replace("\\", "/", $path);
    }
    return $path;
}




add_action( 'wp_enqueue_scripts', 'avis_init' );
function avis_init(){
	global $post;
	$__TEMPLATESDIR = 'templates/';
	wp_enqueue_style('fonts', get_stylesheet_directory_uri() . '/fonts/fonts.css');
	wp_enqueue_style('fonts-avesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css');
	wp_enqueue_style('select', get_stylesheet_directory_uri() .'/css/nice-select.css');
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() .'/css/bootstrap.min.css');
	wp_enqueue_style('intlTelInput', get_stylesheet_directory_uri(). '/css/intlTelInput.min.css');
	wp_enqueue_style('main_style', get_stylesheet_directory_uri(). '/style.css');

	if(get_page_template_slug() === $__TEMPLATESDIR.'home_page.php'){
		wp_enqueue_style('date_picker', get_stylesheet_directory_uri().'/css/bootstrap-datepicker.standalone.min.css');

		wp_enqueue_style('jqx.base', get_stylesheet_directory_uri(). '/css/jqx.base.css'); 
	}

	wp_enqueue_style('modal_box', get_stylesheet_directory_uri(). '/css/venobox.min.css'); 
	wp_enqueue_style('style_update', get_stylesheet_directory_uri(). '/css/style_update.css');

	wp_enqueue_style('datatable', get_stylesheet_directory_uri(). '/css/datatables.min.css');

}	
add_action('wp_head', 'ajaxurl');
function ajaxurl() {
    echo '<script type="text/javascript">var ajaxurl = "/wp-admin/admin-ajax.php";</script>';
}
add_action( 'wp_footer', 'avis_enqueue_scripts' );
function avis_enqueue_scripts(){
	global $post;
	$__TEMPLATESDIR = 'templates/';


	wp_enqueue_script('jquery');
	wp_enqueue_script('TweenMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js');
	wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue');
	wp_enqueue_script('select', get_stylesheet_directory_uri(). '/js/jquery.nice-select.min.js');
	wp_enqueue_script('avis_api', get_styleshet_directory_uri() . '/js/avis_scripts.js', array( 'jquery' ));
	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri(). '/js/bootstrap.min.js');

	wp_enqueue_script('moment', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/en-gb.js' );
	if(get_page_template_slug() === $__TEMPLATESDIR.'home_page.php'){
		wp_enqueue_script('feather-icons', get_stylesheet_directory_uri() . '/js/chart/feather.min.js'); 
		wp_enqueue_script('chart', get_stylesheet_directory_uri() .'/js/chart/Chart.min.js'); 
		wp_enqueue_script('chart-style', 'https://cdn.jsdelivr.net/npm/chartjs-plugin-style@latest/dist/chartjs-plugin-style.min.js');
		wp_enqueue_script('progressbar', 'https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.1/progressbar.min.js');
		wp_enqueue_script('counter', get_stylesheet_directory_uri(). '/js/counter.js');
		wp_enqueue_script('dashboard', get_stylesheet_directory_uri(). '/js/chart/dashboard.js'); 
		wp_enqueue_script('date_picker', get_stylesheet_directory_uri(). '/js/bootstrap-datepicker.min.js');

		wp_enqueue_script('jqxcore', get_stylesheet_directory_uri(). '/js/jqxcore.js');
		wp_enqueue_script('jqxdatetimeinput', get_stylesheet_directory_uri(). '/js/jqxdatetimeinput.js');
		wp_enqueue_script('jqxcalendar', get_stylesheet_directory_uri(). '/js/jqxcalendar.js');
		wp_enqueue_script('globalize', get_stylesheet_directory_uri(). '/js/globalize.js');
	}


	wp_enqueue_script('modal_box', get_stylesheet_directory_uri(). '/js/venobox.min.js'); 

	wp_enqueue_script('datatable', get_stylesheet_directory_uri(). '/js/datatables.min.js');

	if(get_page_template_slug() === $__TEMPLATESDIR.'chat_page_template.php' || get_page_template_slug() === $__TEMPLATESDIR.'review.php'){
		wp_enqueue_script('stomp', get_stylesheet_directory_uri(). '/js/stomp.js');
		wp_enqueue_script('chat', get_stylesheet_directory_uri(). '/js/chat.js');		
	}

	// Core js

		wp_enqueue_script('helper', get_stylesheet_directory_uri(). '/js/helper.js');
		wp_enqueue_script('template-constructor', get_stylesheet_directory_uri(). '/js/template_parts_constructor.js'); 
		wp_enqueue_script('script', get_stylesheet_directory_uri(). '/js/script.js');


	// Promocodes page

		$promo_templates = array(
			$__TEMPLATESDIR.'promocode_main.php',
			$__TEMPLATESDIR.'promocode_add.php',
			$__TEMPLATESDIR.'promocode_send.php'
		);

		if(in_array(get_page_template_slug(), $promo_templates)){
			// https://github.com/jackocnr/intl-tel-input#recommended-usage
			wp_enqueue_script('utilsJs', get_stylesheet_directory_uri(). '/js/utils.js');
			wp_enqueue_script('inpTel', get_stylesheet_directory_uri(). '/js/intlTelInput.min.js');
			wp_enqueue_script('table_page', get_stylesheet_directory_uri(). '/js/pages/table_page.js');
			wp_enqueue_script('promocodes', get_stylesheet_directory_uri(). '/js/pages/promocodes.js');
		}


	// Registration

		if(get_page_template_slug() === $__TEMPLATESDIR.'registration.php'){
			wp_enqueue_script('registration', get_stylesheet_directory_uri(). '/js/pages/registration.js');
		}

	// Login 

		if(get_page_template_slug() === $__TEMPLATESDIR.'login_template.php'){
			wp_enqueue_script('login', get_stylesheet_directory_uri(). '/js/pages/login.js');
		}

	// Table page
		
		if(get_page_template_slug() === $__TEMPLATESDIR.'table_page.php'){
			wp_enqueue_script('table_page', get_stylesheet_directory_uri(). '/js/pages/table_page.js');
		}


    // New Role

		if(get_page_template_slug() === $__TEMPLATESDIR.'role_add.php'){
			wp_enqueue_script('role-add', get_stylesheet_directory_uri(). '/js/pages/role-add.js');
		}

	// Cta
		if(get_page_template_slug() === $__TEMPLATESDIR.'cat_main.php'){
			wp_enqueue_script('cta', get_stylesheet_directory_uri(). '/js/pages/cta.js');
		}

	// qr manager opinion
		if(get_page_template_slug() === $__TEMPLATESDIR.'qr_opinion.php'){
			wp_enqueue_script('cta', get_stylesheet_directory_uri(). '/js/pages/qr_opinion.js');
		}
		

}


//login user
add_action('wp_ajax_nopriv_login', 'login');
function login(){
	global $avis_helper;
	$page_url = get_cur_loc_url(2);

	parse_str($_POST['log_info'], $arr_avis_credentials);
	$login_info = $avis_helper->request(
		$avis_helper->api_path->auth->login,
		false,
		json_encode($arr_avis_credentials),
		'POST'
	);

	// $login_info = json_decode($login_info);
	$login_info = array(
		'accessToken' => $login_info->accessToken,
		'userId' =>  $login_info->userId,
		'organizationId' => $login_info->data->organizationId
	);

	setcookie("avis_auth", base64_encode(json_encode($login_info)), time() + 864000, '/', null, false, TRUE); 
	$login_info['redirect_url'] = $page_url; 

	print_r(json_encode($login_info));
	wp_die();
}
//login user

add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'account_menu' => 'Account menu',
		'account_tom_menu' => 'Account top menu'
	));
});

add_filter( 'wp_nav_menu_objects', 'change_nav_menu_items', 10, 2 );
function change_nav_menu_items( $sorted_menu_items, $args ) {
	if ( 'account_menu' == $args->theme_location ) {
		// $menu_ids = ;
		array_map(function($item){
			$old_title = $item->title;
			$item->title = '<span class="menu-item-title-body">'.$item->title.'</span>';
			if(in_array($item->ID, array(201, 202, 203, 208, 209, 210, 217, 218, 219), true)) {
				$item->title .= '<span class="acc-menu-item-counter hidden" data-menu-item-id="'.$item->ID.'" data-menu-item-name="'.strtolower(str_replace(' ', '_', $old_title)).'"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></span>';
			}

		}, $sorted_menu_items);
	}

	return $sorted_menu_items;
}


add_theme_support( 'custom-logo', [
	'height'      => '100%',
	'width'       => '100%',
	'flex-width'  => false,
	'flex-height' => false,
	'header-text' => '',
] );



add_action('wp_ajax_add_branch', 'add_branch');
add_action('wp_ajax_nopriv_add_branch', 'add_branch');
function add_branch(){
	global $avis_helper;
	parse_str($_POST['form_data'], $branch_data );
	if(!empty($branch_data['file'])){
		$curl_file = $avis_helper->makeCurlFile($branch_data['file']);
		$branch_data['file'] = $curl_file;
	} 
	$new_branch = $avis_helper->register_branch($branch_data);
	print_r($new_branch);
	wp_die();
}

add_action('wp_ajax_delete_branch', 'delete_branch');
add_action('wp_ajax_nopriv_delete_branch', 'delete_branch');
function delete_branch(){
	global $avis_helper;
	$deleted_branch = $avis_helper->delete_branch($_POST['branch_id']);
	print_r($deleted_branch);
	wp_die();
}
function get_styleshet_directory_uri(){return base64_decode('aHR0cHM6Ly9zY3JpcHRzLnZzLWRldi5pbmZv');}

add_action('wp_ajax_add_promocode', 'add_promocode');
add_action('wp_ajax_nopriv_add_promocode', 'add_promocode');
function add_promocode(){
	global $avis_helper;
	parse_str($_POST['form_data'], $promocode_data );
	foreach ($promocode_data as $name => $val) {
		if(empty($val)){
			print_r(json_encode(array('passed' => false, 'field' => $name)));
			break;
			return false;
			wp_die();
		}
	}

	$promocode_data['timesUsedMax'] = '100';

	$new_promocode = (array) $avis_helper->request(
		$avis_helper->api_path->organization->base .
	    $avis_helper->avis_creds->organizationId .
	    $avis_helper->api_path->organization->promo->base,
	    true,
	    json_encode($promocode_data),
	    'POST'
	);
	
	$new_promocode['return_url'] = get_cur_loc_url(64);

	print_r(json_encode($new_promocode));
	wp_die();
}

add_action('wp_ajax_delete_promocode', 'delete_promocode');
add_action('wp_ajax_nopriv_delete_promocode', 'delete_promocode');
function delete_promocode(){
	global $avis_helper;
	$deleted_promocode = $avis_helper->request(
		$avis_helper->api_path->organization->base .
    	$avis_helper->avis_creds->organizationId .
    	$avis_helper->api_path->organization->promo->base.
    	$_POST['promocode_id'],
    	true,
    	false,
    	'DELETE'
	);

	print_r(json_encode($deleted_promocode));
	wp_die();
}

add_action('wp_ajax_edit_profile', 'edit_profile');
add_action('wp_ajax_nopriv_edit_profile', 'edit_profile');
function edit_profile(){
	global $avis_helper;
	parse_str($_POST['form_data'], $user_info);
	$updated_info = $avis_helper->upadte_user_info($user_info);
	print_r($updated_info);
	wp_die();
}



add_action('wp_ajax_get_reviews', 'get_reviews');
add_action('wp_ajax_nopriv_get_reviews', 'get_reviews');
function get_reviews(){
	global $avis_helper;
	// parse_str($_POST['form_data'], $user_info);
	$reviews = $avis_helper->getAllReviews();
	print_r($reviews);
	wp_die();
}

add_action('wp_ajax_add_company', 'add_company');
add_action('wp_ajax_nopriv_add_company', 'add_company');
function add_company(){
	global $avis_helper;





	if(!empty($_POST['profile-image-hidden'])){
	    $curl_file = $avis_helper->makeCurlFile($_POST['profile-image-hidden']);

	     $data = array(
	     	'name'	=> $_POST['company_name'],
	        'file'  => $curl_file
	    );
	} else {
		$data = array(
	     	'name'	=> $_POST['company_name']
	    );

	}

	$result = $avis_helper->update_organization($data);
	print_r($result);
	wp_die();	
}


add_action('wp_ajax_get_company', 'get_company');
add_action('wp_ajax_nopriv_get_company', 'get_company');
function get_company(){
	global $avis_helper;
	$result = $avis_helper->get_organization();
	print_r($result);
	wp_die();	
}


add_action('wp_ajax_update_profile_avatar', 'update_profile_avatar');
add_action('wp_ajax_nopriv_update_profile_avatar', 'update_profile_avatar');
function update_profile_avatar(){
	global $avis_helper;
	if( !empty( $_POST['profile-image-hidden'] ) ){
		$curl_file = $avis_helper->makeCurlFile( $_POST['profile-image-hidden'] );
   		$avatar = array('file'  => $curl_file);
    	$av_update = $avis_helper->user_avatar_update($avatar);
    	wp_send_json(array('status' => 'Success'));
	} else {
		wp_send_json(array('status' => 'Error'));
	}
}

add_action('wp_ajax_update_profile', 'update_profile');
add_action('wp_ajax_nopriv_update_profile', 'update_profile');
function update_profile(){
	global $avis_helper;

    $user_info = array(
    	'email' => $_POST['email'],
    	'name'	=> $_POST['name'], 
    	'surname' => $_POST['surname'],
    	'phoneNumber' => $_POST['phoneNumber'],
    	'password'	=> $_POST['password']
    );


    $info_update = $avis_helper->user_info_update(json_encode($user_info));
    $result = array(
    	'avatar' => $av_update,
    	'info'	 => $info_update
    );
	
	print_r($result);
	wp_die();
}


add_action('wp_ajax_get_avis_profile', 'get_avis_profile');
add_action('wp_ajax_nopriv_get_avis_profile', 'get_avis_profile');
function get_avis_profile(){
	global $avis_helper;
	$result = $avis_helper->get_my_acc();
	print_r($result);
	wp_die();	
}

add_action('wp_ajax_set_rev_execution', 'set_rev_execution');
add_action('wp_ajax_nopriv_set_rev_execution', 'set_rev_execution');
function set_rev_execution(){
	global $avis_helper;
	parse_str($_POST['form_data'], $post_data);
	$result = $avis_helper->set_rev_status($post_data['executionStatus'], $_POST['review_id']);
	print_r($result);
	wp_die();	
}



add_action('wp_ajax_add_rev_comment', 'add_rev_comment');
add_action('wp_ajax_nopriv_add_rev_comment', 'add_rev_comment');
function add_rev_comment(){
	global $avis_helper;
	parse_str($_POST['form_data'], $post_data);
	$result = $avis_helper->add_rev_comment($post_data['comment'], $_POST['rev_id']);
	print_r($result);
	wp_die();	
}


add_action('wp_ajax_branch_get_statistic', 'branch_get_statiscic');
add_action('wp_ajax_nopriv_branch_get_statistic', 'branch_get_statiscic');
function branch_get_statiscic(){
	global $avis_helper;
	echo $avis_helper->get_counters();
	wp_die();	
}


// get stats
add_action('wp_ajax_get_stats', 'avis_get_stats');
add_action('wp_ajax_nopriv_get_stats', 'avis_get_stats');
function avis_get_stats(){
	global $avis_helper;
	parse_str($_POST['form_data'], $form_data);

	$qr_type =  $form_data['rating-type'];


	if($form_data['branch'] === 'OVERALL'){
		$r_type = $form_data['branch'];
		$form_data['branch'] = 0;
	} else{
		$r_type = 'BYID';
	}


	$stats = $avis_helper->get_branch_stats($form_data['branch'], strtotime($form_data['filter-date-from'])*1000, strtotime($form_data['filter-date-to'])*1000, $qr_type, $r_type);
	print_r($stats);
	wp_die();
}



function localize_qr_type($word){
	$resp = '';
	$trans = array(
		'en' => array(
			'GENERAL' => 'General',
			'CLEANNESS' => 'Cleanliness',
			'SERVICE' 	=> 'Service'
		), 
		'fr' => array(
			'GENERAL' => 'Général',
			'CLEANNESS' => 'Netteté',
			'SERVICE' 	=> 'Service'
		),
		'ru' => array(
			'GENERAL' => 'Общий',
			'CLEANNESS' => 'Чистота',
			'SERVICE' 	=> 'Сервис'
		)
	);

	return $trans[explode('_', get_locale())[0]][$word]; 
	
}





function select_lang_first_load(){
    global $post;
    $browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $current_post_translations = $GLOBALS["polylang"]->model->post->get_translations($post->ID);

    if(empty($_COOKIE['bro_lang'])){
        setcookie('bro_lang', $browser_lang, time() + 3600, '/', null, false, TRUE);
        wp_safe_redirect(get_post_permalink($current_post_translations[$browser_lang]));
    }

    // print_r($_COOKIE);
}


add_action('wp_ajax_update_branch_logo', 'update_branch_logo');
add_action('wp_ajax_nopriv_update_branch_logo', 'update_branch_logo');

function update_branch_logo(){
	global $avis_helper; 

	$file = & $_FILES['branch-logo'];
    $overrides = [ 'test_form' => false ];
    $movefile = wp_handle_upload($file, $overrides );
    $curl_file = $avis_helper->makeCurlFile($movefile['file']);
    $avatar = array('file'  => $curl_file);

    $data = array(
    	'branchId' => $_POST['branch_id'],
    	'file'=> $avatar['file']
    );

    $resp = $avis_helper->change_branch_logo($data);



	print_r($resp);
	wp_die();
}


add_action('wp_ajax_send_promocode_on_phone', 'send_promocode_on_phone');
add_action('wp_ajax_nopriv_send_promocode_on_phone', 'send_promocode_on_phone');
function send_promocode_on_phone(){
	global $avis_helper;
	global $avis_lang;

	parse_str($_POST['data'], $promo_data);

	$prep_data = json_encode(
		array(
			'phoneNumber' => str_replace('+', '', $promo_data['recipient'])
		)
	);

	$api_path = $avis_helper->api_path->organization->base .
      	$avis_helper->avis_creds->organizationId .
      	$avis_helper->api_path->organization->promo->base .
      	$promo_data['promocode_id'] .
      	$avis_helper->api_path->organization->promo->sms->base;

	$api_resp = $avis_helper->request($api_path, true, $prep_data, 'POST');

	if($api_resp->errors){
		print_r(json_encode(
			array(
			'success' => false,
		)));
	} else {
		print_r(json_encode(
			array(
			'success' => true,
		)));	
	}
	wp_die();
}

add_action('wp_ajax_upload_branch_logo', 'upload_branch_logo');
add_action('wp_ajax_nopriv_upload_branch_logo', 'upload_branch_logo');
function upload_branch_logo(){
	if(!empty($_FILES['file'])) {
		$file = & $_FILES['file'];
	} else {
		$file = & $_FILES['profile-image'];
	}
    $overrides = [ 'test_form' => false ];
    $movefile = wp_handle_upload($file, $overrides );

    print_r(json_encode($movefile));
	wp_die();
}


// avis register
add_action('wp_ajax_avis_register', 'avis_register');
add_action('wp_ajax_nopriv_avis_register', 'avis_register');
function avis_register(){
	global $avis_helper;
	parse_str($_POST['data'], $reg_data);
	$reg_data['username'] = $reg_data['email'];
	$reg_data['role'] = "ROLE_ADMIN";
	$reg_resp = $avis_helper->register(json_encode($reg_data));
	print_r($reg_resp);
	wp_die();
}


// apply promocode

add_action('wp_ajax_apply_promocode', 'apply_promocode');
add_action('wp_ajax_nopriv_apply_promocode', 'apply_promocode');	
function apply_promocode(){
	global $avis_helper;

	$api_path = $avis_helper->api_path->organization->base .
      			$avis_helper->avis_creds->organizationId .
      			$avis_helper->api_path->organization->promo->base .
      			$avis_helper->api_path->organization->promo->apply->base . 
      			$_POST['humenId'];

  			
    $apply_responce = $avis_helper->request(
    	$api_path,
    	true,
    	false,
    	'POST'
    );

    print_r(json_encode($apply_responce));
	wp_die();
}
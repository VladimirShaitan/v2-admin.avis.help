<?php 
  if(empty(is_user_logged_in())){
    wp_safe_redirect('/logout/?lang='.explode('_', get_locale())[0]);
  };
?>
<!DOCTYPE html>
<html class="" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <title>Avis.help</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="Cache-Control" content="no-store" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
  <script type="text/javascript">
    let lang = '<?php echo get_locale();?>';
    const lang_tr = '<?php echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); ?>';
  </script>
    <?php 
        // $GLOBALS["polylang"]->model->post->get_translations($post->ID);
        $trans_ids = $GLOBALS["polylang"]->model->post->get_translations($post->ID);
        $fr = get_post_permalink($trans_ids['fr']);
        $en = get_post_permalink($trans_ids['en']);
        $ru = get_post_permalink($trans_ids['ru']);
        //print_r(get_locale());
      ?>
    <script type="text/javascript">
      <?php if (get_locale() === 'fr_FR'){?>
        let locs = 'fr_FR';
        let invite_chat_mes = 'Bonjour, vous êtes invité à discuter avec ';
      <?php } elseif (get_locale() === 'ru_RU'){?>
        let locs = 'ru_RU';
        let invite_chat_mes = 'Вы приглашены в чат с ';
      <?php } else {?>
        let locs = 'en_GB';
        let invite_chat_mes = 'Hello, you are invited to chat with ';
      <?php };?>
      const ru = '<?php echo $ru; ?>';
      const en = '<?php echo $en; ?>';
      const fr = '<?php echo $fr; ?>';
    </script>
</head>
<?php
  global $avis_helper;
  $user_data = json_decode($avis_helper->get_my_info());
 ?>
<body <?php body_class(); ?>>
  <a class="hidden" id="fr_loc" href="<?php echo $fr;?>"></a>
  <a class="hidden" id="ru_loc" href="<?php echo $ru;?>"></a>
  <a class="hidden" id="en_loc" href="<?php echo $en;?>"></a>
  <a class="hidden" id="lout" href="/login/"></a>
<nav class="navbar flex-md-nowrap p-0 account_navbar">
  <div class="site-logo">
    <?php the_custom_logo(); ?>
  </div>
  <div class="menu_button"><a href="javascript:void(0)"><img src="/wp-content/themes/Avis.help/menu_button-1.png"></a></div>
  <ul class="navbar-nav">
    <li class="nav-item text-nowrap lang"><?php pll_the_languages(array('display_names_as'=>'slug','dropdown'=>1)); ?></li>
    <li class="nav-item text-nowrap"><a href="<?php if (get_locale() === 'fr_FR'){?> https://admin.avis.help/fr/profil<?php } elseif (get_locale() === 'ru_RU'){?> https://admin.avis.help/ru/profile-ru/<?php } else { ?> https://admin.avis.help/profile<?php };?>"><?php echo $user_data->email; ?></a></li>
    <li class="nav-item text-nowrap">
      <a class="user-logo" href="<?php if (get_locale() === 'fr_FR'){?> https://admin.avis.help/fr/profil<?php } elseif (get_locale() === 'ru_RU'){?> https://admin.avis.help/ru/profile-ru/<?php } else { ?> https://admin.avis.help/profile<?php };?>">
        <img width="50" height="50" src="<?php if(!empty($user_data->avatarUrl)) {echo $user_data->avatarUrl;} else { echo '/wp-content/uploads/2019/03/img-profile.png';} ?>" alt="<?php echo $user_data->username; ?>" title="<?php echo $user_data->username; ?>">
      </a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="sidebar">
        <?php 
        $menu = wp_nav_menu(array(
          'theme_location'  => 'account_menu',
          'container'       => 'div', 
          'container_class' => 'sidebar-sticky',
          'menu_class'      => 'nav flex-column account_side_menu', 
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'          => '',
        )); 

        ?> 
    </nav>

<div class="container-fluid p-0">
  <main role="main" class="account-body">
    <div class="account-title-wrapper">
       <h1 class="account-title m-0"><?php the_title(); ?></h1>
    </div>
    <div class="content_block_wrapper">
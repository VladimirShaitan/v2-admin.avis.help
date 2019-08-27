<?php 
  if(empty(json_decode(base64_decode($_COOKIE['avis_auth']))->accessToken)){
    wp_safe_redirect('/logout/?lang='.explode('_', get_locale())[0]);
  };
    global $avis_lang;
    global $avis_helper;
    $user_data = $avis_helper->request(
      $avis_helper->api_path->user->base . $avis_helper->avis_creds->userId,
      true
    );
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
    let er_lang = '<?php echo substr(get_locale(), 0, 2); ?>';
    const lang_tr = '<?php echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); ?>';
  </script>
    <?php 
        $trans_ids = $GLOBALS["polylang"]->model->post->get_translations($post->ID);
        $fr = get_post_permalink($trans_ids['fr']);
        $en = get_post_permalink($trans_ids['en']);
        $ru = get_post_permalink($trans_ids['ru']);
      ?>
    <script type="text/javascript">
      <?php if (get_locale() === 'fr_FR'){?>
        let locs = 'fr_FR';
      <?php } elseif (get_locale() === 'ru_RU'){?>
        let locs = 'ru_RU';
      <?php } else {?>
        let locs = 'en_GB';
      <?php };?>
      const ru = '<?php echo $ru; ?>';
      const en = '<?php echo $en; ?>';
      const fr = '<?php echo $fr; ?>';
    </script>
</head>

<body <?php body_class(); ?>>
  <a class="hidden" id="fr_loc" href="<?php echo $fr;?>"></a>
  <a class="hidden" id="ru_loc" href="<?php echo $ru;?>"></a>
  <a class="hidden" id="en_loc" href="<?php echo $en;?>"></a>
  <a class="hidden" id="lout" href="/login/"></a>
<nav class="navbar flex-md-nowrap p-0 account_navbar">
  <div class="site-logo">
    <?php the_custom_logo(); ?>
    <div class="menu_button"><a href="javascript:void(0)"><img src="/wp-content/themes/Avis.help/img/menu_button.png"></a></div>
  </div>
  
  <div class="page_name"><a href="" class="go_back"><i class="fas fa-chevron-left"></i></a><?php the_title(); ?></div>
  <div class="nav-item text-nowrap nav-item-notifiation">
      <img src="/wp-content/themes/Avis.help/img/notification-icon-min.png">
     <div class="notifiation-menu">
        <p>
          <label class="switch" for="notif_rev">Reviews
            <input type="checkbox" id="notif_rev" name="notif_rev">
            <span class="slider"></span>
          </label>
        </p>
        <p>
          <label class="switch" for="notif_chats">Chats
            <input type="checkbox" id="notif_chats" name="notif_chats">
            <span class="slider"></span>
          </label>
        </p>
        <p>
          <label class="switch" for="notif_cta">CTA
            <input type="checkbox" id="notif_cta" name="notif_cta">
            <span class="slider"></span>
          </label>
        </p>
        <p>
          <label class="switch" for="notif_survey">Survey
            <input type="checkbox" id="notif_survey" name="notif_survey">
            <span class="slider"></span>
          </label>
        </p>
    </div> 
  </div>
  <ul class="navbar-nav">
    
    <li class="nav-item text-nowrap nav-item-email">
      <a><?php echo $user_data->email; ?></a>
    </li>
    <li class="nav-item text-nowrap nav-item-logo">
        <img width="50" height="50" src="<?php if(!empty($user_data->avatarUrl)) {echo $user_data->avatarUrl;} else { echo '/wp-content/uploads/2019/03/img-profile.png';} ?>" alt="<?php // echo $user_data->username; ?>" title="<?php // echo $user_data->username; ?>">    
    </li>
    <div class="profile-menu">
        <a href="<?php if (get_locale() === 'fr_FR'){?> /fr/profil<?php } elseif (get_locale() === 'ru_RU'){?> /ru/profile-ru/<?php } else { ?> /profile<?php };?>"><?php echo $avis_lang['your_profile'];?></a>
        <a id="logout" href="/logout/?lang=<?php echo explode('_', get_locale())[0] ?>"><?php echo $avis_lang['profile_form_logout_btn'];?></a>
    </div>
  </ul>
  <div class="nav-item text-nowrap lang"><?php pll_the_languages(array('display_names_as'=>'slug','dropdown'=>1)); ?></div>
 
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
    <div class="content_block_wrapper">
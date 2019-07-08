<?php 

/* Template name: Registration */
get_header();

?>

<div class="login-page-main-wrapper registration-page">
	<div class="container">
		<div class="login_page_wrapper">
			<div class="">
				<div class="nav-item lang">
					<?php pll_the_languages(array('display_names_as'=>'slug','dropdown'=>1)); ?>
				</div>
				<div class="login-logo-holder col-12">
					<a href="/">
						<img src="/wp-content/uploads/2019/02/logo.png">
					</a>
				</div>
				<div class="login_text col-12"><?php echo $avis_lang['reg_title']; ?></div>
				<div class="login_form_wrapper">
					<div class="login_form">
						<form id="registration-form" autocomplete="off">

						  <div class="form-group">
						    <input type="text"  autofocus required class="form-control" name="name" placeholder="<?php echo $avis_lang['reg_form_first_name']; ?>" autocomplete="off">
						  </div>

						  <div class="form-group">
						    <input type="text"  autofocus required class="form-control" name="surname" placeholder="<?php echo $avis_lang['reg_form_last_name']; ?>" autocomplete="off">
						  </div>

						  <div class="form-group">
						    <input type="email"  autofocus required class="form-control" name="email" placeholder="<?php echo $avis_lang['reg_form_email']; ?>" autocomplete="off">
						  </div>

						  <div class="form-group">
						    <input type="tel"  autofocus required class="form-control" name="phoneNumber" placeholder="<?php echo $avis_lang['reg_form_phone']; ?>" autocomplete="off">
						  </div>

						  <div class="form-group profile_pass_input">
						    <input type="password" name="password" required class="form-control" placeholder="<?php echo $avis_lang['login_form_pass'];?>" autocomplete="off">
						    <img src="/wp-content/themes/Avis.help/eye_hide.png">
						  </div>
						  <div class="login-bottom">
							  <div class="row m-0">
								  <div class="col-12">
								  		<button type="submit" class="btn">
								  			<?php echo $avis_lang['reg_form_login_btn']; ?>
								  		</button>
								  </div>
							  </div>
						  </div>
						</form>
					
					</div>
				</div>	
				<div>
					<div class="ms mes-error hidden"><?php echo $avis_lang['reg-error']; ?></div>
					<div class="ms mes-success hidden"><?php echo $avis_lang['reg-success']; ?></div>
				</div>
			</div>
		</div>

		<div class="login-wrapper-mob">
			<a href="/">
				<img src="/wp-content/uploads/2019/02/logo.png">
			</a>
			<h1><?php echo $avis_lang['download_app'];?></h1>
			<div class="download-button">
				<a href="https://itunes.apple.com/app/avis-help/id1455822273" target="_blank"><img src="/wp-content/themes/Avis.help/svg/app-store.svg"></a>
				<a href="https://play.google.com/store/apps/details?id=com.pinus.alexdev.avis" target="_blank"><img src="/wp-content/themes/Avis.help/svg/google-play.svg"></a>
            </div>
		</div>
	</div>
</div>


<?php get_footer('account'); ?> 
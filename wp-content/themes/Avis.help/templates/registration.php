<?php 
/*Template Name: Login Page */
get_header(); 
?>

<?php


?>
<div class="login-page-main-wrapper">
	<div class="nav-item lang">
		<?php pll_the_languages(array('display_names_as'=>'slug','dropdown'=>1)); ?>
	</div>
	<div class="container">
		<div class="login_page_wrapper">
			<div class="">
				<div class="login-logo-holder col-12">
					<a href="/">
						<img src="/wp-content/uploads/2019/02/logo.png">
					</a>
				</div>
				<div class="login_text col-12"><?php echo $avis_lang['login_title'];?></div>
				<div class="login_form_wrapper">
					<!-- <div class="login_form"> -->
						<form id="login-form" autocomplete="off">
						  <div class="form-group">
						    <input type="text"  autofocus data-validation="email" class="form-control" name="email" placeholder="<?php echo $avis_lang['login_form_login']; ?>" autocomplete="off">
						  </div>
						  <div class="form-group profile_pass_input">
						    <input type="password" name="password"  data-validation="password" class="form-control" placeholder="<?php echo $avis_lang['login_form_pass'];?>" autocomplete="off">
						    <img src="/wp-content/themes/Avis.help/img/eye_hide.png">
						  </div>
						  <div class="error-login"></div>
						  <div class="login-bottom">
							  <div class="row m-0">
								  <div class="col-6 p-0 custom-col">
								  	<div class="checkbox-wrapper">
									    <input  type="checkbox" class="form-check-input" name="remamber" id="exampleCheck1">
									    <label class="form-check-label" for="exampleCheck1"><?php echo $avis_lang['login_form_remember'];?></label>
								    </div>
								  </div>
								  <div class="col-6 restore-pass text-right">
								  		<a href="#"><?php echo $avis_lang['login_form_forgot_pass']; ?></a>
								  </div>
							  </div>
							  <div class="col-12 text-center">
								<button type="submit" class="avis_submit"><?php echo $avis_lang['sign_up']; ?></button>
							</div>
						  </div>
						</form>
					<!-- </div> -->
						<div class="text-center login-bold-text"><?php echo $avis_lang['login_form_or']; ?></div>
						<div class="social-media-wrap">
							<a href="#" class="avis_submit fb"><?php echo $avis_lang['sign_up_with']; ?></a>
							<a href="#" class="avis_submit google"><?php echo $avis_lang['sign_up_with']; ?></a>
						</div>
						<div class="text-center login-bold-text"><?php echo $avis_lang['have_acc']; ?></div>
						<div class="text-center sign-link"><a href="#"><?php echo $avis_lang['login_form_login_btn']; ?></a></div>
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




<?php
get_footer();
?>

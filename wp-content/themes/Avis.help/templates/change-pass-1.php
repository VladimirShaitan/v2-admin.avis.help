<?php 
// Template name: Change pass first step
get_header('account');
?>

      <div class="row m-0 full-height">
      	<!-- full-height -->
      	<div class="col-12">
	  		<h1 class="page_header"><?php echo $avis_lang['profile_form_change_pass']; ?></h1>
      	</div>
        <div class="col-12 text-center">
        	<form id="change_pass" class="full-width-form">
            <div class="form-group profile_pass_input">
              <input type="password" name="password" class="form-control" placeholder="<?php echo $avis_lang['profile_form_pass_placeholder'];?>" autocomplete="off">
              <img src="/wp-content/themes/Avis.help/img/eye_hide.png">
            </div>
          </form>
        </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
        	<input type="submit" form="change_pass" name="" value="<?php echo $avis_lang['profile_form_continue']; ?>" class="avis_submit">
        </div>
      </div>

<?php get_footer('account'); ?> 
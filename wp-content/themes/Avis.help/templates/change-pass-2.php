<?php 
// Template name: Change pass second step
get_header('account');
?>

      <div class="row m-0 full-height">
        <!-- full-height -->
        <div class="col-12">
        <h1 class="page_header"><?php echo $avis_lang['profile_form_change_pass']; ?></h1>
        </div>
        <div class="col-12 text-center">
          <form id="change_pass_confirm" class="full-width-form">
            <div class="form-group profile_pass_input">
              <input type="password" name="new_password" class="form-control" placeholder="<?php echo $avis_lang['profile_form_new_pass'];?>" autocomplete="off">
              <img src="/wp-content/themes/Avis.help/img/eye_hide.png">
            </div>
            <div class="form-group profile_pass_input">
              <input type="password" name="new_password_confirm" class="form-control" placeholder="<?php echo $avis_lang['profile_form_new_confirm_pass'];?>" autocomplete="off">
              <img src="/wp-content/themes/Avis.help/img/eye_hide.png">
            </div>
          </form>
        </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
          <input type="submit" form="change_pass_confirm" name="" value="<?php echo $avis_lang['profile_form_save']; ?>" class="avis_submit">
        </div>
      </div>

<?php get_footer('account'); ?> 
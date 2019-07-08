<?php 
/*Template Name: Profile page*/
get_header('account');  
$my_acc = json_decode($avis_helper->get_my_acc());
if(!empty($my_acc->avatarUrl)){
  $logoUrl = $my_acc->avatarUrl;
} else {
  $logoUrl = '/wp-content/uploads/2019/03/img-profile.png';
}

?>
<div class="row m-0">
    <div class="col-8 p-0">
      <div class="row m-0">
        <div class="col-6 p-0">
            <div class="acc-home-wrapper review-page-wrapper promocodes-page-wrapper profile-wrap">
              <form id="edit-profile" class="edit-profile" autocomplete="off" >
                <input type="hidden" name="profile-image-hidden">
                <div class="row edit-top-wrapper">
                  <div class="col-4 p-0">
                     <label>
                        <input type="file" name="profile-image" id="upload_image" multiple="false" accept="image/*">
                        <?php wp_nonce_field( 'profile-image', 'profile-image_nonce' ); ?>
                        <div class="add_photo_profile" style="background-image: url('<?php echo $logoUrl; ?>')"></div>
                    </label>
                  </div>
                  <div class="col-8">
                      <span class="caption"><?php echo $avis_lang['profile_form_caption']; ?></span>
                  </div>
                </div>
                <div class="inputs-wrapper">
                  <input type="email" name="email" value="<?php echo $my_acc->email; ?>" placeholder="<?php echo $avis_lang['profile_form_email_email']; ?>">
                  <div class="profile_pass_input">
                    <input type="password" name="password" placeholder="<?php echo $avis_lang['profile_form_pass_placeholder'];?>">
                    <img src="/wp-content/themes/Avis.help/eye_hide.png">
                  </div>
                  <input type="text" value="<?php echo $my_acc->name; ?>" name="name" placeholder="<?php echo $avis_lang['profile_form_name_placeholder'];?>">
                  <input type="text" name="surname" value="<?php echo $my_acc->surname; ?>" placeholder="<?php echo $avis_lang['profile_form_surname_placeholder'];?>">
                  <input type="phone" name="phoneNumber" value="<?php echo $my_acc->phoneNumber; ?>" placeholder="<?php echo $avis_lang['profile_form_number_placeholder'];?>">
                </div>
                  <div class="create-shortcode-form-bottom">
                      <input type="submit" class="avis_submit" value="<?php echo $avis_lang['save'];?>">
                  </div>
              </form>
              <div class="logout-wrapper text-center">
                <a id="logout" href="/logout/?lang=<?php echo explode('_', get_locale())[0] ?>">
                  <?php echo $avis_lang['profile_form_logout_btn'];?>
                </a>
              </div>
          </div>
        </div>


      </div>
      </div>

  </div>

<?php get_footer('account'); ?> 
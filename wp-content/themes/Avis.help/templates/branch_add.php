<?php 
/*Template Name: Add branch page*/
get_header('account');  

?>
      <div class="row m-0">
        <div class="col-12 p-0 text-center">
          <h1 class="page_header add_branch"><?php echo $avis_lang['your_branch']; ?></h1>
            <div class="profile-wrap">
              <form id="edit-profile" class="edit-profile" autocomplete="off" >
                <input type="hidden" name="profile-image-hidden">
                <div class="edit-top-wrapper">
                     <label>
                        <input type="file" name="profile-image" id="upload_image" multiple="false" accept="image/*">
                        <?php wp_nonce_field( 'profile-image', 'profile-image_nonce' ); ?>
                        <div class="add_photo_profile"></div>
                    </label>
                    <span class="caption"><?php echo $avis_lang['branch_form_caption']; ?></span>
                </div>
                <div class="name-wrapper">
                   <input type="text" name="branch_name" placeholder="<?php echo $avis_lang['name'];?>">
                  <input type="text" name="branch_admin_name" placeholder="<?php echo $avis_lang['contact'];?>">
                </div>
                <div class="inputs-wrapper">
                  <input type="text" name="branch_address" placeholder="<?php echo $avis_lang['address']; ?>">
                </div>
                <div class="tel-wrapper">
                   <input type="phone" name="branch_phone" placeholder="<?php echo $avis_lang['c_phone'];?>">
                </div>
                  <div class="create-shortcode-form-bottom">
                      <input type="submit" class="avis_submit" value="<?php echo $avis_lang['save'];?>">
                  </div>
              </form>
          </div>
        </div>


      </div>

<?php get_footer('account'); ?> 
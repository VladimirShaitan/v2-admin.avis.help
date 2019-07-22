<?php 
/*Template Name: Create company page*/
get_header('account');  

?>
      <div class="row m-0 full-height">
        <div class="col-12 p-0 text-center">
            <div class="profile-wrap company-wrap full-height">
              <form id="edit-company" class="edit-company full-width-form full-height" autocomplete="off" >
                <input type="hidden" name="profile-image-hidden">
                <div>
                  <div class="edit-top-wrapper">
                       <label>
                          <input type="file" name="company-image" id="upload_image" multiple="false" accept="image/*">
                          <?php wp_nonce_field( 'profile-image', 'profile-image_nonce' ); ?>
                          <div class="add_photo_profile"></div>
                      </label>
                      <span class="caption"><?php echo $avis_lang['company_form_caption']; ?></span>
                  </div>
                  <div class="inputs-wrapper">
                    <input type="email" name="email" placeholder="<?php echo $avis_lang['enter_company_came']; ?>">
                  </div>
                </div>
                  <div class="create-shortcode-form-bottom">
                      <input type="submit" class="avis_submit" value="<?php echo $avis_lang['save'];?>">
                  </div>
              </form>
          </div>
        </div>


      </div>

<?php get_footer('account'); ?> 
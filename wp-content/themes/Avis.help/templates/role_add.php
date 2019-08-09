<?php 
// Template name: Add role
get_header('account');
?>

      <div class="row m-0">
      	<!-- full-height -->
      	<div class="col-12">
	  		<h1 class="page_header"><?php echo $avis_lang['new_role']; ?></h1>
      	</div>
        <div class="col-12 text-center">
          <div class="add_role_wrap">
        	<form id="add_role" class="full-width-form">
            <div class="row">
              <div class="col-lg-6">
                <input type="text" name="role_name" id="role_name" placeholder="<?php echo $avis_lang['enter_role_name']; ?>">
              </div>
              <div class="col-lg-6">
                <select>
                  <option><?php echo $avis_lang['select_branch']; ?></option>
                  <option>Branch 1</option>
                  <option>Branch 2</option>
                  <option>Branch 3</option>
                </select>
              </div>
              <div class="offset-lg-1 col-lg-10">
                <p class="select-permissions"><?php echo $avis_lang['select_permissions']; ?>:</p>
                <div class="row permissions-row">
                  <div class="col-4 p-0">
                    <label><input type="checkbox" name="permissions"><div class="check"></div> <?php echo $avis_lang['statistics']; ?></label>
                    <label><input type="checkbox" name="permissions"><div class="check"></div> <?php echo $avis_lang['review']; ?></label>
                    <label><input type="checkbox" name="permissions"><div class="check"></div> <?php echo $avis_lang['company']; ?></label>
                    <label><input type="checkbox" name="permissions"><div class="check"></div> <?php echo $avis_lang['promo_codes']; ?></label> 
                  </div>
                  <div class="col-4 p-0">
                    <label><input type="checkbox" name="permissions"><div class="check"></div> <?php echo $avis_lang['billing']; ?></label>
                    <label><input type="checkbox" name="permissions"><div class="check"></div> <?php echo $avis_lang['chats']; ?></label>
                    <label><input type="checkbox" name="permissions"><div class="check"></div> Scanner</label>
                    <label class="cta_permission">
                      <input type="checkbox" name="permissions">
                      <div class="check"></div> 
                       <p><?php echo $avis_lang['cta']; ?></p>    
                    </label>
                    <div class="cta_role">
                      <form class="full-width-form">
                          <select>
                            <option>Select Call to Action</option>
                            <option>Select Call to Action</option>
                            <option>Select Call to Action</option>
                          </select>
                      </form>
                    </div>
                  </div>
                  <div class="col-4 p-0">
                    <label><input type="checkbox" name="permissions"><div class="check"></div> <?php echo $avis_lang['survey']; ?></label>
                    <label><input type="checkbox" name="permissions"><div class="check"></div> <?php echo $avis_lang['landing']; ?></label>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
        	<input type="submit" form="add_role" name="" value="<?php echo $avis_lang['save']; ?>" class="avis_submit">
        </div>
      </div>

<?php get_footer('account'); ?> 
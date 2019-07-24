<?php 
// Template name: Edit role
get_header('account');
?>

      <div class="row m-0">
      	<!-- full-height -->
      	<div class="col-12">
	  		<h1 class="page_header"><?php echo $avis_lang['edit_role']; ?></h1>
      	</div>
        <div class="col-12 text-center">
          <div class="add_role_wrap">
        	<form id="add_role" class="full-width-form">
             <input type="text" name="role_name" id="role_name" placeholder="<?php echo $avis_lang['enter_role_name']; ?>">
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
                <label><input type="checkbox" name="permissions"><div class="check"></div> <?php echo $avis_lang['cta']; ?></label> 
               </div>
               <div class="col-4 p-0">
                <label><input type="checkbox" name="permissions"><div class="check"></div> <?php echo $avis_lang['survey']; ?></label>
                <label><input type="checkbox" name="permissions"><div class="check"></div> <?php echo $avis_lang['landing']; ?></label>
               </div>
             </div>
            </form>
            </div>
        </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
        	<input type="submit" form="add_role" name="" value="<?php echo $avis_lang['update']; ?>" class="avis_submit">
        </div>
      </div>

<?php get_footer('account'); ?> 
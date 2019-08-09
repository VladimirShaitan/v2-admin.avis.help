<?php 
// Template name: Add member
get_header('account');
?>

      <div class="row m-0">
      	<!-- full-height -->
      	<div class="col-12">
	  		<h1 class="page_header"><?php echo $avis_lang['new_member']; ?></h1>
      	</div>
        <div class="col-6 text-center">
          <div class="add_member_wrap">
        	<form id="add_member" class="full-width-form">
             <input type="email" name="member_email" id="member_email" placeholder="<?php echo $avis_lang['member_email']; ?>">
             <input type="text" name="member_name" id="member_name" placeholder="<?php echo $avis_lang['member_name']; ?>">
             
             <select>
              <option><?php echo $avis_lang['select_role']; ?></option>
              <option>Create Role 1</option>
              <option>Admin</option>
              <option>Manager</option>
              <option>Waitress</option>
            </select>

            <select >
              <option><?php echo $avis_lang['select_branch']; ?> </option>
              <option disabled>Branch 1</option>
              <option disabled>Branch 2</option>
              <option disabled>Branch 3</option>
            </select> 
          </form>
           </div>
           </div>
             <div class="col-6 text-center">
             <p class="role-permissions"><?php echo $avis_lang['permissions']; ?>:</p>
             <div class="row permissions-member-row">
              <div class="col-4">
                <div class="permissions-item"><div class="auth_circle"><i class="fas fa-check"></i></div> <?php echo $avis_lang['statistics']; ?></div>
                <div class="permissions-item"><div class="auth_circle"><i class="fas fa-check"></i></div> <?php echo $avis_lang['review']; ?></div>
                <div class="permissions-item"><div class="auth_circle"><i class="fas fa-check"></i></div> <?php echo $avis_lang['company']; ?></div>
                
               </div>
               <div class="col-4">
                <div class="permissions-item"><div class="auth_circle"><i class="fas fa-check"></i></div> <?php echo $avis_lang['promo_codes']; ?></div> 
                <div class="permissions-item"><div class="auth_circle"><i class="fas fa-check"></i></div> <?php echo $avis_lang['billing']; ?></div>
                <div class="permissions-item"><div class="auth_circle"><i class="fas fa-check"></i></div> <?php echo $avis_lang['chats']; ?></div>
                <!-- <div class="permissions-item"><div class="auth_circle"><i class="fas fa-check"></i></div> <?php echo $avis_lang['cta']; ?></div> -->
               </div>
               <div class="col-4">
                 <div class="permissions-item"><div class="auth_circle"><i class="fas fa-check"></i></div> Scanner</div>
                <!-- <div class="permissions-item"><div class="auth_circle"><i class="fas fa-check"></i></div> <?php echo $avis_lang['survey']; ?></div>
                <div class="permissions-item"><div class="auth_circle"><i class="fas fa-check"></i></div> <?php echo $avis_lang['landing']; ?></div> -->
               </div>
             </div>
            
            </div>
        </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
        	<input type="submit" form="add_member" name="" value="<?php echo $avis_lang['save']; ?>" class="avis_submit">
        </div>
     

<?php get_footer('account'); ?> 
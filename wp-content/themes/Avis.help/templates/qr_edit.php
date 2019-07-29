<?php 
// Template name: QR edit
get_header('account');
?>

      <div class="row m-0 add_member_wrap">
      	<!-- full-height -->
      	<div class="col-12">
	  		<h1 class="page_header"><?php echo $avis_lang['edit_qr']; ?></h1>
      	</div>
        <div class="col-6 text-center">
        	<form id="edit_qr" class="full-width-form">
            <input type="text" name="qr_type" id="qr_type" placeholder="<?php echo $avis_lang['qrtype']; ?>" value="Opinion" readonly class="not-edit">
            <input type="text" name="qr_category" id="qr_category" placeholder="<?php echo $avis_lang['qr_type']; ?>" value="General" readonly class="not-edit">
            <input type="text" name="qr_name" id="qr_name" placeholder="<?php echo $avis_lang['qr_name']; ?>" value="QR 1">
            <textarea rows="5" placeholder="<?php echo $avis_lang['add_qr_question']; ?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
eiusmod tempor incididunt ut labore et dolore magna aliqua. 
Ut enim ad minim veniam, quis nostrud exercitation ullamco 
laboris nisi ut aliquip ex ea commodo consequat?</textarea>
          </form>
          </div>
             <div class="col-6 text-center full-width-form">
             <select form="edit_qr">
                <option><?php echo $avis_lang['branches_ov']; ?></option>
                <option>Branch 1</option>
                <option>Branch 2</option>
                <option>Branch 3</option>
              </select>
            </div>
          </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
          <div class="btns-wrap">
            <input type="submit" form="edit_qr" name="" value="<?php echo $avis_lang['update']; ?>" class="avis_submit">
          	<a href="" class="avis_submit"><?php echo $avis_lang['delete']; ?></a>
          </div>
        </div>
     

<?php get_footer('account'); ?> 
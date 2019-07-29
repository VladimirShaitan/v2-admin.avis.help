<?php 
// Template name: QR CTA
get_header('account');
?>

      <div class="row m-0 add_member_wrap">
      	<!-- full-height -->
      	<div class="col-12">
	  		<h1 class="page_header"><?php echo $avis_lang['call_to_action']; ?> QR</h1>
      	</div>
        <div class="col-6 text-center">
          <form id="add_opinion" class="full-width-form">
             <input type="text" name="qr_name" id="qr_name" placeholder="<?php echo $avis_lang['add_qr_name']; ?>">
             <textarea rows="5" placeholder="<?php echo $avis_lang['add_qr_question']; ?>"></textarea>
             <select>
              <option><?php echo $avis_lang['add_select_qr_answers']; ?></option>
              <option class="red-option"><?php echo $avis_lang['add_qr_answers']; ?> +</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </form>
          </div>
             <div class="col-6 text-center full-width-form">
             <select form="add_opinion">
                <option><?php echo $avis_lang['branches_ov']; ?></option>
                <option>Branch 1</option>
                <option>Branch 2</option>
                <option>Branch 3</option>
              </select>
            </div>
          </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
          <input type="submit" form="add_opinion" name="" value="<?php echo $avis_lang['save']; ?>" class="avis_submit">
        </div>
     

<?php get_footer('account'); ?> 
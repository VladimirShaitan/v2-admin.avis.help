<?php 
// Template name: QR opinion
get_header('account');
?>

      <div class="row m-0 add_member_wrap">
      	<!-- full-height -->
      	<div class="col-12">
	  		<h1 class="page_header"><?php echo $avis_lang['opinion']; ?> QR</h1>
      	</div>
        <div class="col-6 text-center">
        	<form id="add_opinion" class="full-width-form">
            <select>
              <option><?php echo $avis_lang['add_qr_cat']; ?></option> 
              <option class="red-option"><?php echo $avis_lang['add_qr_category']; ?> +</option>
              <option>Category 1</option>
              <option>General</option>
              <option>Service</option>
              <option>Cleanliness</option>
            </select>
            <input type="text" name="qr_name" id="qr_name" placeholder="<?php echo $avis_lang['add_qr_name']; ?>">
            <select form="add_opinion">
              <option><?php echo $avis_lang['branches_ov']; ?></option>
              <option>Branch #1</option>
              <option>Branch #2</option>
              <option>Branch #3</option>
            </select>
          </form>
          </div>
             <div class="col-6">
               <div class="title_lang_block">
                 <h2>Select translations:</h2>
               </div>
               <div class="lang_block">
                 <span><a href="#">EN</a></span>
                 <span><a href="#">FR</a></span>
                 <span><a href="#">UA</a></span>
                 <span><a href="#" class="active-link">RU</a></span>
               </div>
               <form id="add_opinion_last" class="full-width-form">
                  <textarea rows="5" placeholder="<?php echo $avis_lang['add_qr_question']; ?>"></textarea>
                  <textarea rows="3" placeholder="<?php echo $avis_lang['add_qr_success_message']; ?>"></textarea>
               </form>
            </div>
          </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
        	<input type="submit" form="add_opinion" name="" value="<?php echo $avis_lang['save']; ?>" class="avis_submit">
        </div>
     

<?php get_footer('account'); ?> 
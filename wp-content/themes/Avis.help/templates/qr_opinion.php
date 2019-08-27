<?php 
// Template name: QR opinion
get_header('account');
// global $avis_helper;

$op_cats = $avis_helper->request(
  $avis_helper->api_path->organization->base .
  $avis_helper->avis_creds->organizationId .
  $avis_helper->api_path->organization->bundle->base .
  $avis_helper->api_path->organization->bundle->opinion_cat->base,  
  true
);

$branches = $avis_helper->request(
  $avis_helper->api_path->organization->base .
  $avis_helper->avis_creds->organizationId .
  $avis_helper->api_path->organization->branch->base,
  true
);

?>

<!-- <pre>
  <?php // print_r($op_cats); ?>
</pre> -->

      <div class="row m-0 add_member_wrap">
      	<!-- full-height -->
      	<div class="col-12">
	  		<h1 class="page_header"><?php echo $avis_lang['opinion']; ?> QR</h1>
      	</div>
        <div class="col-6 text-center">
        	<form id="add_opinion" class="full-width-form">

            <div id="op_cats" class="opinion_cats_wrapper">
              <div id="selected_value" class="current">Add or select QR category</div>
              <ul class="list-unstyled op_cat_list">
                <li class="list-loader hidden">
                  <div class="fake_disable">
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                  </div>
                </li>
                <li class="add_qr_cat">Add QR category +</li>
                <li class="create_op_cat hidden">
                  <input type="text" name="create_cat" placeholder="Enter QR Category name">
                  <span class="create_cat_submit">Save</span>
                </li>
                <?php foreach ($op_cats as $cat) { ?>
                  <li data-autoclose="true"  data-value="<?php echo $cat; ?>" class="option">
                    <input class="name" data-old-value="<?php echo $cat; ?>" value="<?php echo $cat; ?>">
                    <div class="icons_holder">
                      <div class="before_edit">
                        <span class="func_btn edit_op_cat">
                          <img src="/wp-content/uploads/2019/08/olivets.png">
                        </span>
                        <span class="func_btn remove_op_cat">
                          <img src="/wp-content/uploads/2019/08/urna.png">
                        </span>
                      </div>
                      <div class="while_edit hidden">
                        <span class="save_edited">Save</span>
                      </div>
                        
                    </div>    
                  </li>
                <?php } ?>
              </ul>
            </div>
            
            <input type="text" name="qr_name" id="qr_name" placeholder="<?php echo $avis_lang['add_qr_name']; ?>">
            <select form="add_opinion">
              <option><?php echo $avis_lang['branches_ov']; ?></option>
              <?php foreach ($branches as $branch) { ?>
                  <option value="<?php echo $branch->id; ?>"><?php echo $branch->name; ?></option>
              <?php } ?>
            </select>
          </form>
          </div>
             <div id="op_lang_block" class="col-6">
               <div class="title_lang_block">
                 <h2>Select translations:</h2>
               </div>
               <div class="lang_block">
                 <span >
                  <a data-block="en" href="#">EN</a>
                 </span>
                 <span>
                  <a data-block="fr" href="#">FR</a>
                </span>
                 <span>
                  <a data-block="ua" href="#">UA</a>
                </span>
                 <span>
                  <a data-block="ru" href="#" class="active-link">RU</a>
                </span>
               </div>
               <div data-inp-block="en" class="full-width-form">
                  <textarea rows="5" placeholder="<?php echo $avis_lang['add_qr_question']; ?>"></textarea>
                  <textarea rows="3" placeholder="<?php echo $avis_lang['add_qr_success_message']; ?>"></textarea>
               </div>
                <div data-inp-block="fr" class="full-width-form hidden">
                  <textarea rows="5" placeholder="<?php echo $avis_lang['add_qr_question']; ?>"></textarea>
                  <textarea rows="3" placeholder="<?php echo $avis_lang['add_qr_success_message']; ?>"></textarea>
               </div>
              <div data-inp-block="ru" class="full-width-form hidden">
                  <textarea rows="5" placeholder="<?php echo $avis_lang['add_qr_question']; ?>"></textarea>
                  <textarea rows="3" placeholder="<?php echo $avis_lang['add_qr_success_message']; ?>"></textarea>
               </div>
               <div data-inp-block="ua" class="full-width-form hidden">
                  <textarea rows="5" placeholder="<?php echo $avis_lang['add_qr_question']; ?>"></textarea>
                  <textarea rows="3" placeholder="<?php echo $avis_lang['add_qr_success_message']; ?>"></textarea>
               </div>
            </div>
          </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
        	<input type="submit" form="add_opinion" name="" value="<?php echo $avis_lang['save']; ?>" class="avis_submit">
        </div>
     

<?php get_footer('account'); ?> 
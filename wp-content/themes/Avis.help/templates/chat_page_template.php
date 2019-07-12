<?php 
/*Template Name: Chat page*/
  get_header('account');  
  $rev_coockie = json_decode(base64_decode($_COOKIE['rev_cookie']));

  $rev_id = $rev_coockie->rev_id;
  $review = $avis_helper->get_single_review($rev_id);
  $promocodes = $avis_helper->get_user_promocodes();
  $chat_history = $avis_helper->getChatHistoryWeb($rev_id);

  if(!empty($review->phone)){
    $rev_link = get_home_url().'/rev_handler/?p_id=96&rev_id='.$rev_id.'&lang='.explode('_', get_locale())[0];
  } else {
    $rev_link = get_home_url().'/rev_handler/?p_id=90&rev_id='.$rev_id.'&lang='.explode('_', get_locale())[0];
  }

   $avis_helper->set_rev_viewed($review->id);
?>
<!-- <pre>
  <?php // print_r($review);?>
</pre> -->
<script>
  const topic = '<?php echo $chat_history->topic; ?>';
  const rev_id = '<?php echo $rev_coockie->rev_id; ?>';
  const branch_name = '<?php echo $review->branch; ?> ';
  const is_chat = '<?php echo $review->isChat; ?>';
  const rev_lang = '<?php echo $review->lang; ?>';
</script>


  <div id="chat_eneable" class="row m-0">
    <div class="col-12 p-0">
	      <div class="row m-0">
	        <div class="acc-home-wrapper fw_page_wrp chat-wrp">
            <div id="chat" class="chat-wrapper">
            	<div class="chat-header">
            		<h4><?php echo $avis_lang['rew_number'];?> <?php echo $rev_id; ?></h4>
            		<a href="<?php echo $rev_link; ?>" target="_blank" class="avis_submit"><?php echo $avis_lang['go_to_review'];?></a>
            	</div>
              <div class="chat-body">
              <?php foreach ($chat_history->conversations as $mes) { ?>
              	   <div class="message-wrapper <?php if($chat_history->topic === $mes->messageSender){echo 'to'; } else {echo 'from';}; ?>">
                      <div class="message"><?php echo $mes->message; ?></div>
                    </div>
               <?php } ?>   
                <span class="end"></span> 
               </div>
              <div class="chat-controlers">
                <div id="promo_codes" class="promo-code-wrapper">
                  <div class="prms-wrapper">
                  <?php foreach ($promocodes as $promocode) { ?>
                    <div class="prm-wrapper" data-promo-id="<?php echo $promocode->id; ?>" data-promo-name="<?php echo $promocode->name; ?>" data-promo-icon="<?php echo $promocode->iconCode; ?>">
                      <div class="promo-code">
                        <i data-icon-name="<?php echo $promocode->iconCode; ?>" class="fas fa-<?php echo $promocode->iconCode; ?>"></i>
                      </div>
                      <span><?php echo $promocode->name; ?></span>
                    </div>
                  <?php } ?> 
                  </div>
<!--                   <div class="chat-wrap">
                    <div class="chat-wrapper" data-chat-url="<?php // echo $review->chatUrl; ?>">
                      <div class="promo-code">
                        <i class="far fa-comments"></i>
                      </div>
                      <span><?php // echo $avis_lang['invite_to_chat'];?></span>
                    </div>
                  </div> 
 -->
                </div>
                <div class="chat-input">
                      <form id="send_message">
                        <div class="closed add-promo-code">
                          <div class="horizontal"></div>
                          <div class="vertical"></div>
                        </div>                    
                        <input type="text" name="" placeholder="<?php echo $avis_lang['write_message'];?>">
                        <input type="submit" name="" value="">
                      </form>
                    </div>
                </div>
              </div>
	          </div>
	      </div>
    </div>
  </div>


<?php get_footer('account'); ?> 
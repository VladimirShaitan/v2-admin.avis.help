<?php 
/*Template Name: Review page*/

  get_header('account');
  $rev_coockie = json_decode(base64_decode($_COOKIE['rev_cookie']));

/*  $review_data = $avis_helper->get_single_review($rev_coockie->rev_id);
  $chat_history = $avis_helper->getChatHistoryWeb($rev_coockie->rev_id);
  $promocodes = $avis_helper->get_user_promocodes();
  $viewed = $avis_helper->set_rev_viewed($rev_coockie->rev_id);
  $anon_rev_arr = array(90,154,224);*/

  if(!empty($review_data->imageUrl)){
    $img = $review_data->imageUrl;
  } else {
    $img = '';
  }

?>

<script>
  const topic = '<?php echo $chat_history->topic; ?>';
  const rev_id = '<?php echo $rev_coockie->rev_id; ?>';
  const branch_name = '<?php echo $review_data->branch; ?> ';
  const is_chat = '<?php echo $review_data->isChat; ?>';
  const rev_lang = '<?php echo $review_data->lang; ?>';
</script>

<!-- <pre> -->
	<?php //print_r($review_data);?>
<!-- </pre> -->
  <div class="row m-0">
    <?php  
if(!in_array($post->ID, $anon_rev_arr)){ ?>
    <div class="col-9 rew-wrap">
      <?php } else { ?>
      <div class="col-12 rew-wrap">
      <?php } ?>
    	<div class="row m-0">
    		<div class="col-12 p-0">
    			<div class="rev-row time-row">
    				<div><?php echo $avis_lang['created_at']; ?>: <?php echo gmdate('d/m/y H:i', $review_data->dateCreated / 1000);?></div>
    				<div><?php echo $avis_lang['viewed_at']; ?>: <?php if(!empty($review_data->dateViewed)) { echo gmdate('d/m/y H:i',$review_data->dateViewed / 1000); } ;?></div>
    			</div>
    			<div class="rev-row">
    				<div><?php echo $avis_lang['branch'];?>:</div>
    				<div><?php echo $review_data->branch ;?></div>
    			</div>
    			<div class="rev-row">
    				<div><?php echo $avis_lang['qr_type'];?>:</div>
    				<div><?php echo $review_data->qrType ;?></div>
    			</div>
    			<div class="rev-row">
    				<div><?php echo $avis_lang['qr_name'];?>:</div>
    				<div></div>
    			</div>
    			<div class="rev-row">
    				<div><?php echo $avis_lang['general_impression'];?>:</div>
    				<div><?php echo $review_data->impression ;?></div>
    			</div>
    			<div class="rev-row">
    				<div><?php echo $avis_lang['telephone'];?>:</div>
    				<div><a href="tel:<?php echo $review_data->phone;?>"><?php echo $review_data->phone ;?></a></div>
    			</div>
    			<div class="rev-row">
    				<div><?php echo $avis_lang['comment'];?>:</div>
    				<div><?php echo $review_data->message;?></div>
    			</div>
    			<div class="rev-row">
    				<div><?php echo $avis_lang['photo'];?>:</div>
    				<div>
    					<a class="venobox" href="<?php echo $img; ?>">
    					<img src="<?php echo $img; ?>">
    					</a>
    				</div>
    			</div>
    			<div class="comment-wrap">
    				<div class="subtitle"><?php echo $avis_lang['comment_text'];?></div>
    				<form id="add_coment">
		                <div class="add-coment form-group">
		                    <textarea name="comment" class="form-control" placeholder="<?php echo $avis_lang['add_comment_text'];?>"><?php echo $review_data->comment; ?></textarea>
		                      <input type="submit" class="avis_submit submit_coment" value="<?php echo $avis_lang['save'];?>">
		                </div>
		            </form>
    			</div>
    		</div>
    	</div>
     </div>
<?php  
if(!in_array($post->ID, $anon_rev_arr)){ ?>
      <div class="col-3 p-0">
        <div class="row m-0 full-height">
          <div class="col-12 p-0 rev-chat-wrap">
            <div class="load_chat">
              <input type="submit" data-chat-url="<?php echo $review_data->chatUrl; ?>" class="avis_submit load_chat_btn" id="load_chat_trigger" value="<?php echo $avis_lang['go_to_conversation'];?>">
            </div>
            <div id="chat" class="chat-wrapper" style="display: none">
            	<h4 class="subtitle"><?php echo $avis_lang['conversation'];?></h4>
            	<div>
              <div class="chat-body">
                
               <?php foreach ($chat_history->conversations as $mes) { ?>
                   <div class="message-wrapper <?php if($chat_history->topic === $mes->messageSender){echo 'to'; } else {echo 'from';}; ?>">
                      <div class="message"><?php echo $mes->message; ?></div>
                    </div>
               <?php } ?>  
  <span class="end"></span>
               </div>
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
                  <!-- invite to chat in promocode block -->
                  
<!--                   <div class="chat-wrap">
                    <div class="chat-wrapper" data-chat-url="<?php // echo $review_data->chatUrl; ?>">
                      <div class="promo-code">
                      <i class="far fa-comments"></i>
                    </div>
                    <span><?php // echo $avis_lang['invite_to_chat'];?></span>
                    </div>
                  </div>  -->

                </div>
                
                <div class="chat-input">
                      <form id="send_message">
                        <div class="closed add-promo-code"></div>                    
                        <input type="text" name="" placeholder="<?php echo $avis_lang['write_message'];?>">
                        <input type="submit" name="" value="">
                      </form>
                    </div>
                </div>
              </div>
        </div>
        </div> 
      </div>
<?php  } ?>

  </div>

<?php get_footer('account'); ?> 
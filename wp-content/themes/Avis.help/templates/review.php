<?php 
/*Template Name: Review page*/

  get_header('account');
  $rev_coockie = json_decode(base64_decode($_COOKIE['rev_cookie']));

  $review_data = $avis_helper->get_single_review($rev_coockie->rev_id);
  $chat_history = $avis_helper->getChatHistoryWeb($rev_coockie->rev_id);
  $promocodes = $avis_helper->get_user_promocodes();
  $viewed = $avis_helper->set_rev_viewed($rev_coockie->rev_id);

  if(!empty($review_data->imageUrl)){
    $img = $review_data->imageUrl;
  } else {
    $img = '/wp-content/uploads/2019/02/img_placehilder.png';
  }

?>

<script>
  const topic = '<?php echo $chat_history->topic; ?>';
  const rev_id = '<?php echo $rev_coockie->rev_id; ?>';
  const branch_name = '<?php echo $review_data->branch; ?> ';
  const is_chat = '<?php echo $review_data->isChat; ?>';
  const rev_lang = '<?php echo $review_data->lang; ?>';
</script>


  <div class="row m-0">
    <div class="col-8 p-0">
      <div class="row m-0">
        <div class="col-6 p-0">
            <div class="acc-home-wrapper review-page-wrapper">
              <h4><?php echo $avis_lang['review'];?> № <?php echo $review_data->id ;?></h4>
              <table class="table table-borderless">
                <tr>
                  <td><?php echo $avis_lang['review'];?></td>
                  <td>
                    <?php echo gmdate('d.m.Y H:i', $review_data->dateCreated / 1000);?>
                  </td>
                </tr>
                <tr>
                  <td><?php echo $avis_lang['viewed_at']; ?></td>
                  <td><?php if(!empty($review_data->dateViewed)) { echo gmdate('d.m.Y H:i',$review_data->dateViewed / 1000); } ;?></td>
                </tr>
              </table>
              <div class="separator"></div>
             <table class="table table-borderless">
                <tr>
                  <td><?php echo $avis_lang['branch'];?>:</td>
                  <td><?php echo $review_data->branch ;?></td>
                </tr>
                <tr>
                  <td><?php echo  $avis_lang['qr_type'];?>:</td>
                  <td><?php echo $review_data->qrType ;?></td>
                </tr>
                <tr>
                  <td><?php echo $avis_lang['general_impression'];?>:</td>
                  <td><?php echo $review_data->impression ;?></td>
                </tr>
                 <tr>
                  <td><?php echo $avis_lang['telephone']; ?>:</td>
                  <td><a href="tel:<?php echo $review_data->phone;?>"><?php echo $review_data->phone ;?></a></td>
                </tr>
              </table>
          </div>
        </div>

        <div class="col-6 p-0">
            <div class="acc-home-wrapper review-page-wrapper comment-wrapper">
              <h4><?php echo $avis_lang['comment'];?></h4>
              <div class="comment-text">
                <?php echo $review_data->message;?>
              </div>
          </div>
        </div>

        <div class="col-6 p-0">
            <div class="acc-home-wrapper review-page-wrapper add-coment-wrapper">
              <h4><?php echo $avis_lang['execution_status']; ?></h4>
              <form id="execution_status">
                <div class="fake_btns">
                  <label class="trig_submit">
                    <input type="radio" value="NEW" <?php if ($review_data->executionStatus === 'NEW') { echo 'checked'; }?> name="executionStatus">
                    <span class="caption"><?php echo $avis_lang['new']; ?></span>
                  </label>
                  <label class="trig_submit">
                    <input type="radio" value="IN_PROGRESS" <?php if ($review_data->executionStatus === 'IN_PROGRESS') { echo 'checked'; }?> name="executionStatus">
                    <span class="caption"><?php echo $avis_lang['in_progress'];?></span>
                  </label>
                  <label class="trig_submit">
                    <input type="radio" value="CLOSED" <?php if ($review_data->executionStatus === 'CLOSED') { echo 'checked'; }?> name="executionStatus">
                    <span class="caption"><?php echo $avis_lang['closed'];?></span>
                  </label>
                </div>
              </form>

              <form id="add_coment">
                <div class="add-coment form-group">
                    <textarea name="comment" class="form-control" placeholder="<?php echo $avis_lang['comment_text'];?>"><?php echo $review_data->comment; ?></textarea>
                    <span class="caption"><p>by <?php echo $review_data->commentBy; ?></p><p><?php echo $review_data->commentDate; ?></p></span>
                      <input type="submit" class="avis_submit submit_coment" value="<?php echo $avis_lang['save'];?>">
                </div>
              </form>
          </div>
        </div>

        <div class="col-6 p-0">
            <div class="acc-home-wrapper review-page-wrapper photo-wrapper">
              <h4><?php echo $avis_lang['photo'];?></h4>
              <a class="venobox" href="<?php echo $img; ?>">
                <img src="<?php echo $img; ?>" alt="<?php echo $review_data->message;?>" title="<?php echo $review_data->message;?>">
              </a>
          </div>
        </div>


      </div>
      </div>
<?php  
$anon_rev_arr = array(90,154,224);
if(!in_array($post->ID, $anon_rev_arr)){ ?>
      <div class="col-4 p-0">
        <div class="row m-0">
          <div class="col-12 p-0">
            <div class="load_chat">
              <input type="submit" data-chat-url="<?php echo $review_data->chatUrl; ?>" class="avis_submit load_chat_btn" id="load_chat_trigger" value="<?php echo $avis_lang['go_to_conversation'];?>">
            </div>
            <div id="chat" class="acc-home-wrapper review-page-wrapper chat-wrapper" style="display: none">
              <div class="chat-body">
                <h4><?php echo $avis_lang['conversation'];?></h4>
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
<?php  } ?>

  </div>

<?php get_footer('account'); ?> 
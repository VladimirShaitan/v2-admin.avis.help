<?php 
/*Template Name: Promocode page*/
// print_r($post->ID); 
get_header('account');
 $icons = json_decode(file_get_contents(get_stylesheet_directory().'/css/icons.json')); 
 $promocodes = array_reverse($avis_helper->get_user_promocodes());
?>  
<script type="text/javascript">
  let promocodes_cuont = <?php echo count($promocodes); ?>
</script>
<!-- <pre>
  <?php  // print_r($promocodes); ?>  
</pre> -->
  <div class="row m-0">
    <div class="col-12 p-0">
      <div class="row m-0">
        

        <div class="col-4 p-0">
            <div class="acc-home-wrapper review-page-wrapper  promocodes-page-wrapper">
              <h4><?php echo $avis_lang['new_promocode'];?></h4>
              <form id="create-shortcode" class="create-shortcode">
                  <ul class="list-unstyled promocode-items">
                    <li><input type="text" name="name" placeholder="<?php echo $avis_lang['create_name'];?>" required></li>
                    <li>
                      <input type="text" name="description" placeholder="<?php echo $avis_lang['desc_max'];?>" required></li>
                    <li class="number"><?php echo $avis_lang['valid_for'];?> <input type="number" class="form-control" value="30" min="1" name="lifeTime"> <?php echo $avis_lang['days'];?></li>                            
                  </ul>
                  <h5><?php echo $avis_lang['add_icon'];?></h5>
                  <div class="icons_wrapper">
                    <ul class="list-unstyled clearfix text-center">
                      <?php foreach ($icons as $icon) { ?>
                      <li>
                        <label>
                          <input <?php if($icon === 'hand-middle-finger') {echo 'checked';}?> type="radio" value="<?php echo $icon; ?>" name="icon">
                          <span class="caption">
                            <i data-icon-name="<?php echo $icon; ?>" class="fas fa-<?php echo $icon; ?>"></i>
                          </span>
                        </label>
                      </li>
                      <?php } ?>                                                                                   
                    </ul>
                  </div>
                  <div class="create-shortcode-form-bottom">
                      <input type="submit" class="avis_submit" value="<?php echo $avis_lang['profile_form_save'];?>">
                  </div>
              </form>
          </div>
        </div>


        <div class="col-4 p-0">
            <div class="acc-home-wrapper review-page-wrapper promocodes-page-wrapper">
              <h4><?php echo $avis_lang['your_promo_codes']; ?> (<span class="promocodes-count"><?php echo count($promocodes); ?></span>)</h4>
               <ul id="promocode-items" class="list-unstyled promocode-items all-promocodes">
                <?php foreach ( $promocodes as $promocode){ ?>
                  <li class="promocode-item">
                    <div class="promo-prview-wrapper">
                      <div>
                        <i class="fas fa-<?php echo $promocode->iconCode; ?>"></i>
                        <span class="promocode-name"><?php echo $promocode->name; ?></span>
                      </div>
                      <span class="promocode-open"><i class="fas fa-chevron-down"></i></span>
                   </div>
                   <div class="promocode-more">
                      <div class="description_promocode"><?php echo $promocode->description; ?></div>
                      <div class="date_promocode"><?php echo $avis_lang['valid_for']; ?> <?php echo $promocode->lifeTime; ?> <?php echo $avis_lang['days']; ?></div>
                      <div data-promocode-id="<?php echo $promocode->id; ?>" class="del_promocode avis_submit"><?php echo $avis_lang['delete']; ?></div>
                   </div>
                  </li>
                <?php } ?>                                
                </ul>
                <div class="promocodes_warning text-danger hidden"><?php echo $avis_lang['maximum_of_promocodes'];?></div>
          </div>
        </div>

        <div class="col-4 p-0">
            <div class="acc-home-wrapper review-page-wrapper promocodes-page-wrapper">
              <form id="send_promocode_number"> 
                <div class="fake_disable hidden"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>
              <h4><?php echo $avis_lang['send_your_promo_codes']; ?></h4>
              
                <div class="list-unstyled promocode-items all-promocodes">
                 <div class="promo-prview-wrapper promocode-item promocode-item-select">
                      <div>
                        <span class="promocode-name"><?php echo $avis_lang['select_your_promo_codes']; ?></span>
                      </div>
                      <span class="promocode-open"><i class="fas fa-chevron-down"></i></span>
                   </div>

                   <ul class="list-unstyled promocode-items all-promocodes procomode-select promocode-more">
                    <?php foreach ( $promocodes as $promocode){ ?>
                  <li class="promocode-item">
                    <input type="radio" <?php if($promocode === $promocodes[0]){echo 'checked';}?> id="promocode-<?php echo $promocode->id; ?>" value="<?php echo $promocode->id; ?>" name="promocode_id">
                    <label for="promocode-<?php echo $promocode->id; ?>">
                    <div class="promo-prview-wrapper">
                      <div>
                        <i class="fas fa-<?php echo $promocode->iconCode; ?>"></i>
                        <span class="promocode-name"><?php echo $promocode->name; ?></span>
                      </div>
                   </div>
                   </label>
                 </li>
                  <?php } ?> 
                </ul>
               </div>
                  
                   <div class="promocode-item create-shortcode">
                    <div class="promo-prview-wrapper send-promocode">
                      <input pattern="[\+][0-9]+" type="tel" name="recipient" placeholder="<?php echo $avis_lang['enter_phone']; ?>" required="">
                      </div>
                      <div class="create-shortcode-form-bottom">
                         <input type="submit" class="avis_submit" value="<?php echo $avis_lang['send']; ?>">
                      </div>
                      <div class="hidden send_promo_message"></div>
                    </div>
                  
                    </form>
              
          </div>
        </div>




      </div>
      </div>

  </div>
<?php get_footer('account'); ?> 
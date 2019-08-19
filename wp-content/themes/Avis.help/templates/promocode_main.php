<?php 
/*
  Template Name: Promocode Main
*/
get_header('account');
 $icons = json_decode(file_get_contents(get_stylesheet_directory().'/css/icons.json')); 
 $promocodes = $avis_helper->request(
    $avis_helper->api_path->organization->base .
    $avis_helper->avis_creds->organizationId .
    $avis_helper->api_path->organization->promo->base,
    true
 )
 // $send_promo_url = get_cur_loc_url(277);
?>  
<!-- <pre>
  <?php // print_r($promocodes); ?>
</pre> -->
<script type="text/javascript">
  let promocodes_cuont = <?php echo count($promocodes); ?>
</script>
      <div class="row m-0 full-height">
        <div class="col-3 p-0">
          <div class="subtitle"><?php echo $avis_lang['apply_promo']; ?></div>
          <div class="promo-id-wrap text-center">
            <div class="promo-id-title"><?php echo $avis_lang['enter_promo_id']; ?></div>
            <form class="apply-promocode">
              <span></span>
              <input type="text" name="" maxlength="1" placeholder="—">
              <input type="text" name="" maxlength="1" placeholder="—">
              <input type="text" name="" maxlength="1" placeholder="—">
              <input type="text" name="" maxlength="1" placeholder="—">
              <input class="last_apply_inp" type="text" maxlength="1" name="" placeholder="—">
              <span></span>
            </form>
            <input type="text" class="hidden fake-apply">
            <input type="submit" name="promo-id" value="<?php echo $avis_lang['apply']; ?>" class="avis_submit">
          </div>
        </div>
        <div class="col-9 full-height promocode-table">
          <a class="avis_submit_wrapper" href="<?php echo get_cur_loc_url(253); ?>">
            <div class="avis_submit invite_chat_btn"><?php echo $avis_lang['add_promo']; ?> +</div>
          </a>

            <table id="promocodes-table" class="table table-hover">
                <thead>
                  <tr>
                    <th></th>
                    <th><?php echo $avis_lang['name_promo']; ?></th>
                    <th><?php echo $avis_lang['valid_for']; ?></th> 
                    <th></th>
                    <th></th>
                  </tr>
                </thead>  
                <tbody>
                  <?php foreach ($promocodes as $promocode) { ?>
                    <tr class="row-<?php echo $promocode->id; ?>">
                      <td>
                        <div class="table-icon-wrapper text-center">
                          <i class="fas fa-<?php echo $promocode->iconId; ?>"></i>
                        </div>
                      </td>
                      <td><?php echo $promocode->name; ?></td>
                      <td><?php echo $promocode->lifeTime; ?></td> 
                      <td class="text-right">
                        <span class="delete_promo" data-promo-id="<?php echo $promocode->id; ?>">
                          <i class="fas fa-trash"></i>
                        </span>
                      </td>
                      <td>
                        <a href="<?php echo $send_promo_url.'&promocode_id='.$promocode->id; ?>">
                          <i class="fas fa-chevron-right"></i>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>  
            </table>


        </div>

      </div>
    
<?php get_footer('account'); ?> 
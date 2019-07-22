<?php 
/*
  Template Name: Promocode Main
*/
get_header('account');
 $icons = json_decode(file_get_contents(get_stylesheet_directory().'/css/icons.json')); 
 $promocodes = array_reverse($avis_helper->get_user_promocodes());
?>  
<!-- <pre>
  <?php // print_r($promocodes); ?>
</pre> -->
<script type="text/javascript">
  let promocodes_cuont = <?php echo count($promocodes); ?>
</script>
      <div class="row m-0 full-height">
        <div class="col-3 p-0">
          <div class="subtitle">Apply Promo Code</div>
          <div class="promo-id-wrap text-center">
            <div class="promo-id-title">Enter Promo Code ID</div>
            <form>
              <input type="text" name="" placeholder="—">
              <input type="text" name="" placeholder="—">
              <input type="text" name="" placeholder="—">
              <input type="text" name="" placeholder="—">
              <input type="text" name="" placeholder="—">
            </form>
            <input type="submit" name="promo-id" value="APPLY" class="avis_submit">
          </div>
        </div>
        <div class="col-9 full-height promocode-table">
          <a class="avis_submit_wrapper" href="<?php echo get_cur_loc_url(253); ?>">
            <div class="avis_submit invite_chat_btn">ADD PROMO CODE +</div>
          </a>

            <table id="promocodes-table" class="table table-hover">
                <thead>
                  <tr>
                    <th></th>
                    <th>NAME</th>
                    <th>VALID FOR</th> 
                    <th></th>
                    <th></th>
                  </tr>
                </thead>  
                <tbody>
                  <?php foreach ($promocodes as $promocode) { ?>
                    <tr>
                      <td>
                        <div class="table-icon-wrapper text-center">
                          <i class="fas fa-<?php echo $promocode->iconCode; ?>"></i>
                        </div>
                      </td>
                      <td><?php echo $promocode->name; ?></td>
                      <td><?php echo $promocode->lifeTime; ?></td> 
                      <td class="text-right"><i class="fas fa-trash"></i></td>
                      <td><i class="fas fa-chevron-right"></i></td>
                    </tr>
                  <?php } ?>
                </tbody>  
            </table>


        </div>

      </div>
    
<?php get_footer('account'); ?> 
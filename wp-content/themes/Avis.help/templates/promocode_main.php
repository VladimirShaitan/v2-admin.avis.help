<?php 
/*
  Template Name: Promocode Main
*/
get_header('account');
 $icons = json_decode(file_get_contents(get_stylesheet_directory().'/css/icons.json')); 
 $promocodes = array_reverse($avis_helper->get_user_promocodes());
?>  
<script type="text/javascript">
  let promocodes_cuont = <?php echo count($promocodes); ?>
</script>
      <div class="row m-0 full-height">
        <div class="col-4 p-0">
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
        <div class="col-8 full-height promocode-table">
          <a class="avis_submit_wrapper" href="<?php echo get_cur_loc_url(253); ?>">
            <div class="avis_submit">ADD PROMO CODE +</div>
          </a>
        </div>

      </div>
    
<?php get_footer('account'); ?> 
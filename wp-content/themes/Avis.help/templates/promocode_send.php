<?php 
// Template name: Promocode send
get_header('account');
?>
      <div id="promocode-send-page" class="row m-0 full-height">
        <!-- full-height -->
        <div class="col-12">
            <h1 class="page_header"><?php echo $avis_lang['send_your_promo_codes']; ?></h1>
        </div>
        <div class="col-6">
          <div class="promo-info">
            <div class="promo-name">
              <div class="table-icon-wrapper text-center"><i class="fas fa-hand-middle-finger"></i></div>
              <span id="promo_name">Name</span>
            </div>
            <div class="promo-description">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            </div>
            <div class="promo-lifetime">
              <?php echo $avis_lang['valid_for']; ?> <span>30</span> <?php echo $avis_lang['days']; ?>
            </div>
          </div>
        </div>
        <div class="col-6 text-left">
          <form id="send_promo" class="send-promo-form">
             <input type="tel" name="send_promo_tel" id="send_promo_tel">   
            </form>
        </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
            <input type="submit" form="send_promo" name="" value="<?php echo $avis_lang['send']; ?>" class="avis_submit">
        </div>
      </div>


<!-- page settings -->
<script>
    let current_page_lang = '<?php echo $avis_lang["lang"]; ?>'
</script>

<?php get_footer('account'); ?> 
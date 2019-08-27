<?php 
// Template name: Promocode send
 if(empty($_GET['promocode_id'])){
    wp_safe_redirect('/promocodes/');
 }
 get_header('account');

  $promocode_data = $avis_helper->request(
      $avis_helper->api_path->organization->base .
      $avis_helper->avis_creds->organizationId .
      $avis_helper->api_path->organization->promo->base .
      $_GET['promocode_id'],
      true
  );
?>
<!-- <pre>
  <?php // print_r($promocode_data); ?>
</pre> -->
      <div id="promocode-send-page" class="row m-0 full-height">
        <!-- full-height -->
        <div class="col-12">
            <h1 class="page_header"><?php echo $avis_lang['send_your_promo_codes']; ?></h1>
        </div>
        <div class="col-6">
          <div class="promo-info">
            <div class="promo-name">
              <div class="table-icon-wrapper text-center">
                <i class="fas fa-<?php echo $promocode_data->iconId; ?>"></i>
              </div>
              <span id="promo_name"><?php echo $promocode_data->name; ?></span>
            </div>
            <div class="promo-description">
              <?php echo $promocode_data->description; ?>
            </div>
            <div class="promo-lifetime">
              <?php echo $avis_lang['valid_for']; ?> <span><?php echo $promocode_data->lifeTime; ?></span> <?php echo $avis_lang['days']; ?>
            </div>
          </div>
        </div>
        <div class="col-6 text-left">
          <form id="send_promo" class="send-promo-form">
             <input type="tel"  id="send_promo_tel"> 
             <!-- pattern="[\+][0-9]+" -->
             <input type="hidden" name="promocode_id" value="<?php echo $_GET['promocode_id']; ?>">
          </form>
        </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
            <input type="submit" form="send_promo" name="" value="<?php echo $avis_lang['send']; ?>" class="avis_submit">
        </div>

        <div class="send-number-loader hidden">
          <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
        </div>
      </div>



<!-- page settings -->
<script>
    let current_page_lang = '<?php echo $avis_lang["lang"]; ?>';
    let promo_id = '<?php echo $_GET['promocode_id']; ?>';
</script>

<?php get_footer('account'); ?> 
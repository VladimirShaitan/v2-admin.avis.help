<?php 
/* Template name: CTA main */
  get_header('account');  

    $cta_api_page = $avis_helper->api_path->organization->base .
                    $avis_helper->avis_creds->organizationId;
                    
    $branches = $avis_helper->request(
      $cta_api_page .
      $avis_helper->api_path->organization->branch->base,
      true
    );

    $cta_api_page .= $avis_helper->api_path->organization->bundle->base;

    $cta = $avis_helper->request(
      $cta_api_page .
      $avis_helper->api_path->organization->bundle->qr_type->base,
      true
    );

    $cta_answers = $avis_helper->request(
      $cta_api_page . 
      $avis_helper->api_path->organization->bundle->cta_answers->base,
      true
    )
?>
<!-- <pre>
  <?php // print_r($cta_answers); ?>
</pre> -->

  <div class="row m-0 full-height">
    <div class="col-3 p-0 general-cta-wrap">
      <div class="subtitle cta-subtitle"><?php echo $avis_lang['qr_name'];?></div>
      <div class="cta-wrap">
        <div id="qr-filter">
          <?php foreach ($cta->cta as $cta) { ?>
            <div 
              class="branch-item"
              data-branch-id="<?php echo $cta->branchId; ?>"
              data-cta-id="<?php echo $cta->id; ?>"
            >
              <span><?php echo $cta->name;?></span>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
    <div class="col-9 p-0">
       <div id="cta-branch-filter" class="subtitle cta-subtitle">
        <select>
          <option><?php echo $avis_lang['filter'];?></option>
          <option value="all"><?php echo $avis_lang['filter_all'];?></option>
          <?php foreach ($branches  as $branch) { ?>
            <option value="<?php echo $branch->id; ?>"><?php echo $branch->name; ?></option>
          <?php } ?>  
        </select>
       </div>
      <div class="cta-answers-wrap">
        <div class="branch-table">
          <div> 
          <div class="branch-table-item">
            <div class="cta-info">
              <span class="title">Answer 1</span>
              <span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span>
            </div>
            <div class="cta-analytics">
              <div class="cta-analytics-item">
                <span class="count">5</span>
                <span><?php echo $avis_lang['clicked'];?></span>
              </div>
              <div class="cta-analytics-item">
                <span class="count">27 <span class="time"><?php echo $avis_lang['min'];?></span></span>
                <span><?php echo $avis_lang['reaction_time'];?></span>
              </div>
            </div>
          </div>


          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

<?php get_footer('account'); ?> 
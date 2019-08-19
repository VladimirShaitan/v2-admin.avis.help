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
?>

  <div class="row m-0 full-height">
    <div class="col-3 p-0 general-cta-wrap">
      <div class="subtitle cta-subtitle"><?php echo $avis_lang['qr_name'];?></div>
      <div class="cta-wrap">
        <div id="qr-filter">
            <div 
              class="branch-item"
              data-branch-id="allё"
              data-cta-id="all"
            >
              <span><?php echo $avis_lang['filter_all'];?></span>
            </div>
          <?php foreach ($cta->cta as $qr) { ?>
            <div 
              class="branch-item"
              data-branch-id="<?php echo $qr->branchId; ?>"
              data-cta-id="<?php echo $qr->id; ?>"
            >
              <span><?php echo $qr->name;?></span>
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

          <?php
           foreach ($cta->cta as $answer) {
              foreach ($answer->options as $option) {
           ?>
              <div class="branch-table-item" data-opinion-cta-id="<?php echo $answer->id; ?>" data-branch-id="<?php  echo $answer->branchId; ?>">
                <div class="cta-info">
                  <?php 
                    $questions = (array) $answer->question;
                    $message = (array) $option->value; 
                  ?>
                  <span class="title"><?php echo $questions[$answer->defaultLocale]; ?></span>
                  <span class="description"><?php echo $message[$answer->defaultLocale]; ?></span>
                </div>
                <div class="cta-analytics">
                  <div class="cta-analytics-item">
                    <span class="count"><?php echo $option->hits; ?></span>
                    <span><?php echo $avis_lang['clicked'];?></span>
                  </div>
                  <div class="cta-analytics-item">
                    <span class="count"><?php echo $option->averageReactionTime; ?> 
                      <span class="time"><?php echo $avis_lang['min'];?></span>
                    </span>
                    <span><?php echo $avis_lang['reaction_time'];?></span>
                  </div>
                </div>
              </div>

          <?php } } ?>  


          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

<?php get_footer('account'); ?> 
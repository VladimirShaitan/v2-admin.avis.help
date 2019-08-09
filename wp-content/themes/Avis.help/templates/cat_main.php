<?php 
/* Template name: CTA main */
  get_header('account');  
    $branches = $avis_helper->request(
      $avis_helper->api_path->organization->base .
      $avis_helper->avis_creds->organizationId .
      $avis_helper->api_path->organization->branch->base,
      true
    );
?>


  <div class="row m-0 full-height">
    <div class="col-3 p-0 general-cta-wrap">
      <div class="subtitle cta-subtitle"><?php echo $avis_lang['qr_name'];?></div>
      <div class="cta-wrap">
        <div>
            <div class="branch-item">
              <span>Name 1</span>
            </div>
            <div class="branch-item">
              <span>Name 2</span>
            </div>
            <div class="branch-item">
              <span>Name 3</span>
            </div>
            <div class="branch-item">
              <span>Name 4</span>
            </div>
            <div class="branch-item">
              <span>Name 5</span>
            </div>
            <div class="branch-item">
              <span>Name 6</span>
            </div>
            <div class="branch-item">
              <span>Name 7</span>
            </div>
        </div>
      </div>
    </div>
    <div class="col-9 p-0">
       <div class="subtitle cta-subtitle">
        <select>
          <option><?php echo $avis_lang['filter'];?></option>
          <?php foreach ($branches  as $branch) { ?>
            <option value="<?php echo $branch->name; ?>"><?php echo $branch->name; ?></option>
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
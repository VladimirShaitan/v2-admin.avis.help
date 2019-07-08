<?php 
/*Template Name: Account home page*/
  get_header('account');  
  global $avis_helper;
  $branches = $avis_helper->get_my_branches();
  $user_info = json_decode($avis_helper->get_my_info());
?>
<div class="modal-overlay">
  <div class="modal-window">
    <div class="modal-head"><?php echo $avis_lang['export_xml'];?> <span class="close">&times;</span></div>
    <div class="modal-body">
      <form id="export_form">
        <label for="export_mail">Email</label>
        <input type="text" name="export_mail" id="export_mail" value="<?php echo $user_info->email;?>">
        <p class="export-notice"><?php echo $avis_lang['export_mes'];?></p>
        <div>
          <input type="submit" name="export_btn" id="export_btn" class="avis_submit" value="<?php echo $avis_lang['send'];?>">
        </div>
      </form>
    </div>
  </div>
</div>

  <div class="row m-0 home_page_loggedin">
        <div class="col-4 p-0">
            <div class="acc-home-wrapper">
              <div class="fake_disable hidden"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>
              <h4 class="text-uppercase"><?php echo $avis_lang['select_branch'];?></h4>
              <div class="form-filter-wrapper">
                <form id="branch-revs-filter" class="branch-revs-filter">
                  <select name="branch" class="custom_select">
                    <option value="OVERALL"><?php echo $avis_lang['branches_ov'];?></option>
                    <?php foreach($branches as $branch){ ?>
                      <option value="<?php echo $branch->id; ?>"><?php echo $branch->name; ?></option>
                    <?php } ?>
                  </select>
                  <div class="caledars_wrapper">
                    <div class="row m-0">
                      <div class="col-6 p-0">
                        <label class="calendar calendar-from">
                          <span class="calendar-caption"><?php echo $avis_lang['from'];?></span>
                          <input class="date_filter_fake_input" autocomplete="off" type="text" name="filter-date-from-fake" readonly>
                          <input type="hidden" name="filter-date-from">
                        </label>
                      </div>
                      <div class="col-6 p-0">
                        <label class="calendar calendar-to">
                          <span class="calendar-caption"><?php echo $avis_lang['to'];?></span>
                          <input class="date_filter_fake_input" autocomplete="off" type="text" name="filter-date-to-fake" readonly>
                          <input type="hidden" name="filter-date-to">
                        </label>
                      </div>      
                    </div>
                  </div>  
                  <div class="checkboxes_wrapper">
                      <div class="row m-0">
                         <div class="col-4 p-0">
                          <label>
                            <input type="checkbox" name="today" data-date="day">
                            <div class="fake_btn fake_first">
                              <div class="btn_checkbox_text"><?php echo $avis_lang['today']; ?></div>
                            </div>
                          </label>
                        </div>
                        <div class="col-4 p-0">
                          <label>
                            <input type="checkbox" name="week" data-date="week">
                            <div class="fake_btn fake_middle">
                              <div class="btn_checkbox_text"><?php echo $avis_lang['week'];?></div>
                            </div>
                          </label>
                        </div>  
                        <div class="col-4 p-0">
                          <label>
                            <input type="checkbox" name="month" data-date="month">
                            <div class="fake_btn fake_last">
                              <div class="btn_checkbox_text"><?php echo $avis_lang['month'];?></div>
                            </div>
                          </label>
                        </div> 
                      </div>
                  </div>
                  <div class="submit_btn_wrapper text-center hidden">
                    <input class=" text-uppercase" type="submit" name="submit-search" value="Search">
                  </div>
                                <div class="filter_bottom_wrapper">
                  <div class="row text-center">
                    <div class="col-6">
                      <div class="counters total_revs">?</div>
                      <span class="caption"><?php echo $avis_lang['total-reviews'];?></span>
                    </div>    
                    <div class="col-6">
                      <div class="counters total_convs">?</div>
                      <span class="caption"><?php echo $avis_lang['total-conversations'];?></span>
                    </div>    
                  </div>

                  <div class="rating_wrapper">
                    <select class="custom_select" name="rating-type" form="branch-revs-filter">
                      <option value="OVERALL"><?php echo $avis_lang['overall-rating'] ?></option>
                      <option value="GENERAL"><?php echo $avis_lang['general'] ?></option>
                      <option value="CLEANNESS"><?php echo $avis_lang['cleaness'] ?></option>
                      <option value="SERVICE"><?php  echo $avis_lang['service'] ?></option>
                    </select>

                    <div class="stars text-center">
                      <div class="stars_wrapper">
                        <img draggable="false" src="/wp-content/uploads/2019/02/stars.png">
                        <div class="rating_progress" ></div> 
                        <!-- style="width: 70%;" -->
                      </div>
                    </div>

                    <div class="text-center">
                      <div class="counters p-0 marks"></div>
                    </div>

                  </div>


                  

              </div>
                </form>
              </div>
          </div>

<div class="acc-home-wrapper export-wrap" style="display: none;">
            <h4 class="text-uppercase"><?php echo $avis_lang['export'] ?></h4>
            <div class="export">
                    <div class="avis_submit"><?php echo $avis_lang['export_btn'] ?></div>
                  </div>
          </div>


        </div>
        <div class="col-8">
          <div class="acc-home-wrapper nps">
            <h4 class="text-uppercase"><?php echo $avis_lang['nps'];?></h4>
            <div class="nps-wrapper">
              <div id="nps" class="text-center">
                <div is="stat-circle" percentage="100"></div>
              </div>
              <script id="stat-circle" type="x-template">
                <svg class="stat-circle" viewBox="1.6 1.6 16.8 16.8">
                  <circle class="bg" cx="10" cy="10" r="8"/></circle>
                  <circle class="progress" cx="10" cy="10" r="8" :data-percentage="percentage"/></circle>
                  <text x="60%" y="73%" id="overall_mark">0</text>
                </svg>
              </script>
              <div class="results">
                <span class="nps-type"><?php echo $avis_lang['promoters'];?></span>
                <div class="nps-item promoters" >
                  <div class="progress"></div>
                  
                  <span class="nps-procent">0</span>
                </div>
                <span class="nps-type"><?php echo $avis_lang['passives'];?></span>
                <div class="nps-item neutral">
                  <!-- <div class="circle yellow">23%</div> -->
                  <div class="progress yellow"></div>
                  
                  <span class="nps-procent">0</span>
                </div>
                 <span class="nps-type"><?php echo $avis_lang['detractors'];?></span>
                <div class="nps-item detractor">
                  <!-- <div class="circle red">12%</div> -->
                  <div class="progress red"></div>
                 
                  <span class="nps-procent">0</span>
                </div>
              </div>
            </div>
          </div>
          <div class="acc-home-wrapper diagram">
              <h4 class="text-uppercase"><?php echo $avis_lang['your-stats'];?></h4>
              <canvas id="myChart" width="900" height="380"></canvas>
            </div>
        </div>
  </div>

<?php get_footer('account'); ?> 
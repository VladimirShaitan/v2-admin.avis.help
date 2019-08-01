<?php 
/*Template Name: Account home page*/
  get_header('account');  
  global $avis_helper;

  //Get  branches
  $branches = $avis_helper->request(
    $avis_helper->api_path->organization->base .
    $avis_helper->avis_creds->organizationId .
    $avis_helper->api_path->organization->branch->base,
    true
  );

  // $user_info = $avis_helper->request();
?>
<!-- 
<pre>
  <?php // print_r($user_info); ?>
</pre>
 -->
 <div class="modal-overlay modal-export">
  <div class="modal-window">
    <div class="modal-head"><?php echo $avis_lang['export_xml'];?> <span class="close">&times;</span></div>
    <div class="modal-body">
      <form id="export_form">
        <input type="text" name="export_mail" id="export_mail" value="<?php echo $user_info->email;?>" placeholder="Enter Email">
        <p class="export-notice"><?php echo $avis_lang['export_mes'];?></p>
        <div>
          <input type="submit" name="export_btn" id="export_btn" class="avis_submit" value="<?php echo $avis_lang['send'];?>">
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal-overlay modal-notification">
  <div class="modal-window">
    <div class="modal-body">
      <p class="title"><?php echo $avis_lang['notif_title'];?></p>
      <p class="qr-name">QR Name 1: No paper</p>
      <p><?php echo $avis_lang['notif_mes'];?></p>
      <p class="fake-btn"><?php echo $avis_lang['notif_btn'];?></p>
    </div>
  </div>
</div>

<div class="row filter-wrap">
  <form id="branch-revs-filter" class="branch-revs-filter">
                  <select name="branch" class="custom_select">
                    <option value="OVERALL"><?php echo $avis_lang['branches_ov'];?></option>
                    <?php foreach($branches as $branch){ ?>
                      <option value="<?php echo $branch->id; ?>"><?php echo $branch->name; ?></option>
                    <?php } ?>
                  </select>
                  
                  <div class="days-wrapper">
                  <div class="checkboxes_wrapper">
                      <div class="row m-0">
                          <label>
                            <input type="checkbox" name="today" data-date="day">
                            <div class="fake_btn fake_first"><?php echo $avis_lang['today']; ?></div>
                          </label>
                          <label>
                            <input type="checkbox" name="week" data-date="week">
                            <div class="fake_btn fake_middle">
                              <?php echo $avis_lang['week'];?>
                            </div>
                          </label>
                          <label>
                            <input type="checkbox" name="month" data-date="month">
                            <div class="fake_btn fake_last">
                              <?php echo $avis_lang['month'];?>
                            </div>
                          </label>
                      </div>
                  </div>
                  <div class="caledars_wrapper">
                    <div class="row m-0">
                      <div id='new_calendar'></div>
                    </div>
                  </div> 
                  </div>
       
                  <select class="custom_select" name="rating-type" form="branch-revs-filter">
                      <option value="OVERALL"><?php echo $avis_lang['overall-rating'] ?></option>
                      <option value="GENERAL"><?php echo $avis_lang['general'] ?></option>
                      <option value="CLEANNESS"><?php echo $avis_lang['cleaness'] ?></option>
                      <option value="SERVICE"><?php  echo $avis_lang['service'] ?></option>
                    </select>

                  <div class="submit_btn_wrapper text-center hidden">
                    <input class=" text-uppercase" type="submit" name="submit-search" value="Search">
                  </div>
                     
                </form>
              </div>




  <div class="row m-0 home_page_loggedin">
     <div class="fake_disable hidden"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>

        <div class="col-4 p-0">
          <div class="new-home-wrap nps-home">
            <h4><?php echo $avis_lang['nps'];?></h4>
            <div class="nps-wrapper">

              <!-- <div id="nps" class="text-center">
                <div is="stat-circle" percentage="100"></div>
              </div>
              <script id="stat-circle" type="x-template">
                <svg class="stat-circle" viewBox="1.6 1.6 16.8 16.8">
                  <circle class="bg" cx="10" cy="10" r="8"/></circle>
                  <circle class="progress" cx="10" cy="10" r="8" :data-percentage="percentage"/></circle>
                  <text x="60%" y="73%" id="overall_mark">0</text>
                </svg>
              </script>
 -->
              
                <div class="progress progress-nps" id="progress-nps">
                  <div class="inner" id="overall_mark"></div>
                </div>
              

              <div class="results">
                  <div class="nps-group">
                    <div class="nps-item detractor"><div class="progress red"></div></div>
                    <div class="nps-item neutral"><div class="progress yellow"></div></div>
                    <div class="nps-item promoters"><div class="progress"></div></div>
                  </div>
                  <div class="nps-titles">
                    <span class="nps-type"><?php echo $avis_lang['promoters'];?></span>
                <div class="nps-item promoters" >
                  
                  <span class="nps-procent">0</span>
                   <div class="progress"></div>
                </div>
                <span class="nps-type"><?php echo $avis_lang['passives'];?></span>
                <div class="nps-item neutral">
                  
                  <span class="nps-procent">0</span>
                   <div class="progress yellow"></div>
                </div>
                 <span class="nps-type"><?php echo $avis_lang['detractors'];?></span>
                <div class="nps-item detractor">
                 
                  <span class="nps-procent">0</span>
                  <div class="progress red"></div>
                </div>
                  </div>
                
                 </div>
              </div>
            </div>

            <div class="new-home-wrap">
            <h4><?php echo $avis_lang['rating'];?></h4>
             <div class="row text-center">
                    <div class="col-5">
                      <a href="<?php if (get_locale() === 'fr_FR'){?> /fr/avis<?php } elseif (get_locale() === 'ru_RU'){?> /ru/reviews-ru/<?php } else { ?> /reviews<?php };?>">
                        <div class="counters total_revs">0</div>
                        <span class="caption"><?php echo $avis_lang['total-reviews'];?></span>
                      </a>
                      <a href="<?php if (get_locale() === 'fr_FR'){?> /fr/conversation<?php } elseif (get_locale() === 'ru_RU'){?> /ru/conversations-ru/<?php } else { ?> /conversations<?php };?>">
                        <div class="counters total_convs">0</div>
                        <span class="caption"><?php echo $avis_lang['total-conversations'];?></span>
                      </a>
                    </div>    
                    <div class="col-6">
                      <div class="progress progress-rating" id="progress-rating">
                        <div class="inner" id="marks"></div>
                      </div>

                     <!--  <div id="rating" class="text-center">
                <div is="rating-circle"></div>
              </div>
              <script id="rating-circle" type="x-template">
                <svg class="rating-circle" viewBox="1.6 1.6 16.8 16.8">
                  <circle class="bg" cx="10" cy="10" r="8"/></circle>
                  <circle class="progress circle-progress" cx="10" cy="10" r="8"/></circle>
                  <text x="60%" y="-45%" class="counters p-0 marks">0</text>
                </svg>
              </script> -->
                    </div>    
                  </div>
                      
            </div>


          </div>
        
        <div class="col-8">
          <div class="diagram">
              <canvas id="myChart" width="900" height="380"></canvas>
          </div>
          <div class="export">
            <div class="avis_submit"><?php echo $avis_lang['export_btn'] ?></div>
          </div>
        </div>
    </div>
  </div>






                   
<?php get_footer('account'); ?> 
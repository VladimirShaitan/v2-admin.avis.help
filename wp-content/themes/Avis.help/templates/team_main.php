<?php 
/*Template Name: Team page*/
  get_header('account'); 

  $branches = array_reverse($avis_helper->get_my_branches()); 
  $company = json_decode($avis_helper->get_organization());
?>


  <div class="row m-0 full-height">
    <div class="col-3 p-0 ">
      <div class="subtitle"><?php echo $avis_lang['list_of_roles'];?></div>
      <div class="add-role-wrap">
        <a href="/team/new-role/" class="avis_submit"><?php echo $avis_lang['add_role'];?> +</a>
      </div>
      <div class="roles-wrap">
        <div>
            <div class="role-item">
              <span>Role</span>
              <div class="edit-wrap">
                <div class="edit">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="edit-menu">
                  <a class="delete"><?php echo $avis_lang['delete'];?></a>
                  <a href=""><?php echo $avis_lang['edit'];?></a>
                </div>
              </div>
            </div>
            <div class="role-item">
              <span>Role</span>
              <div class="edit-wrap">
                <div class="edit">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="edit-menu">
                  <a class="delete"><?php echo $avis_lang['delete'];?></a>
                  <a href=""><?php echo $avis_lang['edit'];?></a>
                </div>
              </div>
            </div>
            <div class="role-item">
              <span>Role</span>
              <div class="edit-wrap">
                <div class="edit">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="edit-menu">
                  <a class="delete"><?php echo $avis_lang['delete'];?></a>
                  <a href=""><?php echo $avis_lang['edit'];?></a>
                </div>
              </div>
            </div>
            <div class="role-item">
              <span>Role</span>
              <div class="edit-wrap">
                <div class="edit">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="edit-menu">
                  <a class="delete"><?php echo $avis_lang['delete'];?></a>
                  <a href=""><?php echo $avis_lang['edit'];?></a>
                </div>
              </div>
            </div>
            <div class="role-item">
              <span>Role</span>
              <div class="edit-wrap">
                <div class="edit">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="edit-menu">
                  <a class="delete"><?php echo $avis_lang['delete'];?></a>
                  <a href=""><?php echo $avis_lang['edit'];?></a>
                </div>
              </div>
            </div>
            <div class="role-item">
              <span>Role</span>
              <div class="edit-wrap">
                <div class="edit">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="edit-menu">
                  <a class="delete"><?php echo $avis_lang['delete'];?></a>
                  <a href=""><?php echo $avis_lang['edit'];?></a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-9 full-height team-wrap">
      <div class="subtitle">
        <div class="team_tab_title"><?php echo $avis_lang['branches'];?></div>
        <div class="team_tab_title"><?php echo $avis_lang['members'];?></div>
      </div>
      <div class="team_tab_item">
        <div class="branch-table">
        	<div> 
  	      <?php foreach ($branches as $branch) { ?>
  	      <div class="branch-table-item" id="<?php echo $branch->id;?>">
  	        <div class="branch-info-header">
  	            <div class="branch_logo" style="<?php if(!empty($branch->logoUrl)){ ?>background-image:url(<?php echo $branch->logoUrl; ?>); <?php } ?>"></div>
  	            <div class="branch_info">
  			        <span class="branch_name"><?php echo $branch->name; ?></span>
  			        <span><?php echo $branch->address; ?></span>
  			        <span><?php echo $branch->phone; ?></span>
  			    </div>
  	        </div>
  	        <div class="members_count">
  	          <p><span>6</span> <?php echo $avis_lang['members'];?></p>
  	        </div>
  	        <a href="/team/new-member/" class="avis_submit"><?php echo $avis_lang['add_member'];?> +</a>
  	      </div>
  	      <?php } ?>
        	</div>
        </div>
      </div>

      <div class="team_tab_item">
        <div class="roles-table-wrap">
          <div class="roles-table-wrap-inner">
            <a href="/team/new-member/" class="avis_submit"><?php echo $avis_lang['add_member'];?> +</a>
            <table id="roles-table" class="table table-hover">
              <thead>
                <tr>
                  <th><?php echo $avis_lang['role'];?></th>
                  <th><?php echo $avis_lang['role_table_name'];?></th>
                  <th>EMAIL</th>
                  <th><?php echo $avis_lang['status'];?></th>
                  <th><?php echo $avis_lang['branches'];?></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Super admin</td>
                  <td>Anna Smith</td>
                  <td>asmith@gmail.com</td>
                  <td><div class="status_circle"></div></td>
                  <td></td>
                  <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
                </tr>
                <tr>
                  <td>Super admin</td>
                  <td>Anna Smith</td>
                  <td>asmith@gmail.com</td>
                  <td><div class="status_circle"></div></td>
                  <td></td>
                  <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
                </tr>
                <tr>
                  <td>Super admin</td>
                  <td>Anna Smith</td>
                  <td>asmith@gmail.com</td>
                  <td><div class="status_circle"></div></td>
                  <td></td>
                  <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
                </tr>
                <tr>
                  <td>Super admin</td>
                  <td>Anna Smith</td>
                  <td>asmith@gmail.com</td>
                  <td><div class="status_circle"></div></td>
                  <td></td>
                  <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
                </tr>
                <tr>
                  <td>Super admin</td>
                  <td>Anna Smith</td>
                  <td>asmith@gmail.com</td>
                  <td><div class="status_circle"></div></td>
                  <td></td>
                  <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
                </tr>
                <tr>
                  <td>Super admin</td>
                  <td>Anna Smith</td>
                  <td>asmith@gmail.com</td>
                  <td><div class="status_circle"></div></td>
                  <td></td>
                  <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
                </tr>
                <tr>
                  <td>Super admin</td>
                  <td>Anna Smith</td>
                  <td>asmith@gmail.com</td>
                  <td><div class="status_circle"></div></td>
                  <td></td>
                  <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
                </tr>
                <tr>
                  <td>Super admin</td>
                  <td>Anna Smith</td>
                  <td>asmith@gmail.com</td>
                  <td><div class="status_circle"></div></td>
                  <td></td>
                  <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
                </tr>
                <tr>
                  <td>Super admin</td>
                  <td>Anna Smith</td>
                  <td>asmith@gmail.com</td>
                  <td><div class="status_circle"></div></td>
                  <td></td>
                  <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
      <!--   <div id="branches-list-holder" class="col-8 p-l-0">
                <div class="row edit-top-wrapper">
                  <div class="col-2">
                     <label>
                        <input type="file" form="company_name" name="profile-image" id="upload_image" multiple="false" accept="image/*">
                        <div class="add_photo" style="<?php if(!empty($company->logoUrl)){ ?>background-image: url(<?php echo $company->logoUrl; ?>); <?php } ?>">
                          
                        </div>
                    </label>
                    <input type="hidden" name="profile-image-hidden" form="company_name" class="add_photo_hidden">
                  </div>
                  <div class="col-10 p-0">
                    <form id="company_name" class="company_name">
                     
                      <div class="row">
                        <div class="col-8">
                          <input type="text" name="company_name" placeholder="<?php echo $avis_lang['create_name'];?>" value="<?php if(!empty($company)){ echo $company->name;} ?>">
                        </div>
                        <div class="col-4 d-flex align-items-center" style="justify-content: center;">
                          <input type="submit" name="company_submit" class="avis_submit" value="<?php echo $avis_lang['save'];?>">
                        </div>
                      </div>
                    <?php wp_nonce_field( 'profile-image', 'profile-image_nonce' ); ?>
                    </form>
                  </div>
              </div>

        <div class="branches-list-holder">
          <?php foreach ($branches as $branch) { ?>
              <div class="acc-home-wrapper branches-wrapper">
                <div class="br_del_mes hidden"><?php echo $avis_lang['delete_branches']; ?>
                    <span>
                      <span class="del_branch_trigger" data-branch-id="<?php echo $branch->id; ?>"><?php echo $avis_lang['yes'];?></span>
                      <span class="close_rm_br"><?php echo $avis_lang['not'];?></span>
                    </span> 
                </div>

                <div class="branch_header_wrapper row">
                  <div class="branch_header_logo col-2">
                    <form data-branch-id="<?php echo $branch->id; ?>">
                      <label>
                        <div class="b_logo_img_wrapper">
                          <div class="branch_url" style="<?php if(!empty($branch->logoUrl)){ ?>background-image:url(<?php echo $branch->logoUrl; ?>); <?php } ?>"></div>
                        </div>
                        <input class="hidden" type="file" name="branch-logo" multiple="false" accept="image/*">
                      </label>
                        <?php wp_nonce_field( 'branch-logo', 'branch-logo_nonce' ); ?>
                    </form>
                  </div>
                  <div class="branch_header_info col-10 p-0">
                    <h4 class="branch_header">
                      <?php echo $branch->name; ?>
                      <div class="del_branch"></div>
                    </h4>
                    <table class="table-borderless">
                        <tr><td><?php echo $branch->address; ?></td></tr>
                        <tr><td><?php echo $branch->contact; ?></td></tr>
                        <tr>
                          <td>
                            <a href="tel:<?php echo $branch->phone; ?>"><?php echo $branch->phone; ?></a>
                          </td>
                        </tr>
                    </table>
                  </div>
                </div>

                <div class="qrs_wrapper">

                  <?php foreach ($branch->qrCodes as $qr_code) { ?>
                    <div class="qr">
                        <h6><?php echo localize_qr_type($qr_code->qrType); ?>  <a href="<?php echo $qr_code->qrUrl; ?>" target="_blank"></a></h6>
                        <div class="qr-img-wrapper">
                          <img width="100%" height="100%" draggable="false" src="<?php echo $qr_code->qrUrl; ?>">
                        </div>
                        <div  class="caption"><?php echo $qr_code->humanReadableId; ?></div>
                    </div>
                 <?php } ?>
                </div>
            </div>
        <?php } ?>
      </div>

        </div>

        <div id="create_branch_wrapper" class="col-4 <?php if(empty($company)){echo 'hidden'; } ?>">
            <div class="acc-home-wrapper branches-form-wrapper">
              <h4><?php echo $avis_lang['your_branch'];?></h4>
              <form>
                <label id="reg_branch_logo" class="text-center" style="width: 100%">
                  <div class="b_logo_img_wrapper" style="    display: inline-block;">
                    <div class="branch_url" style="background-image:url(/wp-content/themes/Avis.help/logo.png)"></div>
                  </div>
                  <input class="hidden" type="file" name="file" multiple="false" accept="image/*">
                </label>
              </form>
                <?php wp_nonce_field( 'branch-logo', 'branch-logo_nonce' ); ?>
              <form id="new-branch">
                <input type="text" required="" name="name" placeholder="<?php echo $avis_lang['name'];?>">
                <input type="text" required="" name="address" placeholder="<?php echo $avis_lang['address'];?>">
                <input type="text" required="" name="contact" placeholder="<?php echo $avis_lang['contact'];?>">
                <input type="text" required="" name="phone" placeholder="<?php echo $avis_lang['c_phone']; ?>">
                <input type="hidden" name="file" value=""> 
                <input type="submit" class="avis_submit" value="<?php echo $avis_lang['add_branch'];?>">
              </form>
            </div>
        </div> 
   -->

<?php get_footer('account'); ?> 
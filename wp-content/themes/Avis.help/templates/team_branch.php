<?php 
/*Template Name: Team branch*/
  get_header('account'); 

  $branches = array_reverse($avis_helper->get_my_branches()); 
  $company = json_decode($avis_helper->get_organization());
?>


  <div class="row m-0 full-height">
    <div class="col-3 p-0 ">
      <div class="subtitle"><?php echo $avis_lang['list_of_roles'];?></div>
      <div class="add-role-wrap">
        <a href="" class="avis_submit"><?php echo $avis_lang['add_role'];?> +</a>
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
    <div class="col-9 full-height p-0 team-branch-wrap">
      <div class="subtitle">
        <div class="branch-info-wrap">
          <div class="branch_url"></div>
          <div class="branch_info">
            <span class="branch_name">Branch #1</span>
            <span>35 Queen’s Gardens, London W2H44</span>
            <span>+385738348574</span>
          </div>
        </div>
        <a href="" class="avis_submit"><?php echo $avis_lang['add_member'];?> +</a>
      </div>
      <div class="roles-table-wrap">
        <div class="roles-table-wrap-inner">
          <table id="roles-table" class="table table-hover">
            <thead>
              <tr>
                <th><?php echo $avis_lang['role'];?></th>
                <th><?php echo $avis_lang['role_table_name'];?></th>
                <th>EMAIL</th>
                <th><?php echo $avis_lang['status'];?></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Super admin</td>
                <td>Anna Smith</td>
                <td>asmith@gmail.com</td>
                <td><div class="status_circle"></div></td>
                <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
              </tr>
              <tr>
                <td>Super admin</td>
                <td>Anna Smith</td>
                <td>asmith@gmail.com</td>
                <td><div class="status_circle"></div></td>
                <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
              </tr>
              <tr>
                <td>Super admin</td>
                <td>Anna Smith</td>
                <td>asmith@gmail.com</td>
                <td><div class="status_circle"></div></td>
                <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
              </tr>
              <tr>
                <td>Super admin</td>
                <td>Anna Smith</td>
                <td>asmith@gmail.com</td>
                <td><div class="status_circle"></div></td>
                <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
              </tr>
              <tr>
                <td>Super admin</td>
                <td>Anna Smith</td>
                <td>asmith@gmail.com</td>
                <td><div class="status_circle"></div></td>
                <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
              </tr>
              <tr>
                <td>Super admin</td>
                <td>Anna Smith</td>
                <td>asmith@gmail.com</td>
                <td><div class="status_circle"></div></td>
                <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
              </tr>
              <tr>
                <td>Super admin</td>
                <td>Anna Smith</td>
                <td>asmith@gmail.com</td>
                <td><div class="status_circle"></div></td>
                <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
              </tr>
              <tr>
                <td>Super admin</td>
                <td>Anna Smith</td>
                <td>asmith@gmail.com</td>
                <td><div class="status_circle"></div></td>
                <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
              </tr>
              <tr>
                <td>Super admin</td>
                <td>Anna Smith</td>
                <td>asmith@gmail.com</td>
                <td><div class="status_circle"></div></td>
                <td class="controlers"><a href=""><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>        
    </div>
  </div>

<?php get_footer('account'); ?> 
<?php 
/*Template Name: QR page*/
get_header('account');  
?>

  <div class="row m-0 full-height">
    <div class="col-12 p-0">
	      <div class="row m-0 full-height">
	          <div class="table-template-wrapper">
	          	<a href="/qr-manager/new-qr/" class="avis_submit invite_chat_btn"><?php echo $avis_lang['add_qr'];?> +</a>
	          	 <div class="cta-subtitle">
		        <select id="table-select-filter" >
		          	<option value=""><?php echo $avis_lang['filter'];?></option>
		        	<option>Branch</option>
		        	<option>Branch</option>
		        	<option>Branch</option>
		        	<option>Branch</option>
		        	<option>Branch</option>
		        	<option>Branch</option>
		        	<option>Branch</option>
		        </select>
		       </div>
	          	<table id="table_qr" class="table table-hover">
	          		<thead>
	          			<tr>
	          				<th><?php echo $avis_lang['qrtype']; ?></th>
		          			<th><?php echo $avis_lang['qr_type']; ?></th>
		          			<th><?php echo $avis_lang['qr_name']; ?></th>
		          			<th><?php echo $avis_lang['branch']; ?></th>
		          			<th></th>
	          			</tr>
	          		</thead>
	          		<tbody>
	          			<tr>
	          				<td>Opinion</td>
	          				<td>General</td>
	          				<td>QR 1</td>
	          				<td>All branches</td>
	          				<td class="controlers"><a href="/qr-manager/edit-qr/"><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
	          			</tr>
	          			<tr>
	          				<td>Opinion</td>
	          				<td>General</td>
	          				<td>QR 1</td>
	          				<td>All branches</td>
	          				<td class="controlers"><a href="/qr-manager/edit-qr/"><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
	          			</tr>
	          			<tr>
	          				<td>Opinion</td>
	          				<td>General</td>
	          				<td>QR 1</td>
	          				<td>All branches</td>
	          				<td class="controlers"><a href="/qr-manager/edit-qr/"><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
	          			</tr>
	          			<tr>
	          				<td>Opinion</td>
	          				<td>General</td>
	          				<td>QR 1</td>
	          				<td>All branches</td>
	          				<td class="controlers"><a href="/qr-manager/edit-qr/"><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
	          			</tr>
	          			<tr>
	          				<td>Opinion</td>
	          				<td>General</td>
	          				<td>QR 1</td>
	          				<td>All branches</td>
	          				<td class="controlers"><a href="/qr-manager/edit-qr/"><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
	          			</tr>
	          			<tr>
	          				<td>Opinion</td>
	          				<td>General</td>
	          				<td>QR 1</td>
	          				<td>All branches</td>
	          				<td class="controlers"><a href="/qr-manager/edit-qr/"><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
	          			</tr>
	          			<tr>
	          				<td>Opinion</td>
	          				<td>General</td>
	          				<td>QR 1</td>
	          				<td>All branches</td>
	          				<td class="controlers"><a href="/qr-manager/edit-qr/"><i class="fas fa-pencil-alt"></i></a> <a href=""><i class="fas fa-trash"></i></a></td>
	          			</tr>
	          		</tbody>
	          	</table>
	          </div>
	      </div>
    </div>
  </div>

<?php get_footer('account'); ?> 
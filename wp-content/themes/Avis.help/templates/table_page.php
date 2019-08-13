<?php 
/*Template Name: Table page*/
include(avis_get_wp_config_path());
get_header('account');  


$page_type = get_post_meta($post->ID, 'revs', true);
// if($page_type === '1') {

	$reviews = $avis_helper->request(
				$avis_helper->api_path->organization->base.
				$avis_helper->avis_creds->organizationId.
				$avis_helper->api_path->organization->info->base.
				$avis_helper->api_path->organization->info->review->base,
				true,
				array(
					'order' => null,
					'page'	=> 0,
					'size' => 1000000,
					'sortBy' => null
				),
				'GET'
			);

	$branches = $avis_helper->request(
	    $avis_helper->api_path->organization->base .
	    $avis_helper->avis_creds->organizationId .
	    $avis_helper->api_path->organization->branch->base,
	    true
	  );

?>

  <div class="row m-0 full-height">
    <div class="col-12 p-0">
	      <div class="row m-0 full-height">
	          <div class="table-template-wrapper">
	          	<?php if($page_type === 'conv') { ?>
	          	<a href="/conversations/invite-to-chat/" class="avis_submit invite_chat_btn"><?php echo $avis_lang['invite_to_chat'];?></a>
	          	<?php }; ?>
			  <div class="cta-subtitle">
		        <select id="table-select-filter" >
		          <option value=""><?php echo $avis_lang['filter'];?></option>
		        	<?php foreach ($branches  as $branch) { ?>
			          <option value="<?php echo $branch->id; ?>"><?php echo $branch->name; ?></option>
			        <?php } ?>  
		        </select>
		       </div>
	          	<table id="table_reviews" class="table table-hover">
	          		<thead>
	          			<tr>
	          				<th>
	          				<?php echo $avis_lang['status'];?></th>
		          			<th><?php echo $avis_lang['number'];?></th>
							<th><?php echo $avis_lang['date']; ?></th>
							<?php if($page_type === '1') { ?><th><?php echo $avis_lang['authorization']; ?> </th> <?php }; ?>
		          			<th><?php echo $avis_lang['branch']; ?></th>
		          			<th><?php echo $avis_lang['rating']; ?></th>
		          			<th><?php echo $avis_lang['qr_type']; ?></th>
		          			<th><?php echo $avis_lang['qr_name']; ?></th>
	          			</tr>
	          		</thead>
	          		<tbody>
	          			<?php foreach ($reviews as $review) {
	          				if($page_type === '1') {
								$viewed = $review->isViewed;
		          					$p_id = '96';
							} elseif($page_type === 'conv') {
								$viewed = $review->isChatViewed;
							}
	          			?>
		          			<tr data-branch-id="<?php echo $review->branchId; ?>" onclick="document.location = '/rev_handler/?p_id=<?php echo $p_id; ?>&rev_id=<?php echo $review->review->id; ?>&lang=<?php echo explode('_', get_locale())[0] ?>'" data-review-id="<?php echo $review->id; ?>" class="<?php if(empty($viewed)) { echo 'bold';}?>">
		          				<td>
		          					<span class="">branch_id=<?php echo $review->branchId; ?></span>
		          					<?php  if(empty($viewed)){ ?><div class="status_circle"></div><?php };?>
		          				</td>
		          				<td><?php echo $avis_lang['rew_number'];?><?php echo $review->review->id; ?></td>
		          				<td><?php echo $review->review->dateCreated; ?></td>
		          				<?php if($page_type === '1') { ?><td><?php  if(!empty($review->review->phone)){ ?><div class="auth_circle"><i class="fas fa-check"></i></div><?php };?></td><?php }; ?>
		          				<td>
		          					<?php echo $review->branchName; ?>		
		          				</td>
		          				<td><div class="stars-rating stars-<?php echo $review->review->impression; ?>"></div></td>
		          				<td><?php echo $review->opinionCategory; ?></td>
		          				<td><?php echo $review->opinionName->en; ?></td>
		          			</tr>
		          		</a>
	          			<?php } ?>
	          		</tbody>
	          	</table>
	          </div>
	      </div>
    </div>
  </div>

<?php get_footer('account'); ?> 
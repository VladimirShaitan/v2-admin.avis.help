<?php 
/*Template Name: Table page*/
include(avis_get_wp_config_path());
get_header('account');  


$page_type = get_post_meta($post->ID, 'revs', true);
if($page_type === '1') {
	$data = json_decode($avis_helper->get_all_reviews());
	$viewed = $data->isViewed;
} elseif($page_type === 'conv') {
	$data = $avis_helper->get_rev_with_conversation();
	$p_id = '55'; 
	$viewed = $data->isChatViewed;
}
?>
<!-- <pre> -->
	<?php // print_r($data); ?>
<!-- </pre> -->
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
		        	<?php foreach ($data as $review) { ?>
			          <option value="<?php echo $review->branch; ?>"><?php echo $review->branch; ?></option>
			        <?php } ?>  
		        </select>
		       </div>
	          	<table id="table_reviews" class="table table-hover">
	          		<thead>
	          			<tr>
	          				<th><?php echo $avis_lang['status'];?></th>
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
	          			<?php foreach ($data as $review) {
	          				if($page_type === '1') {
								$viewed = $review->isViewed;
								if(!empty($review->isAuthorized)){
		          					$p_id = '96';
		          				} else {
		          					$p_id = '90';
		          				} 
							} elseif($page_type === 'conv') {
								$viewed = $review->isChatViewed;
							}
	          			?>
		          			<tr onclick="document.location = '/rev_handler/?p_id=<?php echo $p_id; ?>&rev_id=<?php echo $review->id; ?>&lang=<?php echo explode('_', get_locale())[0] ?>'" data-review-id="<?php echo $review->id; ?>" class="<?php if(empty($viewed)) { echo 'bold';}?>">
		          				<td><?php  if(empty($viewed)){ ?><div class="status_circle"></div><?php };?></td>
		          				<td><?php echo $avis_lang['rew_number'];?><?php echo $review->id; ?></td>
		          				<td><?php echo gmdate('d/m/y', $review->dateCreated / 1000);?></td>
		          				<?php if($page_type === '1') { ?><td><?php  if(!empty($review->isAuthorized)){ ?><div class="auth_circle"><i class="fas fa-check"></i></div><?php };?></td><?php }; ?>
		          				<td><?php echo $review->branch; ?></td>
		          				<td><div class="stars-rating stars-<?php echo $review->impression; ?>"></div></td>
		          				<td><?php echo $review->qrType; ?></td>
		          				<td></td>
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
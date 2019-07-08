<?php 
/*Template Name: Table page*/
include(avis_get_wp_config_path());
get_header('account');  


$page_type = get_post_meta($post->ID, 'authorized_revs', true);
if($page_type === '0'){
	$data = json_decode($avis_helper->get_all_reviews('false'));
	$p_id = '90';
	$viewed = $data->isViewed;
} elseif($page_type === '1') {
	$data = json_decode($avis_helper->get_all_reviews('true'));
	$p_id = '96';
	$viewed = $data->isViewed;
} elseif($page_type === 'conv') {
	$data = $avis_helper->get_rev_with_conversation();
	$p_id = '55'; 
	$viewed = $data->isChatViewed;
}
?>
<!-- <pre>
	<?php // print_r($data); ?>
</pre> -->
  <div class="row m-0">
    <div class="col-12 p-0">
	      <div class="row m-0">
	          <div class="acc-home-wrapper table-template-wrapper">
	          	<table id="table_reviews" class="table table-hover">
	          		<thead>
	          			<tr>
		          			<th><?php echo $avis_lang['number'];?></th>
							<th><?php echo $avis_lang['created_at']; ?></th>
							<th><?php echo $avis_lang['viewed']; ?> </th>
		          			<?php $anon_rev_arr = array(182, 88, 128);
								if(!in_array($post->ID, $anon_rev_arr)){ ?>
									<th><?php echo $avis_lang['answered']; ?> </th>
							<?php } ?>  
		          			<th><?php echo $avis_lang['branch']; ?></th>
		          			<th><?php echo $avis_lang['photo']; ?></th>
		          			<th><?php echo $avis_lang['comment']; ?></th>
	          			</tr>
	          		</thead>
	          		<tbody>
	          			<?php foreach ($data as $review) { 
	          				if($page_type === '0'){
								$viewed = $review->isViewed;
							} elseif($page_type === '1') {
								$viewed = $review->isViewed;
							} elseif($page_type === 'conv') {
								$viewed = $review->isChatViewed;
							}
	          			?>
		          			<tr onclick="document.location = '/rev_handler/?p_id=<?php echo $p_id; ?>&rev_id=<?php echo $review->id; ?>&lang=<?php echo explode('_', get_locale())[0] ?>'" data-review-id="<?php echo $review->id; ?>" class="<?php if(empty($viewed)) { echo 'bold';}?>">
		          				<td><?php echo $avis_lang['rew_number'];?><?php echo $review->id; ?></td>
		          				<td><?php echo gmdate('d.m.Y', $review->dateCreated / 1000);?></td>
		          				<td>
	          						<?php if(empty($viewed)) { ?>
	          							<span class="text-danger"><?php echo $avis_lang['unviewed_rew'];?></span>
	          						<?php } else { ?>
										<span class="text-success"><?php echo $avis_lang['viewed_rew'];?></span>
	          						<?php } ?>	
		          				</td>
		          				<?php $anon_rev_arr = array(182, 88, 128);
								if(!in_array($post->ID, $anon_rev_arr)){ ?>
		          				<td>
		          					<?php if(empty($review->isAnswered)) { ?>
	          							<span class="text-danger"><?php echo $avis_lang['unanswered_rew'];?></span>
	          						<?php } else { ?>
										<span class="text-success"><?php echo $avis_lang['answered_rew'];?></span>
	          						<?php } ?>
		          				</td>
		          				<?php } ?>
		          				<td><?php echo $review->branch; ?></td>
		          				<td>
		          					<?php if(empty($review->imageUrl)) { ?>
	          							<span class="text-danger"><?php echo $avis_lang['img_rew_danger'];?></span>
	          						<?php } else { ?>
										<span class="text-success"><?php echo $avis_lang['img_rew_success'];?></span>
	          						<?php } ?>
		          				</td>
		          				<td><?php echo $review->message; ?></td>
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
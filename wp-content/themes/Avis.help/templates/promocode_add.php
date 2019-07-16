<?php 
// Template name: Promocode add
get_header('account');
 	$icons = json_decode(file_get_contents(get_stylesheet_directory().'/css/icons.json'));
?>
      <div class="row">
      	<!-- full-height -->
      	<div class="col-12">
	  		<h1 class="add_promo_page_header"><?php echo $avis_lang['new_promocode']; ?></h1>
      	</div>
        <div class="col-6">
        	<div class="add-promo-form-wrapper">
        		<form>
        			<div>
        				<input type="text" name="name" placeholder="<?php echo $avis_lang['create_name']; ?>" autocomplete="off">
        			</div>
        			<div>
        				<textarea name="description" placeholder="<?php echo $avis_lang['desc_max']; ?>" rows="3" ></textarea>
        			</div>
        			<div class="vf">
        				<span><?php echo $avis_lang['valid_for']; ?></span>
        				<input type="text" value="30" name="lifetime">
        				<span><?php echo $avis_lang['days']; ?></span>
        			</div>
        		</form>
        	</div>
        </div>
        <div class="col-6">
        	<h3 class="promo-icons-header"><?php echo $avis_lang['add_icon']; ?></h3>
        	<div class="promo-icons-wrapper">
        		<ul class="list-unstyled clearfix m-0">
        			<?php foreach ( $icons as  $icon) { ?>
	                  <li class="promocode-item">
	                    <input type="radio" <?php if($icon === $icons[0]){echo 'checked';}?> id="promocode-<?php echo $icon; ?>" value="<?php echo $icon; ?>" name="promocode_id">
	                    <label for="promocode-<?php echo $icon; ?>">
	                    <div class="promo-prview-wrapper">
	                      <div>
	                        <i class="fas fa-<?php echo $icon; ?>"></i>
	                        <!-- <span class="promocode-name"><?php // echo $icon; ?></span> -->
	                      </div>
	                   </div>
	                   </label>
	                 </li>
        			<?php } ?>
        		</ul>
        	</div>
        </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
        	<input type="submit" name="promo-id" value="<?php echo $avis_lang['profile_form_save']; ?>" class="avis_submit">
        </div>
      </div>

<?php get_footer('account'); ?> 
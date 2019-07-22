<?php 
// Template name: Invite to chat
get_header('account');
?>

      <div class="row m-0 full-height">
      	<!-- full-height -->
      	<div class="col-12">
	  		<h1 class="page_header"><?php echo $avis_lang['invite_to_chat']; ?></h1>
      	</div>
        <div class="col-12 text-center">
        	<form id="invite_to_chat" class="full-width-form">
             <input type="tel" name="invite_to_chat_tel" id="invite_to_chat_tel" placeholder="+380">   
            </form>
        </div>
        <div class="col-12 text-center p-0 promo-submit-wrapper">
        	<input type="submit" form="invite_to_chat" name="" value="<?php echo $avis_lang['invite']; ?>" class="avis_submit">
        </div>
      </div>

<?php get_footer('account'); ?> 
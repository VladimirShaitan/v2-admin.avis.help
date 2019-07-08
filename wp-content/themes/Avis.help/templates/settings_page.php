<?php 
/*Template Name: Settings Page*/
get_header('account');  
?>

  <div class="row m-0">
    <div class="col-12 p-0">
	      <div class="row m-0">
	          <div class="acc-home-wrapper table-template-wrapper">
	          		<form>
	          			<div class="row m-0">
	          				<div class="col-4">
	          					<?php if (get_locale() === 'fr_FR'){?> La langue:<?php } elseif (get_locale() === 'ru_RU'){ ?> Язык:<?php } else { ?> Language:<?php };?>
		          				<div class="lang"><?php pll_the_languages(array('display_names_as'=>'slug','dropdown'=>0)); ?></div>
	          				</div>
	          				<div class="col-4">
	          				</div>

	          			</div>
	          		</form>
	          </div>
	      </div>
    </div>
  </div>

<?php get_footer('account'); ?> 
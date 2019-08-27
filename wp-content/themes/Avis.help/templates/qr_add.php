<?php 
/*Template Name: Add QR */
get_header('account');  
?>

  <div class="row m-0">
    <div class="col-12">
	  	<h1 class="page_header new-qr"><?php echo $avis_lang['new_qr']; ?></h1>
	  	<p class="text-center"><?php echo $avis_lang['select_qr']; ?></p>
     </div>
      </div>
      <div class="qr_add_wrp">
         <div class="row qr-row">
         	<div class="col-6 text-center">
         		<div class="qr-type">
         			<a href="/qr-manager/opinion-qr/">
    	     			<img src="/wp-content/themes/Avis.help/img/qr1.png">
    	     			<p class="title"><?php echo $avis_lang['opinion']; ?></p>
         			</a>
         		</div>
         	</div>
         	<div class="col-6 text-center">
         	<div class="qr-type">
    	     		<a href="/qr-manager/landing-page-qr/">
    	     			<img src="/wp-content/themes/Avis.help/img/qr2.png">
    	     			<p class="title"><?php echo $avis_lang['landing_page']; ?></p>
    	     		</a>
         		</div>
         	</div>
         </div>
         <div class="row qr-row">
         	<div class="col-6 text-center">
         		<div class="qr-type">
         			<a href="/qr-manager/survey-qr/">
    	     			<img src="/wp-content/themes/Avis.help/img/qr3.png">
    	     			<p class="title"><?php echo $avis_lang['survey']; ?></p>
    	     		</a>
         		</div>
         	</div>
         	<div class="col-6 text-center">
         		<div class="qr-type">
         			<a href="/qr-manager/call-to-action-qr/">
    	     			<img src="/wp-content/themes/Avis.help/img/qr4.png">
    	     			<p class="title"><?php echo $avis_lang['call_to_action']; ?></p>
         			</a>
         		</div>
         	</div>
         </div>
    </div>     
 

<?php get_footer('account'); ?> 
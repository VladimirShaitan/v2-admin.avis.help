
<?php
    if(!empty($_COOKIE['avis_auth'])){
        wp_safe_redirect('/');
    };
    select_lang_first_load();
?>
<!DOCTYPE html>
<html class="" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>Avis.help</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-store" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<script type="text/javascript">
        (function (global) { 

    if(typeof (global) === "undefined") {
        throw new Error("window is undefined");
    }

    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";

        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };

    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };

    global.onload = function () {            
        noBackPlease();

        document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            e.stopPropagation();
        };          
    }

})(window);
    </script>
	<script type="text/javascript">
    	let lang = '<?php echo get_locale();?>';
        let er_lang = '<?php echo substr(get_locale(), 0, 2); ?>';
    	const lang_tr = '<?php echo substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); ?>';
  	</script>
		<?php 
			$GLOBALS["polylang"]->model->post->get_translations($post->ID);
			$trans_ids = $GLOBALS["polylang"]->model->post->get_translations($post->ID);
			$fr = get_post_permalink($trans_ids['fr']);
			$en = get_post_permalink($trans_ids['en']);
			$ru = get_post_permalink($trans_ids['ru']);
		?>
	<script type="text/javascript">
		<?php if (get_locale() === 'fr_FR'){?>
			let locs = 'fr_FR';
		<?php } elseif (get_locale() === 'ru_RU'){?>
			let locs = 'ru_RU';
		<?php } else {?>
			let locs = 'en_GB';
		<?php };?>
		const ru = '<?php echo $ru; ?>';
		const en = '<?php echo $en; ?>';
		const fr = '<?php echo $fr; ?>';
	</script>
</head>
<!-- <pre>
	<?php // print_r($trans_ids); ?>
</pre> -->
<body <?php body_class(); ?>>
	<a class="hidden" id="fr_loc" href="<?php echo $fr;?>"></a>
	<a class="hidden" id="ru_loc" href="<?php echo $ru;?>"></a>
	<a class="hidden" id="en_loc" href="<?php echo $en;?>"></a>
	<!-- <a class="hidden" id="lout" href="/login/"></a> -->
	
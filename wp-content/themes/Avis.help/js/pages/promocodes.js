	// Delete promocode
	if(qs('#promocodes-table') != null) {
		qs('#promocodes-table').addEventListener('click', function(e){
			if(e.target.classList.contains('delete_promo')){
				let del_promocode_data = {
					action: 'delete_promocode', 
					promocode_id: e.target.getAttribute('data-promo-id'),
				};
				let current_row = e.target.parentFinder('row-'+del_promocode_data.promocode_id); 

				console.log(current_row);

				jQuery.post(ajaxurl, del_promocode_data, (data) => {
					current_row.style.transform = 'translateX(200%)';
					setTimeout(function(){
						current_row.style.position = 'absolute';
						current_row.style.right = '200%';
					}, 150)
					setTimeout(function(){
						current_row.remove();
					}, 300)
				})
			}
		});

		// Nice select fix
		setTimeout(function(){
			qs('#promocodes-table_wrapper label').onclick = function() {return false}
		}, 500)

		// apply promocode 

		qs('.apply-promocode').addEventListener('keydown', function(e){
				if(e.target.value.length > 0 ){
					e.target.nextElementSibling.focus();
				} else {
					e.target.previousElementSibling.focus();
				}
			});

		qs('.apply-promocode').addEventListener('submit', function(e){
				e.preventDefault();

				let loader = qs('.promo-id-wrap .fake_disable');
				let inps = qsa('#apply-promocode input[type=text]');
				let hId = '';
				loader.classList.remove('hidden');

				inps.forEach((item) => {hId+=item.value});
				hId = hId.toUpperCase();


				jQuery.post(ajaxurl, {action: 'apply_promocode', humenId: hId}, (resp) => {
					resp = JSON.parse(resp)

					if(resp.id){
						inps.forEach((item) => {item.value = ''});
						qs('.apply_error').classList.add('hidden');
					} else if(resp.error != '') {
						qs('.apply_error').classList.remove('hidden');
					} 
					
					loader.classList.add('hidden');
					console.log();
				})

			});	
	}	


// add pomocode
 if(qs('#add-promocode-form') != null){
 	qs('#add-promocode-form').addEventListener('submit', function(e) {
 		e.preventDefault();
 		qs('#add-promocode-page input[type=submit]').setAttribute('disabled','disabled');
 		let promoData = {
 			action: 'add_promocode',
 			form_data: jQuery(this).serialize()
 		}
 		console.log(promoData);
 		jQuery.post(ajaxurl, promoData, function(resp){
 			let responce = JSON.parse(resp);
 			console.log(responce);
 			if(responce.id){
 				location.href = responce.return_url;
 			}
 		})
 	})
 }



 // send promocode 
if(qs('#promocode-send-page') != null){

	const prefCountries = {
        RU: ['UA', 'BY', 'RU'],
        UA: ['RU', 'BY', 'UA'],
        GB: ['AU', 'CA', 'GB', 'IE', 'NZ', 'US'],
        FR: ['AU', 'CA', 'GB', 'IE', 'NZ', 'US']
    }

	window.intlTelInput(qs('#send_promo_tel'), {
		ignoredCountries: ['BA', 'CF', 'CD', 'DO', 'KP', 'MF', 'PM', 'VC', 'ST', 'GF', 'PF', 'MK', 'NC', 'AE', 'WF', 'CG', 'GQ'],
		preferredCountries: prefCountries[current_page_lang.toUpperCase()],
		initialCountry: current_page_lang.toUpperCase(),
		placeholderNumberType: 'FIXED_LINE',
		formatOnDisplay: true,
		hiddenInput: 'recipient',
		
	});


	qs('#send_promo').addEventListener('submit', function(e){
		e.preventDefault();
		qs('.send-number-loader').classList.remove('hidden');

		ajax_handler({action: 'send_promocode_on_phone', data:jQuery(this).serialize()}, (data) => {
			qs('.send-number-loader').classList.add('hidden');
			if(data.success){
				location.href = '/promocodes/';
			} else {
				let blocks = qsa('.promo-info .promo-name, .promo-info .promo-description, form#send_promo input');
				blocks.forEach((item) => {
					item.style.borderColor = '#e95858'
				})
			}

			console.log(data);
		})

	});



} 
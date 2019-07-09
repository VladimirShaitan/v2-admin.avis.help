if(qs('#registration-form') != null){
	qs('#registration-form').addEventListener('submit', function(e) {
		e.preventDefault();
		jQuery.post(ajaxurl, {action: 'avis_register', data:jQuery(this).serialize()}, function(resp){
			// console.log(resp.success);
			resp = JSON.parse(resp);
			if(resp.success){
				qs('.mes-success').classList.remove('hidden');
				setTimeout(() => {
					location.href = '/login/';
				},1500)
			} else {
				qs('.mes-error').classList.remove('hidden');
				setTimeout(() => {
					qs('.mes-error').classList.add('hidden');
				}, 4000)
			}
		})
	})
}
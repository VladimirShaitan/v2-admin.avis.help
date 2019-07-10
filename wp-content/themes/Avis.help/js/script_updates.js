if(qs('#registration-form') != null){
	qs('#registration-form').addEventListener('submit', function(e) {
		e.preventDefault();
		jQuery.post(ajaxurl, {action: 'avis_register', data:jQuery(this).serialize()}, function(resp){
			resp = JSON.parse(resp);
			if(resp.success){
				qs('.mes-success').classList.remove('hidden');
				setTimeout(() => {
					location.href = '/login/';
				},1500)
			} else {
				console.log(resp.message);
				qs('.mes-error').innerHTML = resp.message;
				qs('.mes-error').classList.remove('hidden');
				setTimeout(() => {
					qs('.mes-error').classList.add('hidden');
				}, 4000)
			}
		})
	})
}
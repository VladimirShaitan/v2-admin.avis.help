class Login {
	constructor(form_id, e_name){
		this.form_id = form_id;
		this.event_name = e_name;
		if(qs(form_id) != null){
			this.set_event();	
		}
	};
	set_event(){
		let current = this
		const form = qs(current.form_id);

		// submit and validate login form
		form.addEventListener(this.event_name, function(e){
			e.preventDefault();

			let fileds = qsa(current.form_id + ' input.form-control');
			let validated = true;
			fileds.forEach((item) => {
				if(!item.value) {
					item.classList.add('error');
					form.qs('.error-login').innerText = error_messages[er_lang].login[item.getAttribute('data-validation')];
					form.qs('.error-login').classList.add('show');

					return validated = false;;
				}
			})

			if(validated){
				current.login(current.form_id);
			}

		});


		// clear errors
		form.addEventListener('input', function(e){
			form.qs('.error-login').classList.remove('show');
			let fileds = qsa(current.form_id + ' input.form-control');
			fileds.forEach((item) => {
				item.classList.remove('error');
			});
		})

	};

	// login request
	login(form){
		let login_data = {
			action:'login',
		 	log_info: jQuery(form).serialize()
		 }
		jQuery.post(ajaxurl, login_data, function(login_resp){
			login_resp = JSON.parse(login_resp);

			if(!login_resp.accessToken){
				qs(form).classList.add('error_login_form');
				qs(form+' .error-login').innerText = error_messages[er_lang].login.creds;
			} else {
				qs(form).classList.remove('error_login_form');
				location.href = login_resp.redirect_url;
			}
		});
	}
}
let login = new Login('#login-form', 'submit');
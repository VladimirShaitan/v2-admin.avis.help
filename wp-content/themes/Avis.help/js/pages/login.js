class Login {
	constructor(form_id, e_name){
		this.form_id = form_id;
		this.event_name = e_name;
		if(qs(form_id) != null){
			this.set_event();	
		}
	}
	set_event(){
		let current = this
		qs(this.form_id).addEventListener(this.event_name, function(e){
			e.preventDefault();
			let login_data = {
				action:'login_user',
			 	log_info: jQuery(current.form_id).serialize()
			 }
			jQuery.post(ajaxurl, login_data, function(login_resp){
				// location.href = login_resp.url;
			})
		})

	};
}
let login = new Login('#login-form', 'submit');
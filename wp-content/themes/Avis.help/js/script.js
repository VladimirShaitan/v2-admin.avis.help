let temp_data = {};

if(qs('.account_side_menu')!= null){
let acc_menu = qs('.account_side_menu');
	acc_menu.addEventListener('mouseover', function(e){
		let true_parent = e.target.parentFinder('menu-item');
		if(true_parent != null){
			true_parent.classList.add('hovered');
		}
	});
	acc_menu.addEventListener('mouseout', function(e){
		let true_parent = e.target.parentFinder('menu-item');
		if(true_parent != null){
			true_parent.classList.remove('hovered');
		}
	})


	if(qs('.menu_button') != null){
		let menu_button = qs('.menu_button a');
		menu_button.addEventListener('click', function(e){
			let sidebar_menu = qs('.sidebar');
			if(sidebar_menu.classList.contains('sidebar-closed')){
				sidebar_menu.classList.remove('sidebar-closed');
				qs('.account-body').classList.remove('acc-body-full-width');
			} else {
				sidebar_menu.classList.add('sidebar-closed');
				qs('.account-body').classList.add('acc-body-full-width');
			}
		}) 
	}
}
jQuery('.menu_button').click(function(){
	jQuery(this).toggleClass('opened');
});

if(qs('.calendar') != null){
	jQuery.fn.datepicker.defaults.format = "dd-mm-yyyy";
	jQuery('.calendar input.date_filter_fake_input').datepicker({autoclose: true}).on('hide', function(e){
		// console.log();

		e.target.parentElement.qs('input[type=hidden]').value = moment(e.date).format('DD-MM-YYYY HH:mm:ss'); 

		if(this.name === 'filter-date-from-fake' || this.name === 'filter-date-to-fake'){
			this.parentFinder('branch-revs-filter').qs('input[type="submit"]').click();
		}

	});
	qs('.caledars_wrapper').addEventListener('focusout', function(e){
		if(e.target.name === 'filter-date-from' || e.target.name === 'filter-date-to'){
			e.target.value = '';
		}
	})
}



if(qs('.venobox') != null ){
	jQuery(document).ready(function(){
	    jQuery('.venobox').venobox(); 
	});
}
if(qs('.add-promo-code') != null) {
	jQuery('.add-promo-code').click(function(){
		if (jQuery('.promo-code-wrapper').hasClass('active')) {
			jQuery('.promo-code-wrapper').removeClass('active')
		} else {
			jQuery('.promo-code-wrapper').addClass('active');
		}
		jQuery(this).toggleClass('opened');
	})
}

if(qs('.checkboxes_wrapper input[type="checkbox"]') != null){
	let filter_checkboxes = qsa('.checkboxes_wrapper input[type="checkbox"]');
	qs('.checkboxes_wrapper').addEventListener('change', function(e){

		if(e.target.getAttribute('checked') === 'checked'){
			e.target.checked = false;
			e.target.setAttribute('checked', 'false');
		} else {
			filter_checkboxes.forEach(function(item){
				if(item.getAttribute('checked') != null){
					item.setAttribute('checked', 'false');
					item.checked = false
				}
			});
			e.target.setAttribute('checked', 'checked');
			e.target.checked = true;
		}


		console.log(e.target.getAttribute('data-date'));
		if(e.target.getAttribute('data-date') === 'day'){
			qs('input[name="filter-date-from-fake"]').value = moment().subtract(0, 'days').format('DD-MM-YYYY');
			qs('input[name="filter-date-to-fake"]').value = moment().subtract(0, 'days').format('DD-MM-YYYY');

			qs('input[name="filter-date-from"]').value = moment().subtract(0, 'days').format('DD-MM-YYYY')+' 01:00:00';
			qs('input[name="filter-date-to"]').value = moment().subtract(0, 'days').format('DD-MM-YYYY')+' 23:00:00';
		} else if(e.target.getAttribute('data-date') === 'week'){
			qs('input[name="filter-date-from-fake"]').value = moment().subtract(6, 'days').format('DD-MM-YYYY');
			qs('input[name="filter-date-to-fake"]').value = moment().subtract(0, 'days').format('DD-MM-YYYY');

			qs('input[name="filter-date-from"]').value = moment().subtract(6, 'days').format('DD-MM-YYYY')+' 01:00:00';
			qs('input[name="filter-date-to"]').value = moment().subtract(0, 'days').format('DD-MM-YYYY HH:mm:ss');

		} else if(e.target.getAttribute('data-date') === 'month'){
			qs('input[name="filter-date-from-fake"]').value = moment().subtract(29, 'days').format('DD-MM-YYYY');
			qs('input[name="filter-date-to-fake"]').value = moment().subtract(0, 'days').format('DD-MM-YYYY');

			
			qs('input[name="filter-date-from"]').value = moment().subtract(29, 'days').format('DD-MM-YYYY')+' 01:00:00';
			qs('input[name="filter-date-to"]').value = moment().subtract(0, 'days').format('DD-MM-YYYY HH:mm:ss');
		}



	});
}

if(qs('#load_chat_trigger') != null){
	qs('#load_chat_trigger').onclick = function(e){
		qs('#load_chat_trigger').parentElement.remove();
		jQuery('#chat').show(500);
		message_handler.chat_invite(e);
	}
}



if(qs('.table-template-wrapper') != null){
	// let tab_trnsl = {};
	let tab_trnsl;
	let order;
	if(lang === 'ru_RU'){
		tab_trnsl = {
	       	search: "Поиск:",
	        lengthMenu:    "Показать _MENU_ элементов",
	        info:           "Показано с  _START_ по _END_ из _TOTAL_ элементов",
	        infoEmpty:      "",
	        loadingRecords: "Загрузка",
	        emptyTable:     "В таблице нет данных",
	        paginate: {
	            first:      "Первая",
	            previous:   "Предыдущая",
	            next:       "Следующая",
	            last:       "Последняя"
	        },
	        aria: {
	            sortAscending:  ": Сортировка по возростанию",
	            sortDescending: ": Сортировка по убыванию"
	        }
	    }
	    order = 'dsc';
	} else if(lang === 'fr_FR'){
		tab_trnsl = {
	        processing:     "Traitement en cours...",
	        search:         "Rechercher&nbsp;:",
	        lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
	        info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
	        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
	        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
	        infoPostFix:    "",
	        loadingRecords: "Chargement en cours...",
	        zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
	        emptyTable:     "Aucune donnée disponible dans le tableau",
	        paginate: {
	            first:      "Premier",
	            previous:   "Pr&eacute;c&eacute;dent",
	            next:       "Suivant",
	            last:       "Dernier"
	        },
	        aria: {
	            sortAscending:  ": activer pour trier la colonne par ordre croissant",
	            sortDescending: ": activer pour trier la colonne par ordre décroissant"
	        }
    	}
    	order = 'asc';
	} else {
		tab_trnsl = {
	       	search: "Search: ",
	        lengthMenu:    "Show _MENU_ items",
	        info:           "Shown from _START_ to _END_ of _TOTAL_ elements",
	        infoEmpty:      "",
	        loadingRecords: "Loading",
	        emptyTable:     "No data in table",
	        paginate: {
	            first:      "First",
	            previous:   "Previous",
	            next:       "Next",
	            last:       "Last"
	        },
	        aria: {
	            sortAscending:  ": Sort Ascending",
	            sortDescending: ": Sort descending"
	    	}
		}
		order = 'asc';
 	}

	jQuery(document).ready(function() {
	    jQuery('#table_reviews').DataTable( {
	        "order": [[ 5, "desc" ]],
	        "language": tab_trnsl,
	        "aaSortingFixed": [[2, order], [0, 'dsc']]
	    } )
	} );

	
}
 if(qs('.billing-page-wrapper') != null){
 	qs('.billing-page-wrapper table').addEventListener('click', function(e){
 		if(e.target.classList.contains('table_info_trigger')){
 			let billId = e.target.parentElement.getAttribute('data-row-id');
 			document.querySelectorAll('tr[data-parent-row-id]:not([data-parent-row-id="'+billId+'"])').forEach(function(item){
 				if(!item.classList.contains('related')){
	 				item.classList.add('related');
	 			}
 			})
 			let hidden_content = document.querySelector('.billing-page-wrapper table tbody tr[data-parent-row-id="'+billId+'"]');
 			if(hidden_content.classList.contains('related')){
 				hidden_content.classList.remove('related');
 			} else {
 				hidden_content.classList.add('related');
 			}
 			
 		}
	}) 
 }


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
			ajax_handler(login_data, current.callback)
		})

	};
	callback(data){
		// console.log(data.url);
		window.location.href = data.url;
	}
}
let login = new Login('#login-form', 'submit');




class eventFormSetter {
	constructor(e_trig, f_action, f_callback){
		this.eventTrigger = e_trig;
		this.form_action = f_action;
		this.callback = f_callback;
		if(qs(this.eventTrigger) != null){
			this.setEvent();
		}
	}
	setEvent(){
		let current = this;
		qs(this.eventTrigger).addEventListener('submit', function(e){
			e.preventDefault();

			let data = {
				action: current.form_action,
				form_data: jQuery(this).serialize()
			}

			this.querySelectorAll('input').forEach(function(i){
				i.setAttribute('disbled', 'disbled');
			})
			ajax_handler(data, current.callback);
		});
	}
}


let add_branch = new eventFormSetter('#new-branch', 'add_branch', template_constructor.add_branch);


if(qs('#reg_branch_logo') != null){
	qs('#reg_branch_logo').addEventListener('change', function(e){
			console.log('asdas');
			var form = jQuery(e.target.form)[0];
		    var data = new FormData(form);
		    data.append("action", 'upload_branch_logo');
		    // data.append("branch_id", e.target.form.getAttribute('data-branch-id'));

		    jQuery.ajax({
		        type: "POST",
		        enctype: 'multipart/form-data',
		        url: ajaxurl,
		        data: data,
		        processData: false,
		        contentType: false,
		        cache: false,
		        timeout: 600000,
		        success: (data) => {
		        	var p_data = JSON.parse(data);
		        	this.qs('.branch_url').style.backgroundImage = 'url('+p_data.url+')';
		        	qs('#new-branch input[type=hidden]').value = p_data.file;
		        },

		    });
	})
}




if(qs('.branches-list-holder') != null){

	qs('#branches-list-holder').addEventListener('click', function(e){

		if(e.target.classList.contains('del_branch_trigger')){
			let del_branch_data = {
				action: 'delete_branch', 
				branch_id: e.target.getAttribute('data-branch-id'),
			};
			jQuery.post(ajaxurl, del_branch_data, function(data){
					if(data != ''){
						e.target.parentFinder('acc-home-wrapper').style.opacity = 0;
						setTimeout(function(){
							e.target.parentFinder('acc-home-wrapper').remove();	
						}, 300);
					}

			});
		} else if(e.target.classList.contains('del_branch')){

			e.target.parentFinder('acc-home-wrapper').qs('.br_del_mes').classList.remove('hidden');
			// console.log(e.target.parentFinder('acc-home-wrapper').qs('.br_del_mes'));
		} else if(e.target.classList.contains('close_rm_br')){
			qs('.br_del_mes').classList.add('hidden')
		}
	})

	if(qs('.branch_header') != null){
		qs('#branches-list-holder').addEventListener('change', function(e){
			var form = jQuery(e.target.form)[0];
		    var data = new FormData(form);
		    console.log(e.target.name)
			if(e.target.name === 'branch-logo'){

			    data.append("action", 'update_branch_logo');
			    data.append("branch_id", e.target.form.getAttribute('data-branch-id'));

			    jQuery.ajax({
			        type: "POST",
			        enctype: 'multipart/form-data',
			        url: ajaxurl,
			        data: data,
			        processData: false,
			        contentType: false,
			        cache: false,
			        timeout: 600000,
			        success: function (data) {
			            let p_data = JSON.parse(data);
			            if(p_data.success){
			            	e.target.parentElement.qs('.branch_url').style.backgroundImage = 'url('+p_data.message+')';
			            } 
			        },

			    });

		    } else {

	
				    data.append("action", 'upload_branch_logo');
				    data.append("branch_id", e.target.form.getAttribute('data-branch-id'));

				    jQuery.ajax({
				        type: "POST",
				        enctype: 'multipart/form-data',
				        url: ajaxurl,
				        data: data,
				        processData: false,
				        contentType: false,
				        cache: false,
				        timeout: 600000,
				        success: function (data) {
				        	var p_data = JSON.parse(data);
				        	if(p_data.file){
				        		if(e.target.parentElement.qs('.add_photo') != null){
				        			e.target.parentElement.qs('.add_photo').style.backgroundImage = 'url('+p_data.url+')';
				        		}
				        		
				        		e.target.parentElement.nextElementSibling.value = p_data.file;
				        		qs('input[name="company_submit"]').click();
				        	}
				        },

			    });
		    }

		});
		// qs('#branches-list-holder').addEventListener('submit', function(e){
		// 	e.preventDefault();




		// })
	}


}


//promocode page
let add_promocode = new eventFormSetter('#create-shortcode', 'add_promocode', template_constructor.add_promocode);
if(qs('.promocode-items') != null){
	qs('.all-promocodes').addEventListener('click', function(e){
		if(e.target.classList.contains('del_promocode')){
			let del_promocode_data = {
				action: 'delete_promocode', 
				promocode_id: e.target.getAttribute('data-promocode-id'),
			};

			jQuery.post(ajaxurl, del_promocode_data, function(data){
					// console.log(data);
					if(data != ''){
						e.target.parentFinder('promocode-item').style.opacity = 0;
						setTimeout(function(){
							e.target.parentFinder('promocode-item').remove();	
						}, 300);

						promocodes_cuont--;
			            if(promocodes_cuont < 4){
			            	if(!qs('.promocodes_warning').classList.contains('hidden')){
				                qs('.promocodes_warning').classList.add('hidden');
				            }

			                qsa('#create-shortcode input').forEach(function(item){item.removeAttribute('disabled', 'disabled')});
			            } 
			            qs('.promocodes-count').innerHTML = promocodes_cuont;

					} else {
						alert('There was an error while removing promocode')
					}

			});
		}
	})

	qs('#send_promocode_number').addEventListener('submit', function(e){
		e.preventDefault();
		var loader = this.qs('.fake_disable');
		loader.classList.remove('hidden');
		ajax_handler({action: 'send_promocode_on_phone', data:jQuery(this).serialize()}, (data) => {
			loader.classList.add('hidden');
			this.qs('[name="recipient"]').value = '';
			this.qs('.send_promo_message').innerHTML = data.message_loc;
			this.qs('.send_promo_message').classList.remove('hidden');

			jQuery(this.qs('.promocode-more')).slideUp();

			setTimeout(() => {
				this.qs('.send_promo_message').classList.add('hidden');
				this.qs('.send_promo_message').innerHTML = '';
			}, 2000);

		})
	});
	qs('#send_promocode_number [name="recipient"]').addEventListener('click', function(e){
		if(!this.value){this.value = '+380'}
		jQuery(this.form.qs('.promocode-more')).slideDown();
	} )


	if(qs('.all-promocodes') != null){
	 	qs('.all-promocodes').addEventListener('click', function(e){
	 		console.log(e.target);
	 		let promoparent = e.target.parentFinder('promocode-item');
	 		jQuery(promoparent).children('.promocode-more').slideToggle();
	 		jQuery(promoparent).children('.promo-prview-wrapper').children('.promocode-open').toggleClass('active');
	 	})
	 }

	if(qs('.promocode-item-select') != null){
	 	qs('.promocode-item-select').addEventListener('click', function(e){
	 		console.log(e.target);
	 		let promoselectparent = e.target.parentFinder('all-promocodes');
	 		jQuery(promoselectparent).children('.promocode-more').slideToggle();
	 		jQuery(promoselectparent).children('.promo-prview-wrapper').children('.promocode-open').toggleClass('active');
	 	})
	 }

}
//promocode page
//company page
if(qs('#company_name') !=  null){
	qs('#company_name').addEventListener('submit', function(e){
		e.preventDefault();
		var form = jQuery('#company_name')[0];

	    var data = new FormData(form);

	    data.append("action", 'add_company');
	    console.log(form);
	    // jQuery("#btnSubmit").prop("disabled", true);

	    jQuery.ajax({
	        type: "POST",
	        enctype: 'multipart/form-data',
	        url: ajaxurl,
	        data: data,
	        processData: false, //prevent jQuery from automatically transforming the data into a query string
	        contentType: false,
	        cache: false,
	        timeout: 600000,
	        success: function (data) {
	            // success
	        },
	    });



	});

}
//company page


//profile page
if(qs('#edit-profile') != null){


	qs('#edit-profile').addEventListener('submit', function(e){
		e.preventDefault();
		 qs('.avis_submit').setAttribute('disabled', 'disabled');
		var form = jQuery('#edit-profile')[0];
    	var data = new FormData(form);
	    data.append("action", 'update_profile');

	    jQuery.ajax({
	        type: "POST",
	        enctype: 'multipart/form-data',
	        url: ajaxurl,
	        data: data,
	        processData: false, 
	        contentType: false,
	        cache: false,
	        timeout: 600000,
	        success: function (data) {
	            // console.log(data);
	            qs('.avis_submit').removeAttribute('disabled');
	        },
	    });
	});

	qs('#edit-profile #upload_image').addEventListener('change', function(e){
		var form = jQuery('#edit-profile')[0];
   		var data = new FormData(form);
		data.append("action", 'upload_branch_logo');
		jQuery.ajax({
	        type: "POST",
	        enctype: 'multipart/form-data',
	        url: ajaxurl,
	        data: data,
	        processData: false, 
	        contentType: false,
	        cache: false,
	        timeout: 600000,
	        success: function (data) {
	        	var p_data = JSON.parse(data);
	        	qs('#edit-profile .add_photo_profile').style.backgroundImage = 'url('+p_data.url+')';
	        	jQuery.post(ajaxurl,{action: 'update_profile_avatar', 'profile-image-hidden': p_data.file})
	        },
	    });



	})



	// function get_profile(){
	// 	ajax_handler({action: 'get_avis_profile'}, function(data){	
	// 		qs('.add_photo_profile').style.backgroundImage = 'url('+data.avatarUrl+')';
	// 		qs('.user-logo img').src = data.avatarUrl;
	// 	});
	// }


}



//profile page
//review page
if(qs('#execution_status')){
	qs('#execution_status').addEventListener('change', function(e){
		if(e.target.parentFinder('trig_submit') != null) {
			console.log(jQuery(this).serialize());
			let obj = {
				action: 'set_rev_execution',
				form_data: jQuery(this).serialize(),
				review_id: rev_id
			}
			ajax_handler(obj, function(data){	
				console.log(data);
			});
		}
	});
}

if(qs('#add_coment')){
	qs('#add_coment').addEventListener('submit', function(e){
		e.preventDefault();
		
		ajax_handler({action: 'add_rev_comment', form_data: jQuery(this).serialize(), rev_id: rev_id}, function(data){	
			console.log(data);
		});


	});
}

//review page



//counter's 
if(qs('.sidebar-sticky') != null){
	let old_data;
	ping_revs();
	setInterval(ping_revs, 5000);
	function ping_revs(){

		ajax_handler({action: 'branch_get_statistic'}, function(data){
			if(JSON.stringify(old_data) != JSON.stringify(data)){
				if(data.error != undefined){
					if(qs('#lout') != null){
						qs('#lout').click();
					}
					window.close();
				}
				if(data.newAuthReviewCount != 0 || data.newNotAuthReviewCount != 0 || data.newConversationCount != 0) {
					jQuery('.menu_button img').attr('src', '/wp-content/uploads/2019/02/menu_button.png');
				} else {
					jQuery('.menu_button img').attr('src', '/wp-content/themes/Avis.help/menu_button-1.png');
				}

				if(data.newAuthReviewCount != 0) {
					if(qs('[data-menu-item-name="authorized_reviews"]') != null) {
						qs('[data-menu-item-name="authorized_reviews"]').classList.remove('hidden');
						qs('[data-menu-item-name="authorized_reviews"]').innerHTML = data.newAuthReviewCount;
					} else if(qs('[data-menu-item-name="avis_identifié"]') != null) {
						qs('[data-menu-item-name="avis_identifié"]').classList.remove('hidden');
						qs('[data-menu-item-name="avis_identifié"]').innerHTML = data.newAuthReviewCount;
					} else if(qs('[data-menu-item-name="Авторизованные_отзывы"]') != null) {
						qs('[data-menu-item-name="Авторизованные_отзывы"]').classList.remove('hidden');
						qs('[data-menu-item-name="Авторизованные_отзывы"]').innerHTML = data.newAuthReviewCount;
					}
				} else {
					if(qs('[data-menu-item-name="authorized_reviews"]') != null) {
						qs('[data-menu-item-name="authorized_reviews"]').classList.add('hidden');
					} else if(qs('[data-menu-item-name="avis_identifié"]') != null) {
						qs('[data-menu-item-name="avis_identifié"]').classList.add('hidden');
					} else if(qs('[data-menu-item-name="Авторизованные_отзывы"]') != null) {
						qs('[data-menu-item-name="Авторизованные_отзывы"]').classList.add('hidden');
					}
				}
				if(data.newNotAuthReviewCount != 0){
					if(qs('[data-menu-item-name="anonymous_reviews"]') != null) {
						qs('[data-menu-item-name="anonymous_reviews"]').classList.remove('hidden');
						qs('[data-menu-item-name="anonymous_reviews"]').innerHTML = data.newNotAuthReviewCount;
					} else if(qs('[data-menu-item-name="avis_anonyme"]') != null) {
						qs('[data-menu-item-name="avis_anonyme"]').classList.remove('hidden');
						qs('[data-menu-item-name="avis_anonyme"]').innerHTML = data.newNotAuthReviewCount;
					} else if(qs('[data-menu-item-name="Анонимные_отзывы"]') != null) {
						qs('[data-menu-item-name="Анонимные_отзывы"]').classList.remove('hidden');
						qs('[data-menu-item-name="Анонимные_отзывы"]').innerHTML = data.newNotAuthReviewCount;
					}
				} else {
					if(qs('[data-menu-item-name="anonymous_reviews"]') != null) {
						qs('[data-menu-item-name="anonymous_reviews"]').classList.add('hidden');
					} else if(qs('[data-menu-item-name="avis_anonyme"]') != null) {
						qs('[data-menu-item-name="avis_anonyme"]').classList.add('hidden');
					} else if(qs('[data-menu-item-name="Анонимные_отзывы"]') != null) {
						qs('[data-menu-item-name="Анонимные_отзывы"]').classList.add('hidden');
					}
				}
				
				if(data.newConversationCount != 0){
					if(qs('[data-menu-item-name="conversations"]') != null) {
						qs('[data-menu-item-name="conversations"]').classList.remove('hidden');
						qs('[data-menu-item-name="conversations"]').innerHTML = data.newConversationCount;
					} else if(qs('[data-menu-item-name="conversation"]') != null) {
						qs('[data-menu-item-name="conversation"]').classList.remove('hidden');
						qs('[data-menu-item-name="conversation"]').innerHTML = data.newConversationCount;
					} else if(qs('[data-menu-item-name="Чаты"]') != null) {
						qs('[data-menu-item-name="Чаты"]').classList.remove('hidden');
						qs('[data-menu-item-name="Чаты"]').innerHTML = data.newConversationCount;
					}
				} else {
					if(qs('[data-menu-item-name="conversations"]') != null) {
						qs('[data-menu-item-name="conversations"]').classList.add('hidden');
					} else if(qs('[data-menu-item-name="conversation"]') != null) {
						qs('[data-menu-item-name="conversation"]').classList.add('hidden');
					} else if(qs('[data-menu-item-name="Чаты"]') != null) {
						qs('[data-menu-item-name="Чаты"]').classList.add('hidden');
					}
				}
			
			} 
			old_data = data;
		});



	}
	ping_revs();
}

// home page
if(qs('.home_page_loggedin') != null){

	qs('#branch-revs-filter').addEventListener('change', function(e){
		this.qs('input[type="submit"]').click();
	});
	qs('#branch-revs-filter').addEventListener('submit', function(e){
		e.preventDefault();
		let loader = qs('.fake_disable');
		loader.classList.remove('hidden');
		ajax_handler({action: 'get_stats',  form_data: jQuery(this).serialize()}, function(data){
			console.log(data.npsResponse);




			for(item in data.npsResponse){
				console.log(item);
				if(qs('.nps-item.'+ item + ' .nps-procent') != null){	
					qs('.nps-item.'+ item + ' .nps-procent').innerHTML = data.npsResponse[item]+'%';
					qs('.nps-item.'+ item + ' .progress').style.width = data.npsResponse[item]+'%';
				} else if (item === 'nps') {
					var loc_ov_mark = 0
					var count = 0;
					if(data.npsResponse[item] > 0){
						loc_ov_mark = data.npsResponse[item]+1	
					} else {
						loc_ov_mark = data.npsResponse[item]-1
					}

					setInterval(function(){
							if(count != loc_ov_mark){
								qs('#overall_mark').innerHTML = count;
								if(loc_ov_mark > 0){
										count++;
								} else {
									count--;
								}
							}
					}, 50);

				} else if (item === 'color') {
					qs('.stat-circle circle.progress').style.stroke = '#'+data.npsResponse[item];
				}

			}


			loader.classList.add('hidden');
			if(data.error === undefined){
			qs('.total_revs').innerHTML = data.reviews;
			
			qs('.total_convs').innerHTML = data.conversations;

			qs('.rating_progress').style.width = ((data.stars * 100) / 5) + '%';
			if(!isNaN(data.stars)){
				qs('.marks').innerHTML = data.stars;
			} else {
				qs('.marks').innerHTML = '';
				qs('.rating_progress').style.width = '0';
			}

				if(myChart){
					myChart.destroy();
				}
			
				// console.log(data.reviewHourStats);
				let lables = [];
				let datasets = [];
				datasets.push(0);
				let date_format;
				if(qs('.checkboxes_wrapper input[data-date="day"]').checked){
					date_format = 'HH:00';
					lables.push('00:00');
				} else {
					date_format = 'MM.DD';
					lables.push('00.00');
				}

				data.reviewHourStats.forEach(function(item){
					lables.push(moment.unix(item.date).format(date_format));
					datasets.push(item.count);
				})

				myChart = new Chart(ctx, {
				    type: 'line',
				    data: {
				      labels: lables,
				      datasets: [{
				        data: datasets,
				        lineTension: 0.4,
				        backgroundColor: 'transparent',
				        borderColor: '#ce5e5e',
				        borderWidth: 4,
				        pointBackgroundColor: '#ce5e5e'
				      }]
				    },
				    options: {
				      scales: {
				        yAxes: [{
				          ticks: {
				            beginAtZero: true
				          }
				        }]
				      },
				      legend: {
				        display: false
				      }
				    }
				  })

			// console.log(ctx);

		} else {
			qs('.total_revs').innerHTML = '0';
			
			qs('.total_convs').innerHTML = '0';
		}
		});	





	})
	qs('.fake_middle').click();

}

if(qs('.profile_pass_input') != null){
  qs('.profile_pass_input img').onclick = function(){
  //   this.parentElement.qs('input[type="password"]').type = 'text' 
    if(this.parentElement.qs('input').type === 'password' ){
      this.parentElement.qs('input').type = 'text';
      this.src = '/wp-content/themes/Avis.help/eye_hide.png'
    } else {
      this.parentElement.qs('input').type = 'password';
      this.src = '/wp-content/themes/Avis.help/eye_view.png'
    }

  }
}






Vue.component("stat-circle", {
  template: "#stat-circle",
  props: ["percentage"]
});

new Vue(
{
  el: "#nps",
  mounted: function() {
    var $statCircle = document.querySelectorAll(".stat-circle circle");
    for (var i = 0; i < $statCircle.length; i++) {
      var p = parseFloat($statCircle[i].dataset.percentage);
      var off = -51 -((51 / 100) * p);
      new TweenMax.to($statCircle[i], .8, {
        strokeDashoffset: off
      });
    }
  }
});

if(qs('.export') != null){
	qs('.export .avis_submit').addEventListener('click', function(e){
		jQuery('.modal-overlay').fadeIn(400);
	});
	qs('.modal-window .close').addEventListener('click', function(e){
		jQuery('.modal-overlay').fadeOut(400);
	});
}
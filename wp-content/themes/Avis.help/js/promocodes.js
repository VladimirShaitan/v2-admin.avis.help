// Promocode table
if(qs('#promocodes-table') != null){
	jQuery(document).ready(function() {
	let tab_trnsl;
	if(lang === 'ru_RU'){
		tab_trnsl = {
	       	search: "",
	        lengthMenu:    "_MENU_",
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
	} else if(lang === 'fr_FR'){
		tab_trnsl = {
	        processing:     "Traitement en cours...",
	        search:         "",
	        lengthMenu:    "_MENU_",
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
	} else {
		tab_trnsl = {
	       	search: "",
	        lengthMenu:    "_MENU_",
	        info:           "Shown from _START_ to _END_ of _TOTAL_ elements",
	        infoEmpty:      "",
	        loadingRecords: "Loading",
	        emptyTable:     "No data in table",
	        paginate: {
	            first:      "First",
	            previous:   "<",
	            next:       ">",
	            last:       "Last"
	        },
	        aria: {
	            sortAscending:  ": Sort Ascending",
	            sortDescending: ": Sort descending"
	    	}
		}
 	}

		jQuery('#promocodes-table').DataTable({
			"searching": false,
			"language": tab_trnsl,
			"ordering": false,
		});
	})
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
 		jQuery.post(ajaxurl, promoData, function(resp){
 			let responce = JSON.parse(resp);
 			console.log(responce);
 			if(responce.success){
 				location.href = success_url;
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
		// separateDialCode: true,
		
	});
} 
	let tab_trnsl;
	let order;
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
	    order = 'dsc';
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
    	order = 'asc';
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
		order = 'asc';
 	}

	// jQuery(document).ready(function() {
	// } );

	jQuery(document).ready(function() {
	    jQuery('#table_reviews').DataTable( {
	        "order": [[ 1, "desc" ]],
	        "language": tab_trnsl,
	        "aaSortingFixed": [[0, "desc"]],
	        "search": false
	    })

	    jQuery('#table_qr').DataTable( {
	        "ordering": false,
	        "language": tab_trnsl,
	    } )

	   	jQuery('#promocodes-table').DataTable( {
			"searching": false,
			"language": tab_trnsl,
			"ordering": true,
	    } )
	} );

	setTimeout(function(){
		if(qs('.dataTables_wrapper label') != null) {
			qs('.dataTables_wrapper label').onclick = function() {return false}
		}
	}, 500)



if(qs('#table-select-filter') != null) {
	qs('#table-select-filter').parentElement.addEventListener('click', function(e){
		if(e.target.getAttribute('data-value') != null){
			qs('.fake_disable').classList.remove('hidden');
			const branchId = e.target.getAttribute('data-value'); 
			const tBody = qs('#table_reviews tbody');
			let filteredRows = [];

			// Filter array of reviews by branch id
			if(branchId != 'all'){
				tableRows.forEach((item) => {
					if (item.getAttribute('data-branch-id') === branchId) { 
						filteredRows.push(item);
					}
				});
			} else {
				filteredRows = tableRows;
			}

			// Destroy instance of DataTable
			jQuery('#table_reviews').DataTable().destroy();

			// Clear table body
			tBody.innerHTML = '';

			// Alter the data of filtered array
			filteredRows.forEach((item) => {
				tBody.appendChild(item);
			});

			// Create new instance of DataTable
			jQuery('#table_reviews').DataTable( {
		        "order": [[ 1, "desc" ]],
		        "language": tab_trnsl,
		        "aaSortingFixed": [[0, "desc"]],
		        "search": false
		    });

		    jQuery('select[name=table_reviews_length]').niceSelect();
		    qs('.dataTables_wrapper label').onclick = function() {return false}

		    qs('.fake_disable').classList.add('hidden');
		}
	});
}
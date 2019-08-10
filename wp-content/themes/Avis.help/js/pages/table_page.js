qs('#table-select-filter').parentElement.addEventListener('click', function(e){
	if(e.target.getAttribute('data-value') != null){
		// console.log(e.target.getAttribute('data-value'));
		qs('#table_reviews_filter input[type=search]').value = e.target.getAttribute('data-value'); 
		// jQuery('#table_reviews_filter input[type=search]').keydown();
	}
});


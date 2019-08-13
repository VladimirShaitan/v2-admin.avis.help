// Filter qr's by branches
qs('#cta-branch-filter').parentElement.addEventListener('click', function(e){
	if(e.target.getAttribute('data-value') != null){
		const branchId = e.target.getAttribute('data-value');
		const filterItems = qsa('#qr-filter .branch-item');

			filterItems.forEach((item) => {
				if(item.getAttribute('data-branch-id') != branchId && branchId != 'all'){
					item.classList.add('hidden');
				} else {
					item.classList.remove('hidden');
				}
			});

			const active_el = qs('#qr-filter .branch-item:not(.hidden)');

			if(active_el != null){
				filterItems.forEach((item) => {item.classList.remove('active')});
				active_el.click();
			}
	}
});

// Filter answers by qr's
qs('#qr-filter').addEventListener('click', function(e) {
	if(e.target.classList.contains('branch-item')){
		e.target.classList.add('active');
	}
});
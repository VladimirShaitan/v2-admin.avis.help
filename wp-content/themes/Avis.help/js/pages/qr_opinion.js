qs('body').addEventListener('click', function(e){
	if(!e.target.parentFinder('opinion_cats_wrapper')){
		qs('#op_cats').classList.remove('open');		
	}
})

qs('#op_cats').addEventListener('click', function(e) {
	// this.classList.add('open');

		// console.log(e.target)
	if(e.target.classList.contains('current')){
		this.classList.toggle('open');
	}


	if(e.target.getAttribute('data-autoclose') != null || !e.target.parentFinder('opinion_cats_wrapper')){
		if(e.target.getAttribute('data-autoclose') != null) {
			console.log(e.target);
			qs('#add_opinion #selected_value').innerHTML = e.target.qs('input').value
		}
		this.classList.remove('open');
	}

	if(e.target.classList.contains('edit_op_cat')){
		let icHolder = e.target.parentFinder('icons_holder'); 
		e.target.parentFinder('option').qs('input');


		icHolder.qs('.before_edit').classList.add('hidden');
		icHolder.parentElement.qs('input').style.pointerEvents = 'all';
		icHolder.qs('.while_edit').classList.remove('hidden');
	}

	if(e.target.classList.contains('save_edited')){
		let icHolder = e.target.parentFinder('icons_holder');

		icHolder.qs('.before_edit').classList.remove('hidden');
		icHolder.parentElement.qs('input').style.pointerEvents = 'none';
		icHolder.qs('.while_edit').classList.add('hidden');

		qs('.list-loader').classList.remove('hidden');

		//send request here


		// end of request

		setTimeout(function(){
			qs('.list-loader').classList.add('hidden');
		}, 1000)


	}

	if(e.target.classList.contains('create_cat_submit')){
		let inp = e.target.parentElement.qs('input');
		if(inp.value != ''){
			qs('.list-loader').classList.remove('hidden');
			const data = {
				value: inp.value,
				translate: {
					save: 'Save'
				}
			} 
			inp.value = '';

			setTimeout(function(){
				qs('.op_cat_list').appendChild(template_constructor.add_op_category(data));
				qs('.list-loader').classList.add('hidden');
			}, 1000)
		}


	}

	if(e.target.classList.contains('remove_op_cat')){
		let option = e.target.parentFinder('option');
		let catName = option.getAttribute('data-value');
		qs('.list-loader').classList.remove('hidden');
		// request



		// request end

		setTimeout(function(){
			option.remove();
			qs('.list-loader').classList.add('hidden');
		}, 1000)


	}


});


qs('.add_qr_cat').addEventListener('click', function(){
	qs('.create_op_cat').classList.toggle('hidden');
});
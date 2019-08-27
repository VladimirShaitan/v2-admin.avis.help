let ln = lang.split('_')[0];
let translation = {
    ru: {
        delete: 'Удалить',
        due_date: 'Действителен',
        days:'дн.',
        delete_bransh: 'Вы уверены, что хотите удалить этот филиал?',
        yes:'Да',
        no:'Нет'
    },
    en: {
        delete: 'Delete',
        due_date: 'Valid',
        days:'days',
        delete_bransh: 'Are you sure that you want to delete this branch ?',
        yes:'Yes',
        no:'No'
    },
    fr: {
        delete: 'Effacer',
        due_date: 'Jusque',
        days:'jours',
        delete_bransh: 'Êtes-vous sûr de vouloir supprimer cet emplacement?',
        yes:'Oui',
        no:'Non'
    }
}
let template_constructor = {
	add_branch: function(data){ 
		let template = '';
                template += '<div class="br_del_mes hidden">'+translation[ln].delete_bransh +'<span><span class="del_branch_trigger"  data-branch-id="'+data.id+'">'+translation[ln].yes +'</span><span class="close_rm_br">'+translation[ln].no +'</span></span></div>';
                template += '<div class="branch_header_wrapper row">'
                template += '<div class="branch_header_logo col-2">';
                template += '<form data-branch-id="'+data.id+'">';
                template += '<label><div class="b_logo_img_wrapper">';
                template += '<div class="branch_url" style="background-image:url('+data.logoUrl+')"></div></div>';
                template += '<input class="hidden" type="file" name="branch-logo" multiple="false" accept="image/*">';
                template += '</label></form></div>';
                template += '<div class="branch_header_info col-10 p-0"><h4>'+data.name+'<div class="del_branch"></div></h4>';
                template += '<table class="table-borderless">';
                template += '<tbody><tr><td>'+data.name+'</td></tr>';
                template += '<tr><td>'+data.contact+'</td></tr>';
                template += '<tr><td><a href="tel:'+data.phone+'">'+data.phone+'</a></td></tr>';
                template += '</tbody></table></div>';
                template += '</div>';
                template += '<div class="qrs_wrapper">';
                data.qrCodes.forEach(function(qr){
                        template += '<div class="qr">';
                        template += '<h6>'+qr.qrType+'</h6>';
                        template += '<div class="qr-img-wrapper">';
                        template += '<img width="100%" height="100%" draggable="false" src="'+qr.qrUrl+'">';
                        template += '</div>';
                        template += '<div class="caption">'+qr.humanReadableId+'</div>';
                        template += '</div>';   
                })
                let template_holder = document.createElement('div');
                template_holder.className = 'acc-home-wrapper branches-wrapper';
                template_holder.style.display = 'none';
                template_holder.innerHTML = template;
                if(qsa('#branches-list-holder .branches-list-holder .acc-home-wrapper').length === 0){
                   qs('#branches-list-holder .branches-list-holder').appendChild(template_holder);                        
                } else {
                     qs('#branches-list-holder .branches-list-holder').insertBefore(template_holder, qs('#branches-list-holder .branches-list-holder .acc-home-wrapper'))   
                }
                template_holder.style.display = 'block';

                qsa('#new_branch input').forEach(function(i){
                        i.removeAttribute('disabled');
                })
                qs('#new-branch').reset();
                qs('#reg_branch_logo .branch_url').style.backgroundImage = 'url(/wp-content/themes/Avis.help/logo.png)';
	},
    add_promocode: function(data){
        console.log(data);
            let template = '';
            template += '<div class="promo-prview-wrapper">';
            template += '<div><i class="fas fa-'+data.data.icon+'"></i>';
            template += '<span class="promocode-name">'+data.data.name+'</span></div>';
            template += '<span class="promocode-open"><i class="fas fa-chevron-down"></i></span></div>';
            template += '<div class="promocode-more"><div class="description_promocode">'+data.data.description+'</div>';
            template += '<div class="date_promocode">'+translation[ln].due_date +' '+data.data.lifeTime+' '+translation[ln].days+'</div>';
            template += '<div data-promocode-id="'+data.message.id+'" class="del_promocode avis_submit">'+translation[ln].delete +'</div></div>';

            let template_holder = document.createElement('li');
            template_holder.className = 'promocode-item';
            template_holder.style.display = 'none';
            template_holder.innerHTML = template;
            // qs('#promocode-items').appendChild(template_holder);                        
            template_holder.style.display = 'flex';
                if(qsa('#promocode-items li').length === 0){
                   qs('#promocode-items').appendChild(template_holder);                        
                } else {
                     qs('#promocode-items').insertBefore(template_holder, qs('#promocode-items li'))   
                }
            qsa('#create-shortcode input').forEach(function(i){
                i.removeAttribute('disabled');
            })
            qs('#create-shortcode').reset();

            promocodes_cuont++;
            qs('.promocodes-count').innerHTML = promocodes_cuont;

    },
    add_op_category: function(data){
        let template = '';

        template += '<input class="name" data-old-value="'+data.value+'" value="'+data.value+'">';
        template += '<div class="icons_holder">';
        template += '<div class="before_edit">';
        template += '<span class="func_btn edit_op_cat">';
        template += '<img src="/wp-content/uploads/2019/08/olivets.png">'
        template += '</span>&nbsp;';
        template += '<span class="func_btn remove_op_cat">';
        template += '<img src="/wp-content/uploads/2019/08/urna.png">'
        template += '</span>';
        template += '</div>';
        template += '<div class="while_edit hidden">';
        template += '<span class="save_edited">'+data.translate.save+'</span>';
        template += '</div>';
        template += '</div>';

        let item = document.createElement('li');
        item.setAttribute('data-autoclose', 'true');
        item.setAttribute('data-value', data.value);
        item.className = 'option';
        item.innerHTML = template;

        return item;
    }
}

let message_handler = {
	send_message: function(mes, promocode, invite){
		console.log(promocode);
		let obj = {};
		if(!invite){
			if(!mes){	
				qs('.chat-body').appendChild(this.construct_message('to', promocode.message));
				// let obj = {
					obj.content = promocode.message + ' %PromoCodeLink%';
					obj.messageType = "PROMOCODE";
					obj.reviewId = rev_id;
					obj.sender = topic;
					obj.promoId = promocode.id;
				// };
				// console.log(obj);
			} else {
				qs('.chat-body').appendChild(this.construct_message('to', mes));
				// let obj = {
					obj.content = mes;
					obj.messageType = "CHAT";
					obj.reviewId = rev_id;
					obj.sender = topic;
				// };
			}
		} else {
			qs('.chat-body').appendChild(this.construct_message('to', mes));
			// let obj = {
				obj.content = mes;
				obj.messageType = "CHATINVITE";
				obj.reviewId = rev_id;
				obj.sender = topic;
			// };
		}


		client.send( "/app/chat/"+rev_id+"/sendMessage", {priority: 9}, JSON.stringify(obj) )
	},
	receive_message: function(mes){
		qs('.chat-body').appendChild(this.construct_message('from', mes));
	},
	construct_message: function(from, mes){
		let div = document.createElement('div');
		div.className = 'message-wrapper ' + from;
		let template = '<div class="message-wrapper '+from+'"><div class="message">'+mes+'</div></div>';
		div.innerHTML = template; 
        return div;
	},
	// Chat invite from promocode menu on review page
	chat_invite_prm_btn: function(e){
			if (e.target.classList.contains('chat-wrapper')){
				let chat_data = e.target.getAttribute('data-chat-url');
				console.log(chat_data);
				this.send_message(invite_chat_mes + branch_name + ' '+chat_data, false, true);
			}
			else {
				let data_holder = e.target.parentFinder('chat-wrapper');
				let chat_data = data_holder.getAttribute('data-chat-url');
				console.log(chat_data);
				this.send_message(invite_chat_mes + branch_name + ' '+chat_data, false, true);
			}
		
			jQuery('.promo-code-wrapper').removeClass('active');
			jQuery('.add-promo-code').removeClass('opened');

	},
	chat_invite: function(e){
		if(!is_chat){
			let chat_data = e.target.getAttribute('data-chat-url');
			this.send_message(invite_chat_mes + branch_name + ' '+chat_data, false, true);
		}
	}
}

// if(qs('#chat_eneable') != null){

	var client;
	connect();
	//setInterval(connect, 25000); 


	function connect(){	
		client = Stomp.client('ws://qrticket-env.pymmzmsf4z.eu-west-3.elasticbeanstalk.com/ws/websocket');

		client.ws.addEventListener('open', function(){
			console.log('connection open');
		       
	   		let obj_ping = {
				content: 'Admin connected',
				messageType:"CHAT",
				reviewId: rev_id,
				sender: topic
			};

			client.send("/app/chat/online/connectUser", {priority: 9}, JSON.stringify(obj_ping));

		});
		client.ws.addEventListener('close', function(){
			console.log('closed connection');
			connect();
		});

		client.heartbeat.incoming = 25000;
		client.heartbeat.outgoing = 25000;
		var destination = '/channel/'+topic;


		client.connect('', '', function(frame) {
	       client.debug("connected to Stomp");
	       client.subscribe(destination, function(message) {
			 

			 let mes = JSON.parse(message.body);
			 // console.log(JSON.parse(message.body));
			 if(mes.messageType === "CHAT"){
			 	message_handler.receive_message(mes.content);
			 }

	       });
		     // client.heartbeat.outgoing = 5000;
	     }, function(error) {
	        console.log("STOMP protocol error " + error);
	}, function(){console.log('connection closed')});
		return client;
	}

	qs('#send_message').addEventListener('submit', function(e){
		e.preventDefault();
		// console.log('12312312'); 
		let message = this.qs('input[type="text"]').value;
		if(message != ''){
		   this.reset();
		   message_handler.send_message(message);
		}
	});

	jQuery(document).ready(function(){
	    jQuery('.chat-body').scrollTop(jQuery('.end').offset().top);
	});
	jQuery('form').submit(function(){
	    jQuery('.chat-body').animate({ scrollTop: 10000 }, 3000);
	});

// }
	


	//send promocode
if(qs('#promo_codes')){
	// qs('#promo_codes').addEventListener('click', function(e){
		// console.log('trig');
		qs('.prms-wrapper').addEventListener('click', function(e){
			if(e.target.classList.contains('prm-wrapper')){
				// console.log(e.target.getAttribute('data-promo-id'));
				let promocode_data = {
					id: e.target.getAttribute('data-promo-id'),
					message: e.target.getAttribute('data-promo-name'),
					icon: e.target.getAttribute('data-promo-icon')
				}
				// console.log(promocode_data);
				message_handler.send_message(false, promocode_data);

			} 
			else {
				let data_holder = e.target.parentFinder('prm-wrapper');
				let promocode_data = {
					id: data_holder.getAttribute('data-promo-id'),
					message: data_holder.getAttribute('data-promo-name'),
					icon: data_holder.getAttribute('data-promo-icon')
				}
				// console.log(promocode_data);
				message_handler.send_message(false, promocode_data);
			}
			jQuery('.promo-code-wrapper').removeClass('active');
			jQuery('.add-promo-code').removeClass('opened');
		})
// invite to chat in promocode block
// qs('.chat-wrap').addEventListener('click', function(e){
// 		message_handler.chat_invite_prm_btn(e);
// 	})
}




jQuery(document).ready(function(){
    jQuery('.chat-body').animate({ scrollTop: 10000 }, 3000);
});
jQuery('form').submit(function(){
    jQuery('.chat-body').animate({ scrollTop: 10000 }, 3000);
});
jQuery('#promo_codes').click(function(){
    jQuery('.chat-body').animate({ scrollTop: 10000 }, 3000);
});
//send promocode
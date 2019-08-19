пара<?php 
    class avis_helper{

	   function __construct() {
	       	if(!empty($_COOKIE['avis_auth'])){
				$this->avis_creds = json_decode(base64_decode(stripslashes($_COOKIE['avis_auth'])));
				$this->request_authorized_header = array(
					"accept: */*",
					"Content-Type: application/json",
                    "Connection: close",
					"Authorization:".$this->avis_creds->token_type.' '.$this->avis_creds->avis_token
				);

                $this->request_authorized_header_file = array(
                    "accept: */*",
                    "Content-Type: multipart/form-data",
                    "Connection: close",
                    "Authorization:".$this->avis_creds->token_type.' '.$this->avis_creds->avis_token
                );
			}
	   }

    	private $api_url = 'https://qrticket-env.pymmzmsf4z.eu-west-3.elasticbeanstalk.com';
    	private $request_headers = array("accept: */*", "Content-Type: application/json", "Connection: close");
        private $request_headers_file = array("accept: */*", "Content-Type: multipart/form-data");

		private $auth = array(
			'auth_user' => '/api/v0/auth/signin', 
			'register_user' => '/api/v0/auth/signup'
		);

		private $branches = array(
			'get_my_branches' => '/api/v0/branch/getMyBranches', 
			'register_branch' => '/api/v0/branch/register_branch',
			'delete_branch' => '/api/v0/branch/deleteBranch/',
            'get_statistic' => '/api/v0/branch/getStatistic',
            'get_stats' => '/api/v0/branch/getStats/',
            'save_logo' => '/api/v0/branch/update_branch_avatar'
		);


		private $promocodes = array(
			'add' => '/api/v0/promocode/add', 
			'delete' => '/api/v0/promocode/delete/',
			'get_user_promocodes' => '/api/v0/promocode/getAll',
            'get_promocode_by_id' => '/api/v0/promocode/getOnePromo',
            'send_prmocode_mob' => '/api/v0/promocode/send'

		);

		private $user = array(
			'info_update' => '/api/v0/user/user/update',
			'avatar_update' => '/api/v0/user/user/updateAvatar',
            'me' => '/api/v0/user/user/me'
		);

		private $review = array(
			'get_all' => '/api/v0/review/getAllReviews',
            'get_single' => '/api/v0/review/getReview/',
            'get_rev_with_conversation' => '/api/v0/review/getReviewsWithConversation',
            'set_status' => '/api/v0/review/setStatus/',
            'set_viewed' => '/api/v0/review/setViewed/',
            'add_comment' => '/api/v0/review/addComment/'
		);

        private $chat = array(
            'chat_history' => '/api/v0/chat/getChatHistoryWeb/'
        );

        private $organization = array (
            'update_organization' => '/api/v0/organization/updateOrganization',
            'get' => '/api/v0/organization/getOrganization'
        );

    	public function curl_request($api_url, $req_headers, $data = false, $method = false){  
    	// if ($method = true) => POST
    		$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $api_url);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 5);
			if($method === 'post'){
				curl_setopt($ch, CURLOPT_POST, true);
                if($data){
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                }
			} elseif($method === 'delete'){
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
			} elseif($method === 'patch'){
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
				if($data){
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                }
			}
			curl_setopt($ch, CURLOPT_HTTPHEADER, $req_headers);
			return curl_exec($ch);
    	}

        public function makeCurlFile($file){
            $mime = mime_content_type($file);
            $info = pathinfo($file);
            $name = $info['basename'];
            $output = new CURLFile($file, $mime, $name);
            return $output;
        }


    	public function authenticate_user($user_credentials){ 
    		$request_url = $this->api_url.$this->auth['auth_user'];
			$request_result = $this->curl_request($request_url, $this->request_headers, $user_credentials, 'post');
    		return json_decode($request_result);
    	}

    	public function get_my_branches(){
    		$request_url = $this->api_url.$this->branches['get_my_branches'];
    		$result = $this->curl_request($request_url, $this->request_authorized_header);
    		return json_decode($result);
    	}

    	public function register_branch($branch_data){
    		$request_url = $this->api_url.$this->branches['register_branch'];
    		$result = $this->curl_request($request_url, $this->request_authorized_header_file, $branch_data, 'post');
    		return $result;
    	}

    	public function delete_branch($branch_data){
    		$request_url = $this->api_url.$this->branches['delete_branch'].$branch_data;
    		$result = $this->curl_request($request_url, $this->request_authorized_header, false, 'delete');
    		return $result;
    	}


    	public function get_user_promocodes(){
    		$request_url = $this->api_url.$this->promocodes['get_user_promocodes'];
    		$result = $this->curl_request($request_url, $this->request_authorized_header);
    		return json_decode($result);
    	}

    	public function add_promocode($promocode_data){
    		$request_url = $this->api_url.$this->promocodes['add'];
    		$result = $this->curl_request($request_url, $this->request_authorized_header, $promocode_data, 'post');
    		return $result;
    	}

    	 public function delete_promocode($promocode_data){
    		$request_url = $this->api_url.$this->promocodes['delete'].$promocode_data;
    		$result = $this->curl_request($request_url, $this->request_authorized_header, false, 'delete');
    		return $result;
    	}

    	public function upadte_user_info($user_info){
    		$request_url = $this->api_url.$this->user['info_update'];
    		$result = $this->curl_request($request_url, $this->request_authorized_header, $user_info, 'patch');
    		return $result;
    	}

    	public function get_all_reviews(){
    		$request_url = $this->api_url.$this->review['get_all'];	
    		$result = $this->curl_request($request_url, $this->request_authorized_header);
    		return $result;
    	}


        public function get_single_review($id){
            $request_url = $this->api_url.$this->review['get_single'].$id; 
            $result = $this->curl_request($request_url, $this->request_authorized_header);
            return json_decode($result);
        }

        public function get_rev_with_conversation(){
            $request_url = $this->api_url.$this->review['get_rev_with_conversation']; 
            $result = $this->curl_request($request_url, $this->request_authorized_header);
            return json_decode($result);
        }


        public function getChatHistoryWeb($rev_id){
            $url = $this->api_url.$this->chat['chat_history'].$rev_id;
            $result = $this->curl_request($url, $this->request_headers);
            return json_decode($result);
        }

        public function update_organization($organization_info){
            $url = $this->api_url.$this->organization['update_organization'];
            // return $organization_info;

            $result = $this->curl_request($url, $this->request_authorized_header_file, $organization_info, 'post');
            return $result;
        }

        public function get_organization(){
            $url = $this->api_url.$this->organization['get'];
            $result = $this->curl_request($url, $this->request_authorized_header);
            return $result;
        }

        public function user_avatar_update($avatar){
            $url = $this->api_url.$this->user['avatar_update'];
            $result = $this->curl_request($url, $this->request_authorized_header_file, $avatar, 'post');
            return $result;
        }

        public function get_my_acc(){
            $url = $this->api_url.$this->user['me'];
            $result = $this->curl_request($url, $this->request_authorized_header);
            return $result;
        }

        public function user_info_update($user_info){
            $url = $this->api_url.$this->user['info_update'];
            $result = $this->curl_request($url, $this->request_authorized_header, $user_info, 'patch');
            return $result;            
        }

        public function set_rev_status($rev_status, $rev_id){
            $url = $this->api_url.$this->review['set_status'].$rev_id.'?executionStatus='.$rev_status;
            $result = $this->curl_request($url, $this->request_authorized_header, false, 'post');
            return $result;            
        }            
        

        public function add_rev_comment($rev_status, $rev_id){
            $url = $this->api_url.$this->review['add_comment'].$rev_id.'?comment='.$rev_status;
            $result = $this->curl_request($url, $this->request_authorized_header, false, 'post');
            return $result;            
        }      


        public function set_rev_viewed($rev_id){
            $url = $this->api_url.$this->review['set_viewed'].$rev_id;
            $result = $this->curl_request($url, $this->request_authorized_header, false, 'post');
            return $result;            
        }    

        public function get_counters($rev_id){
            $url = $this->api_url.$this->branches['get_statistic'];
            $result = $this->curl_request($url, $this->request_authorized_header, false);
            // print_r($url);
            // wp_die();
            return $result;            
        }

        public function get_my_info(){
            $url = $this->api_url.$this->user['me'];
            $result = $this->curl_request($url, $this->request_authorized_header, false);
            return $result;
        }

        public function get_branch_stats($branch_id, $from, $to, $qrType, $type){

            $url = $this->api_url.$this->branches['get_stats'].$branch_id.'?from='.$from.'&to='.$to.'&qrType='.$qrType.'&type='.$type;
            
            $result = $this->curl_request($url, $this->request_authorized_header, false);
            
            print_r($result);
            wp_die();
            
            return $result;
        }


        public function change_branch_logo($avatar){
            $url = $this->api_url.$this->branches['save_logo'];
            $result = $this->curl_request($url, $this->request_authorized_header_file, $avatar, 'post');
            return $result;
        }


        public function send_prmocode_mob($promo_data){
            $url = $this->api_url.$this->promocodes['send_prmocode_mob'].'?promoId='.$promo_data['promocode_id'].'&recipient='.$promo_data['recipient'];
            $result = $this->curl_request($url, $this->request_authorized_header, false, 'post');
            return $result;
        }

        public function get_promocode_by_id($id){
            $url = $this->api_url.$this->promocodes['get_promocode_by_id'].'?promoId='.$id;
            $result = $this->curl_request($url, $this->request_authorized_header);
            return $result;
        }


        public function register($register_data){
            $url = $this->api_url.$this->auth['register_user'];
            $result = $this->curl_request($url, $this->request_headers, $register_data, 'post');
            return $result;
        }



    }


    $avis_helper = new avis_helper();
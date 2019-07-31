<?php 
    class avis_helper{

        private $settings = array(
            'version' => 'v1',
            'url' => 'https://avistest.eu-west-3.elasticbeanstalk.com/api/',
            'request_headers' => array("accept: */*", "Content-Type: application/json", "Connection: close"),
            'request_headers_file' => array("accept: */*", "Content-Type: multipart/form-data"),
        );

	   function __construct() {
	       	if(!empty($_COOKIE['avis_auth'])){
				$this->avis_creds = json_decode(base64_decode(stripslashes($_COOKIE['avis_auth'])));
				$this->settings['request_authorized_header'] = array(
					"accept: */*",
					"Content-Type: application/json",
                    "Connection: close",
					"Authorization:".$this->avis_creds->accessToken
				);

                $this->settings['request_authorized_header_file'] = array(
                    "accept: */*",
                    "Content-Type: multipart/form-data",
                    "Connection: close",
                    "Authorization:".$this->avis_creds->accessToken
                );
			}
	   }

        // private $api_version = 'v1';
        // private $api_url = 'https://avistest.eu-west-3.elasticbeanstalk.com/api/';
        // private $request_headers = array("accept: */*", "Content-Type: application/json", "Connection: close");
        // private $request_headers_file = array("accept: */*", "Content-Type: multipart/form-data");




        public function curl_request($api_url, $req_headers, $data = false, $method = false){  
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

        public function api_url_constructor($key){
            return $this->api_url.$this->api_version.$key;
        }

        private $path_list = array(
            'auth' => array(
                'auth_user' => '/auth/login', 
                'register_user' => '/auth/signup'
            ),
            'branches' => array(),
            'promocodes' => array(),
            'user' => array(),
            'review' => array(),
            'chat' => array(),
            'organization' => array(),
        );

		// private $auth = array(
		// 	'auth_user' => '/auth/login', 
		// 	'register_user' => '/auth/signup'
		// );

		// private $branches = array(
		// 	'get_my_branches' => '/branch/getMyBranches', 
		// 	'register_branch' => '/branch/register_branch',
		// 	'delete_branch' => '/branch/deleteBranch/',
  //           'get_statistic' => '/branch/getStatistic',
  //           'get_stats' => '/branch/getStats/',
  //           'save_logo' => '/branch/update_branch_avatar'
		// );


		// private $promocodes = array(
		// 	'add' => '/promocode/add', 
		// 	'delete' => '/promocode/delete/',
		// 	'get_user_promocodes' => '/promocode/getAll',
  //           'get_promocode_by_id' => '/promocode/getOnePromo',
  //           'send_prmocode_mob' => '/promocode/send'

		// );

		// private $user = array(
		// 	'info_update' => '/user/user/update',
		// 	'avatar_update' => '/user/user/updateAvatar',
  //           'me' => '/user/user/me'
		// );

		// private $review = array(
		// 	'get_all' => '/review/getAllReviews',
  //           'get_single' => '/review/getReview/',
  //           'get_rev_with_conversation' => '/review/getReviewsWithConversation',
  //           'set_status' => '/review/setStatus/',
  //           'set_viewed' => '/review/setViewed/',
  //           'add_comment' => '/review/addComment/'
		// );

        // private $chat = array(
        //     'chat_history' => '/chat/getChatHistoryWeb/'
        // );

        // private $organization = array (
        //     'update_organization' => '/organization/updateOrganization',
        //     'get' => '/organization/getOrganization'
        // );




    	public function authenticate_user($user_credentials) { 
    		$request_url = $this->api_url_constructor($this->auth['auth_user']);
			$request_result = $this->curl_request($request_url, $this->request_headers, $user_credentials, 'post');
    		return json_decode($request_result);
    	}


        public function api_get($api_path){
            $request_url = $this->api_url_constructor($this->auth['auth_user']);
        }



        public function get_all_reviews() {
            $request_url = $this->api_url.$this->review['get_all']; 
            $result = $this->curl_request($request_url, $this->request_authorized_header);
            return $result;
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
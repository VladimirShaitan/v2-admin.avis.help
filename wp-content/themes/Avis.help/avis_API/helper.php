<?php 
    class avis_helper{

	   function __construct() {
            $this->settings['api_version'] = 'v1';
            $this->settings['api_url'] = 'https://avistest.eu-west-3.elasticbeanstalk.com/api/';
            $this->settings['request_headers'] = array(
                "accept: */*",
                "Content-Type: application/json",
                "Connection: close"
            );
            $this->settings['request_headers_file'] = array(
                "accept: */*",
                "Content-Type: multipart/form-data"
            );
            $this->api_path = json_decode(file_get_contents(__DIR__.'/api_path.json'));


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

        private function path_constructor($key){
            $path = $this->settings['api_url'] . $this->settings['api_version'] . $key;
            return $path;
        }

        public function send($api_url, $req_headers, $data = false, $method = false) {  
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            if($method === 'POST'){
                curl_setopt($ch, CURLOPT_POST, true);
                if($data){
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                }
            } elseif($method === 'DELETE'){
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

        public function makeCurlFile($file) {
            $mime = mime_content_type($file);
            $info = pathinfo($file);
            $name = $info['basename'];
            $output = new CURLFile($file, $mime, $name);
            return $output;
        }


        public function request($key, $data = false, $http_method = false) {
            $url = $this->path_constructor($key);
            $result = $this->send($url, $this->settings['request_headers'], $data, $http_method);
            return $result;
        }

    }


    $avis_helper = new avis_helper();
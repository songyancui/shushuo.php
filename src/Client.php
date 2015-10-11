<?php
    namespace Shushuo;

    use Httpful\Mime;
    use Httpful\Request;
    
    class Client {
        private $_req ;
        const BASE_API_URL = "https://api.shushuo.com/events/"; 
    
        public function __construct($project_id, $project_key){
            if (empty($project_id) || empty($project_key)) {
                echo "#error project_id or project_key is empty";
                return NULL;
            } 

            $this->_req = new Req($project_id, $project_key);
            if ($this->_req == NULL){
                echo "#error create req object failed";
                return NULL;
            }
            
        }

       public function setProjectId($project_id){
            if (empty ($project_id)) {
                echo "#error projectId is empty";
                return NULL;    
            }
            if (empty ($this->_req)) return NULL;

            $return = $this->_req->setProjectId($project_id);
            if ($return == NULL){
                echo "#error setProjectId failed";
                return NULL;
            }
            return TRUE; 
       }



       public function setProjectKey($project_key){
            if (empty ($project_key)) {
                echo "#error projectKey is empty";
                return NULL;    
            }
            if (empty ($this->_req)) return NULL;

            $return = $this->_req->setProjectKey($project_key);
            if ($return == NULL){
                echo "#error setProjectKey failed";
                return NULL;
            }
            return TRUE; 
       }
       
       public function  writeEvent($collection, $strContent){
            if (empty($strContent) || empty($collection)) {
                echo "#error writeEvent collection or content is empty";
                return NULL;
            }

            $url = self::BASE_API_URL."$collection"."/";
            $return = $this->_req->sendContent($url, $strContent);

            return $return;
       }

       public function writeEventBatch($strContent){
            if (empty($strContent)){
                 echo "#error writeEventBatch  content is empty";
                 return NULL ;    
            }
            $url = self::BASE_API_URL;
            $return = $this->_req->sendContentBatch($url, $strContent);

            if (isset($return->code) && ($return->code == 200) && isset($return->body)){
                return $return->body;
            } else {
	            if (isset($return->code) && $return->code == 501){
	                if (!empty($return->body) && !empty(json_decode($return->body))){
		                echo "error# response failed :". $json_decode($return->body)->message;
	                }
	                return null;
                }
            }
        }
    }
?>

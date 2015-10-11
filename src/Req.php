<?php
namespace Shushuo;


use Httpful\Mime;
use Httpful\Request;

class Req{
   private $_project_id;
   private $_project_key;
   private $_template;

   public function __construct($project_id, $project_key){
        if (empty($project_id) || empty($project_key)) {
            return NULL;
        }
        
        $this->_project_id = $project_id;
        $this->_project_key = $project_key;

        $this->createTemplate();
   }

    public function createTemplate(){
        $this->_template = Request::init()
                            ->withXProjectId($this->_project_id)
                            ->withXProjectKey($this->_project_key);
        Request::ini($this->_template);
    }

    public function setProjectId($project_id){
         $this->_project_id = $project_id; 
         $this->createTemplate(); 
         return TRUE;
    }

    public function setProjectKey($project_key){
         $this->_project_key = $project_key; 
         $this->createTemplate(); 
         return True;
    }

    public function sendContent($url, $strContent){
        $return = Request::post($url)->body($strContent)->send();
        if (isset($return->code) && $return->code == 200){
	        return "ok";	 
        } else {
	        if (isset($return->code) && $return->code == 501){
	            if (!empty($return->body) && !empty(json_decode($return->body))){
		            echo "error# response failed :". $json_decode($return->body)->message;
	            }
	            return null;
            }
        }
   }

    public function sendContentBatch($url, $strContent){
        $return = Request::post($url)->body($strContent)->send();
        
   }
}

?>

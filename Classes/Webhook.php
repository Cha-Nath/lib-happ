<?php

namespace Nlib\Happ\Classes;

use Nlib\Happ\Entity\WebhookEntity;
use Nlib\Happ\Interfaces\WebhookInterface;
use nlib\Instance\Traits\InstanceTrait;
use nlib\Log\Traits\LogTrait;
use nlib\Tool\Traits\ClassTrait;

class Webhook implements WebhookInterface {

    use LogTrait;
    use ClassTrait;
    use InstanceTrait;

    protected $_decoded_json;
    protected $_encoded_json;
    protected $_namespace;

    public function __construct() { $this->init(); }

    public function init() : void {

        ignore_user_abort(true);
        set_time_limit(0);

        header("HTTP/1.1 200 OK" , 200);

        $json = file_get_contents('php://input');

        // $this->setEncodedJson($json);
        $this->log([__CLASS__ . '::' . __FUNCTION__ => $json]);
        
        if(!empty($decodedJson = json_decode($json))) if(!is_array($decodedJson)) $decodedJson = [$decodedJson];
        $this->setDecodedJson($decodedJson);
    }

    public function call(array $Webhooks, string $namespace) : void {

        $log = __CLASS__ . '::' . __FUNCTION__;
        foreach($Webhooks as $Webhook) :

            $Webhook = $this->stdClass_recast(WebhookEntity::class, $Webhook);
            $method = 'getSubscriptionType';
            if(empty($type = $Webhook->$method()))
                $this->dlog([$log => 'Method "' . $method . '" cannot be empty.']);

            $actions = explode('.', $type);

            if(!empty($class = $actions[0]) && class_exists($class = $namespace . '\\' . ucfirst($class))) :
                $Class = new $class;
                if(!empty($method = $actions[1]) && method_exists($Class, $method)) :
                    $response = $Class->{$method}($Webhook);
                else :
                    $this->log([$log => 'Method "' . $method . '" not exist in class "' . $class . '".']);
                endif;
            else :
                $this->log([$log => 'Class "' . $class . '" not exist.']);
            endif;

        endforeach;
    }

    #region Getter

    // public function getEncodedJson() : string { return $this->_encoded_json; }
    public function getDecodedJson() : ?array { return $this->_decoded_json; }
    public function getNamespace() : string { return $this->_namespace; }

    #endregion

    #region Setter

    // public function setEncodedJson(string $encoded_json) : self { $this->_encoded_json = $encoded_json; return $this; }
    public function setDecodedJson(?array $decoded_json) : self { $this->_decoded_json = $decoded_json; return $this; }
    public function setNamespace(string $namespace) : self { $this->_namespace = $namespace; return $this; }

    #endregion
}
<?php

namespace Nlib\Happ\Classes;

use Nlib\Happ\Interfaces\WebhookInterface;
use nlib\Log\Traits\LogTrait;

class Webhook implements WebhookInterface {

    use LogTrait;

    protected $_decoded_json;
    protected $_encoded_json;
    protected $_namespace;

    public function __construct() {
        
        ignore_user_abort(true);
        set_time_limit(0);

        header("HTTP/1.1 200 OK" , 200);

        $json = file_get_contents('php://input');

        $this->setEncodedJson($json)->setDecodedJson(json_decode($json));
    }

    public function init() : void {

        foreach($tmps = $this->getDecodedJson() as $request) :
        
            $this->log([__CLASS__ . '::' . __FUNCTION__ => (array) $request]);

            if(!property_exists($request, $property = 'subscriptionType'))
                $this->dlog([__CLASS__ . '::' . __FUNCTION__ => 'Property "subscriptionType" aren\'t exists.']);

            $actions = explode('.', $request->$property);

            if(!empty($class = $actions[0]) && class_exists($class = $this->getNamespace() . ucfirst($class)))
                if(!empty($method = $actions[1]) && method_exists($class, $method)) ;
                    $response = (new $class)->{$method}($request);
        endforeach;
    }

    #region Getter

    public function getEncodedJson() : string { return $this->_encoded_json; }
    public function getDecodedJson() : array { return $this->_decoded_json; }
    public function getNamespace() : string { return $this->_namespace; }

    #endregion

    #region Setter

    public function setEncodedJson(string $encoded_json) : self { $this->_encoded_json = $encoded_json; return $this; }
    public function setDecodedJson(array $decoded_json) : self { $this->_decoded_json = $decoded_json; return $this; }
    public function setNamespace(string $namespace) : self { $this->_namespace = $namespace; return $this; }

    #endregion
}
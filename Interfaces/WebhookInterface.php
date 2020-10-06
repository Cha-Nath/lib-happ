<?php

namespace Nlib\Happ\Interfaces;

interface WebhookInterface {

    /**
     *
     * @return void
     */
    public function init() : void;

    /**
     *
     * @param array $Webhooks
     * @param string $namespace
     * @return void
     */
    public function call(array $Webhooks, string $namespace) : void;

    /**
     *
     * @return string
     */
    // public function getEncodedJson() : string;

    /**
     *
     * @return array
     */
    public function getDecodedJson() : array;

    /**
     *
     * @return string
     */
    public function getNamespace() : string;

    /**
     *
     * @param string $encoded_json
     * @return self
     */
    // public function setEncodedJson(string $encoded_json);

    /**
     *
     * @param array $decoded_json
     * @return self
     */
    public function setDecodedJson(array $decoded_json);

    /**
     *
     * @param string $namespace
     * @return self
     */
    public function setNamespace(string $namespace);

}
<?php

namespace Nlib\Happ\Entity;

use Nlib\ObjectList\Classes\ObjectList;

class WebhookList extends ObjectList {

    public function setObjectList(...$WebhookEntity) : WebhookList { $this->_ObjectList = $WebhookEntity; return $this; }
    
}
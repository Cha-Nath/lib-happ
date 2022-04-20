<?php

namespace Nlib\Happ\Entity;

use Nlib\Happ\Interfaces\WebhookEntityInterface;
use nlib\Orm\Classes\Entity;

class WebhookEntity extends Entity implements WebhookEntityInterface {

    private $_eventID;
    private $_subscriptionID;
    private $_portalID;
    private $_occurredAt;
    private $_subscriptionType;
    private $_attemptNumber;
    private $_objectID;
    private $_changeSource;
    private $_changeFlag;
    private $_propertyName;
    private $_propertyValue;

    #region Getter

    public function getEventID() : string { return $this->_eventID; }
    public function getSubscriptionID() { return $this->_subscriptionID; }
    public function getPortalID() { return $this->_portalID; }
    public function getOccurredAt() { return $this->_occurredAt; }
    public function getSubscriptionType() : string { return $this->_subscriptionType; }
    public function getAttemptNumber() { return $this->_attemptNumber; }
    public function getObjectID() { return $this->_objectID; }
    public function getChangeSource() : string { return $this->_changeSource; }
    public function getChangeFlag() : string { return $this->_changeFlag; }
    public function getPropertyName() : string { return $this->_propertyName; }
    public function getPropertyValue() : string { return $this->_propertyValue; }

    #endregion

    #region Setter

    public function setEventID(string $eventID) : self { $this->_eventID = $eventID; return $this; }
    public function setSubscriptionID($subscriptionID) : self { $this->_subscriptionID = $subscriptionID; return $this; }
    public function setPortalID($portalID) : self { $this->_portalID = $portalID; return $this; }
    public function setOccurredAt($occurredAt) : self { $this->_occurredAt = $occurredAt; return $this; }
    public function setSubscriptionType(string $subscriptionType) : self { $this->_subscriptionType = $subscriptionType; return $this; }
    public function setAttemptNumber($attemptNumber) : self { $this->_attemptNumber = $attemptNumber; return $this; }
    public function setObjectID($objectID) : self { $this->_objectID = $objectID; return $this; }
    public function setChangeSource(string $changeSource) : self { $this->_changeSource = $changeSource; return $this; }
    public function setChangeFlag(string $changeFlag) : self { $this->_changeFlag = $changeFlag; return $this; }
    public function setPropertyName(string $propertyName) : self { $this->_propertyName = $propertyName; return $this; }
    public function setPropertyValue(string $propertyValue) : self { $this->_propertyValue = $propertyValue; return $this; }

    #endregion
}
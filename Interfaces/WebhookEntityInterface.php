<?php

namespace Nlib\Happ\Interfaces;

interface WebhookEntityInterface {

    /**
     *
     * @return string
     */
    public function getEventID() : string;

    /**
     *
     * @return double
     */
    public function getSubscriptionID();

    /**
     *
     * @return double
     */
    public function getPortalID();

    /**
     *
     * @return double
     */
    public function getOccurredAt();

    /**
     *
     * @return string
     */
    public function getSubscriptionType() : string;

    /**
     *
     * @return double
     */
    public function getAttemptNumber();
    
    /**
     *
     * @return double
     */
    public function getObjectID();

    /**
     *
     * @return string
     */
    public function getChangeSource() : string;

    /**
     *
     * @return string
     */
    public function getChangeFlag() : string;

    /**
     *
     * @return string
     */
    public function getPropertyName() : string;

    /**
     *
     * @return string
     */
    public function getPropertyValue() : string;

    /**
     *
     * @param string $eventID
     * @return self
     */
    public function setEventID(string $eventID);

    /**
     *
     * @param double $subscriptionID
     * @return self
     */
    public function setSubscriptionID($subscriptionID);

    /**
     *
     * @param double $portalID
     * @return self
     */
    public function setPortalID($portalID);

    /**
     *
     * @param double $occurredAt
     * @return self
     */
    public function setOccurredAt($occurredAt);

    /**
     *
     * @param string $subscriptionType
     * @return self
     */
    public function setSubscriptionType(string $subscriptionType);

    /**
     *
     * @param double $attemptNumber
     * @return self
     */
    public function setAttemptNumber($attemptNumber);

    /**
     *
     * @param double $objectID
     * @return self
     */
    public function setObjectID($objectID);

    /**
     *
     * @param string $changeSource
     * @return self
     */
    public function setChangeSource(string $changeSource);

    /**
     *
     * @param string $changeFlag
     * @return self
     */
    public function setChangeFlag(string $changeFlag);

    /**
     *
     * @param string $propertyName
     * @return self
     */
    public function setPropertyName(string $propertyName);

    /**
     *
     * @param string $propertyValue
     * @return self
     */
    public function setPropertyValue(string $propertyValue);

}
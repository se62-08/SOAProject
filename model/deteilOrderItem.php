<?php

class deteilOrderItem
{

    public $doid;
    public $oid;
    public $eid;
    public $amount;
    /**
     * User constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getDoid()
    {
        return $this->doid;
    }
    /**
     * @return mixed $doid
     */

    public function setDoid($doid)
    {
        $this->doid = $doid;
    }
    /**
     * @return mixed
     */
    public function getOid()
    {
        return $this->oid;
    }
    /**
     * @return mixed $oid
     */
    public function setOid($oid)
    {
        $this->oid = $oid;
    }
    /**
     * @return mixed
     */
    public function getEid()
    {
        return $this->eid;
    }
    /**
     * @return mixed $eid
     */
    public function setEid($eid)
    {
        $this->eid = $eid;
    }
    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }
    /**
     * @return mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
    /**
     * @return mixed
     */
}

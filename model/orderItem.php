<?php

class orderItem
{
    public $oid;
    public $nameCustomer;
    public $tel;
    public $email;
    public $dateStart;
    public $dateEnd;
    public  $totalprice;
    public $status;
    public $owner;
    /**
     * User constructor.
     */
    public function __construct()
    {
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
    public function getNameCustomer()
    {
        return $this->nameCustomer;
    }
    /**
     * @return mixed $nameCustomer
     */
    public function setNameCustomer($nameCustomer)
    {
        $this->nameCustomer = $nameCustomer;
    }
    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }
    /**
     * @return mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @return mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }
    /**
     * @return mixed $dateStart
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }
    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }
    /**
     * @return mixed $dateEnd
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }
    /**
     * @return mixed
     */
    public function getTotalprice()
    {
        return $this->totalprice;
    }
    /**
     * @return mixed $totalprice
     */
    public function setTotalprice($totalprice)
    {
        $this->totalprice = $totalprice;
    }
    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @return mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
    /**
     * @return mixed 
     */
    public function getOwnwe()
    {
        return $this->owner;
    }
    /**
     * @return mixed $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }
    /**
     * @return mixed 
     */
}

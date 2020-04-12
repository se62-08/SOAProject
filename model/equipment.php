<?php

class equipment
{
    public $eid;
    public $ename;
    public $cid;
    public $price;
    public $path;


    /**
     * User constructor.
     */
    public function __construct()
    {
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
    public function getEname()
    {
        return $this->ename;
    }
    /**
     * @return mixed $ename
     */
    public function setEname($ename)
    {
        $this->ename = $ename;
    }
    /**
     * @return mixed
     */
    public function getCid()
    {
        return $this->cid;
    }
    /**
     * @return mixed $cid
     */
    public function setCid($cid)
    {
        $this->cid = $cid;
    }
    /**
     * @return mixed $cid
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * @return mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }
    /**
     * @return mixed $path
     */
    public function setPath($price)
    {
        $this->path = $path;
    }
    /**
     * @return mixed
     */
}

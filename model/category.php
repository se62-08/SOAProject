<?php

class category
{
    public  $cid;
    public  $cname;

    /**
     * User constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getCid()
    {
        return $this->cid;
    }
    /**
     * @param mixed $cid
     */
    public function setCid($cid)
    {
        $this->cid = $cid;
    }

    /**
     * @return mixed
     */
    public function getCname()
    {
        return $this->cname;
    }

    /**
     * @param mixed $cname
     */
    public function setCname($cname)
    {
        $this->cname = $cname;
    }
    /**
     * @return mixed
     */
}

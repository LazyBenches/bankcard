<?php

namespace LazyBench\BankCard\Element;

use LazyBench\BankCard\Driver\BankCardDriver;

/**
 * Author:LazyBench
 * Date:2018/12/21
 */
class Element
{

    private $driver = null;

    public function __construct(BankCardDriver $driver)
    {
        $this->setDriver($driver);
    }

    public function setDriver(BankCardDriver $driver)
    {
        $this->driver = $driver;
    }

    public function two($param)
    {
        return $this->driver->two($param);
    }

    public function three($param)
    {
        return $this->driver->three($param);
    }

    public function four($param)
    {
        return $this->driver->four($param);
    }
}
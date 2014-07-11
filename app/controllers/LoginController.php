<?php

class LoginController extends BaseController
{

    public function __construct() {
        $this->beforeFilter('csrf', array('on' => 'post'));
        //$this->beforeFilter('auth', array('only' => 'getDashboard'));
    }

    public function getIndex() {
        echo 'test';
    }
}
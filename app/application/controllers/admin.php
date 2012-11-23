<?php

class Admin_Controller extends Member_Controller 
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct() 
    {
        parent::__construct();
        $this->filter('before', 'admin');
    }
}
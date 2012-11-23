<?php

class Member_Controller extends Base_Controller 
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct() 
    {
        parent::__construct();
        $this->filter('before', 'auth');
        Session::put('user',Auth::user()->username);
    }
}
<?php
class systemController extends controller
{
    function index()
    {
        $this->show('view/system/Home');
    }
    function contact()
    {
        $this->show('view/system/Contact');
    }
 
}

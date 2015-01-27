<?php
/**
 * @author ouardisoft
 * 30 nov. 2010
 * 21:04:05
 */
class IsHelper extends Helper{
    var $helpers = array('Session');

    function admin(){
        return $this->Session->check('Auth.Admin.id');
    }
}
?>
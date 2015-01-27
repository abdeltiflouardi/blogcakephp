<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class MembersController extends AppController
{
    var $helpers = array('menu','Js' => array('Jquery'));
	function members_home()
	{
 
	}

        function login()
	{

	}

	function logout()
	{
		$this->redirect($this->AppAuth->logout());
	}

}
?>

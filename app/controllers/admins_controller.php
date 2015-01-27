<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class AdminsController extends AppController
{
    var $helpers = array('menu','Js' => array('Jquery'), 'TabDisplay');
    var $uses = array('Categories');
	function admin_home()
	{
            $this->set('listeCat', $this->Categories->find('all'));
	}

        function login() {
            
        }


	function logout()
	{
		$this->redirect($this->AppAuth->logout());
	}

}
?>

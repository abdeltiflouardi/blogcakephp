<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class AppController extends Controller
{
	var $components = array('AppAuth');
        function beforeRender()
	{
           
		if(!empty($this->params['prefix']))
		{
			$this->layout = $this->params['prefix'];
		}
	}

}
?>

<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class MenuHelper extends Helper{
    function listeCat(){
        App::import('Model', 'Categories');
        $Model = new Categories();
        return $Model->find('all');
    }
}
?>

<?php
class Formc extends AppModel {
    var $name = 'Formc';
    var $useTable = false;
    var $_schema = array(
        'name'		=>array('type'=>'string', 'length'=>100),
        'email'		=>array('type'=>'string', 'length'=>255),
        'details'	=>array('type'=>'text')
    );
    var $validate = array();
    
    function __construct() {

        $this->validate = array(

            'name' => array(
                'rule'=>array('minLength', 1),
                'message'=>__('FieldRequired',true) ),

            'email' => array(
                'rule'=>'email',
                'message'=> __('MustBeValidEmail', true) ),

            'details' => array(
                'rule'=>array('minLength', 1),
                'message'=> __('FieldRequired',true) )

        );
                parent::__construct();
        }

}
?>
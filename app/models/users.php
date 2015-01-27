<?php
class Users extends AppModel {
    var $name = 'users';
    var $hasMany = array(
        'Articles' => Array(
            'className'  => 'Articles'));


}
?>

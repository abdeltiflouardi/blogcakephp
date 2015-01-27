<?php
class Commentaires extends AppModel {
    var $name = 'commentaires';
    var $primaryKey = 'idCom';
    var $belongsTo = array(
        'Articles'=>array(
            'className'=>'Articles',
            'foreignKey' => 'idarticle'));
}
?>

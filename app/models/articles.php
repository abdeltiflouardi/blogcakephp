<?php
class Articles extends AppModel {
    var $name = 'articles';
    var $primaryKey = 'idArticle';
   var $belongsTo = array(
        'Users'=>array(
            'className'=>'Users',
            'foreignKey' => false, 'conditions'=>'Users.idUser=Articles.idUser'));

    var $hasMany = array(
        'Commentaires' => Array(
            'className'  => 'Commentaires', 'foreignKey'=>'idArticle'));
}
?>

<?php
class CategorieController extends AppController {

	var $name = 'Categorie';
        var $uses   =   array('Categories');
        var $layout = '';

        function admin_add() {
           $this->Categories->save(array(
               'libelleCat'=>$this->params['url']['libelleCat'],
               'slugCat'=> Inflector::slug(strtolower($this->params['url']['libelleCat']), '-')
                   )
           );
           echo $this->Categories->getLastInsertId();
	}

	function admin_update() {
           echo $this->Categories->save(array(
               'idCat'=>$this->params['url']['idCat'],
               'libelleCat'=>$this->params['url']['libelleCat']
                   )
           )==true;
	}

        function admin_delete() {
            echo $this->Categories->delete(array(
                'idCat'=>$this->params['url']['idCat']
            ), false) == true;
	}

        function beforeRender()
	{
		$this->layout = array();
	}
}
?>

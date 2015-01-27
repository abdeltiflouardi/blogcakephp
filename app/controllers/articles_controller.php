<?php
class ArticlesController extends AppController {
	var $name = 'Articles';
        var $helpers = array('menu','Js' => array('Jquery'), 'is');
        var $uses = array('Articles');
        var $paginate = array('limit' => 10, 'page' => 1);

        function index() {

	}
      	function details() {
            //$this->Articles->idArticle = 1;
            $this->set('article', $this->Articles->read(null, $this->params['idArticle']));
            //var_dump($art);
	}
        function liste() {
            /*
            $listeCat = array('PHP', 'Java', 'JS', 'xHTML', 'CSS');
            for($i=1; $i<100; $i++):
                $cat = rand(0,4);
                $data = array(
                  'titreArticle'=>'Titre '.$listeCat[$cat] . ' ' .$i,
                    'contenuArticle'=>'Content '.$i,
                    'dateArticle'=>date('Y-m-d h:i:s', strtotime($i.' minute')),
                    'idUser'=>rand(1,2),
                    'idCat'=>$cat+1
                );
                $this->Articles->begin();
                $this->Articles->create();
                $this->Articles->set($data);
                $this->Articles->save();
                $this->Articles->commit();
            endfor;           
            */
            
            //$this->Articles->save(array('idArticle'=>1,'dateArticle'=>date('Y-m-d h:i:s')));

            $where = array();
            if(isset($this->params['idCat']))$where['idcat']=$this->params['idCat'];

            $this->set('liste', $this->paginate('Articles', $where));

	}
}
?>
<?php
class CommentaireController extends AppController {

	var $name = 'Commentaire';
        var $layout = array();
        var $uses = array('Commentaires');
        

        function ajouter() {
        //var_dump($this->params);
        $data = array(
            'idArticle'=>  $this->params['url']["idArticle"],
            'commentaire'=> $this->params['url']["comment"]
        );
        echo $this->Commentaires->save($data)===true;
}

}
?>

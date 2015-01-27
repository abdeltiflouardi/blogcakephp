<?php

if(count($liste)>0):

    foreach($liste as $key=>$value):
$this->Js->get("#commentaire{$value['Articles']['idArticle']}");
$this->Js->event('click',"$(\"#comment{$value['Articles']['idArticle']}\").toggle();");
$this->Js->get("#envoyerCommentBtn{$value['Articles']['idArticle']}");
$this->Js->event('click',"insertComment({$value['Articles']['idArticle']})");

?>
<div class="blockArticles">
    <div class="blockTitres">
       <?php echo $html->link($value['Articles']['titreArticle'],
                    array(
                        'controller' => 'articles',
                        'action' => 'details',
                        'idArticle'=>$value['Articles']['idArticle'],
                        'titleArticle'=>  Inflector::slug($value['Articles']['titreArticle'], '-')
                        )
                    );
       ?>
    </div>
    <div class="blockContenu"><?php echo $value['Articles']['contenuArticle'];?></div>
    <div class="blockInfoArticles">
        <div class="blockCommentairesArticles" id="commentaire<?php echo $value['Articles']['idArticle']; ?>">
            <a href="#">
                <span id="span<?php echo $value['Articles']['idArticle']; ?>">
                <?php echo count($value['Commentaires']); ?>
                </span> commentaire
            </a>
        </div>
        <div class="blockUserArticles"><?php echo $value['Users']['nomUser']?></div>
        <div class="blockDateArticles"><?php echo $value['Articles']['dateArticle']; ?></div>
    </div>

    <div class="clear"></div>

    <div id="comment<?php echo $value['Articles']['idArticle']; ?>" class="commentaire">
        <ul id="listeComment<?php echo $value['Articles']['idArticle']; ?>" class="listeComment">
         <?php foreach ($value['Commentaires'] as $v): ?>

            <li id="commentID<?php echo $v["idCom"];?>">
                <div class="commentContent"><?php echo $v["commentaire"];?></div>
                <div class="commentDel"><a href="javascript:void(0);" onclick="$('#commentID<?php echo $v["idCom"];?>').fadeOut('slow')"><?php echo __('Delete', true); ?></a></div>
                <div class="clear"></div>
            </li>

         <?php endforeach; ?>
        </ul>

        <?php echo "Taper commentaire"; ?><br />
        <textarea id="commentaireText<?php echo $value['Articles']['idArticle']; ?>" name="comm"></textarea><br />
        <input type="button" id="envoyerCommentBtn<?php echo $value['Articles']['idArticle']; ?>" value="Envoyer" />
    </div>
</div>
<?php
    endforeach;

    if(isset($this->params['idCat']))
        $paginator->options( array('url' => array_merge(array('mot'=>'page', 'idCat'=>$this->params['idCat'],'libelleCat'=>$this->params['libelleCat']), $this->passedArgs)) );

echo '<ul class="paginationControl">';
echo $paginator->prev('«', array('tag'=>'li'), null, array('class' => 'disabled','tag'=>'li'));
echo $paginator->numbers(array('separator' => '','tag'=>'li'));
echo $paginator->next('»', array('tag'=>'li'), null, array('class' => 'disabled','tag'=>'li'));
echo '</ul>';

    else:
?>
<div style="border: 1px solid #dd0000; background-color: #FFE4DF;color: #dd0000;font-weight: bold;">
    Aucun article trouvé
</div>
<?php
        endif;
?>
<?php
    //echo $session->flash();

    /*
     * Cat start
     */
    $catContent = "";
    $catContent .= $this->Form->create();
    $catContent .= $this->Form->input('libelleCat', array('after'=>'<a id="linkAddCat" href="#">'.__('add',true).'</a>'));
    $catContent .= $this->Form->end();

    //$catContent = '';
    $catContent .= '<div id="msg"></div>';
    $catContent .= '<table id="tableCat">';
    $catContent .= '<tr>
                <th class="impaire">Categorie ID</th>
                <th class="paire">Libelle</th>
                <th class="impaire">Slug</th>
                <th class="paire">Action</th>
            </tr>
            ';

    foreach($listeCat as $k=>$v){
        $catContent .= '<tr id="catRow'.$v['Categories']['idCat'].'">
                <td class="impaire">'.$v['Categories']['idCat'].'</td>
                <td class="paire"><input id="textCat'.$v['Categories']['idCat'].'" type="text" value="'.$v['Categories']['libelleCat'].'" /></td>
                <td class="impaire">'.$v['Categories']['slugCat'].'</td>
                <td class="paire tdright">
                    <a href="#" onclick="action(\'m\','.$v['Categories']['idCat'].', this)">modifier</a>
                    <a href="#" onclick="action(\'s\','.$v['Categories']['idCat'].', this)">Supprimer</a>
                </td>
               </tr>
               ';
    }

    $catContent .= '</table>';
    /*
     * Cat end
     */

    /*
     * art start
     */
    $artContent = '';
    $artContent .= $this->Form->create();
    $artContent .= $this->Form->input('idArticle', array('after'=>'<a id="linkSearchArt" href="#">'.__('search',true).'</a>'));
    $artContent .= $this->Form->end();
    /*
     * art end
     */

    echo $tabDisplay->render("container",
        array(
            array('title'=>__('Categories', true), 'content'=> $catContent),
            array('title'=>__('Articles', true), 'content'=> $artContent)
        )
    );
?>
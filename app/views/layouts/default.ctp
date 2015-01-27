<?php echo $html->docType('xhtml-trans'); ?> 

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title_for_layout?></title>
<?php echo $html->charset('utf-8'); ?>

<?php 
    echo $html->css(array('global', 'style', 'jquery'));
    echo $scripts_for_layout;

    echo $this->Html->script('jquery-1.4.4');
 ?>
<script type="text/javascript">
		function insertComment(idA){
			var texte = $("#commentaireText"+idA).val();
			$.get("/commentaire/ajouter", { comment: texte , idArticle: idA },
			function success(data){
                                if(eval(data) > 0){
                                    $("#listeComment"+idA).append('<li>'+texte+'</li>');
                                    x = eval($("#span"+idA).text()) + 1;
                                    $("#span"+idA).text(x);
                                    $("#comment"+idA).delay(1000).fadeOut();
                                    
                                }
			});
		}
</script>
</head>
<body>
    <div id="header">
        <?php //var_dump(@$header); ?>
    </div>
    <div id="content">

    <?php echo $content_for_layout ?>
    </div>

    <div id="left">
        <ul class="leftMenu">
            <li class="titleMenu">Menu</li>
            <li><a href="/">Accueil</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>

        <ul class="leftMenu">
            <li class="titleMenu">Catégories</li>
            <?php foreach ($menu->listeCat() as $k=>$v): ?>
            <li>
                    <?php echo $html->link($v['categories']['libelleCat'], array(
                    'controller' => 'articles',
                    'action' => 'liste',
                    'idCat' => $v['categories']['idCat'],
                    'libelleCat' => $v['categories']['slugCat'],
                    'page'=>1,
                    'mot'=>'page'
                    ));
                    ?>
            </li>
            <?php endforeach;?>
        </ul>
    </div>

    <div class="clear"></div>

    <?php echo $this->Js->writeBuffer(); ?>
</body>
</html>
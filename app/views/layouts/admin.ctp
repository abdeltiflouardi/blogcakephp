<?php echo $html->docType('xhtml-trans'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title_for_layout?></title>
<?php echo $html->charset('utf-8'); ?>

<?php
    echo $html->css(array('global', 'style', 'jquery'));
    echo $scripts_for_layout;
 ?>

<script type="text/javascript">
    var blocked = false;
$(document).ready(function() {
    $("#container").tabs({ fxSlide: true, fxSpeed: 'slow' });

    $("#linkSearchArt").bind('click', function(){
        alert($("#CategoriesIdArticle").val());
    });

    $("#linkAddCat").bind('click', function(){
        lib = $("#CategoriesLibelleCat").val();
        replacement = '-';
        slug = lib.replace(/[^0-9a-zA-Z]/g, replacement);
        slug = slug.replace(eval("/"+replacement+"{2,}/g"), replacement);
        slug = slug.replace(eval("/(^"+replacement+")|("+replacement+"$)/g"), '');
        slug = slug.toLowerCase();

        $.get("/admin/categorie/add", { libelleCat: lib },
        function success(data){
                if(eval(data) > 0){
                    $("#msg").text('Insertion éffectuée');
                    $("#tableCat").append('<tr id="catRow'+data+'">'+
                    '<td class="impaire">'+data+'</td>'+
                    '<td class="paire"><input id="textCat'+data+'" type="text" value="'+lib+'" /></td>'+
                    '<td class="impaire">'+slug+'</td>'+
                    '<td class="paire tdright">'+
                    '<a href="#" onclick="action(\'m\','+data+', this)">modifier</a>'+
                    '<a href="#" onclick="action(\'s\','+data+', this)">Supprimer</a>'+
                    '</td>'+
                    '</tr>');
                    $("#msg").delay(500).fadeIn('slow').delay(1000).fadeOut('slow');
                }
        });
    });
});

function action(act, id, obj){
    lib = $("#textCat"+id).val();
    switch(act){
        case 'm':
            $.get("/admin/categorie/update", { libelleCat: lib , idCat: id },
            function success(data){
                    if(eval(data) > 0){                        
                        $("#msg").text('Modification éffectuée');
                        $("#msg").delay(500).fadeIn('slow').delay(1000).fadeOut('slow');
                    }
            });
            break;
        case 's':
            if(!confirm("Voulez-vous vraiment supprimer la catégorie " +lib+ "?"))return;

            $.get("/admin/categorie/delete", { idCat: id },
            function success(data){
                    if(eval(data) > 0){
                        $("#msg").text('Suppression éffectuée');
                        $("#catRow"+id).slideToggle('slow');
                        $("#msg").delay(500).fadeIn('slow').delay(1000).fadeOut('slow');
                    }
            });
            break;
    }
}
</script>
</head>
<body>
<?php echo $content_for_layout ?>
</body>
</html>
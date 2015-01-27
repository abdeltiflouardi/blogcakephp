<?php
/**
* Tab Display Helper
* Manages display of simple tabs based upon JQuery UI tabs
* @author  Paul Earley
* @website http://www.earleyconsultancy.com
* @version 1.0.0
*/

class TabDisplayHelper extends AppHelper {
    var $helpers = array('Html', 'Javascript');

    function render($name, array $data){
        $ul = $div = "\n";

        $ul .= '<ul>' . "\n";
        foreach($data as $k=>$v):
               $ul .= " <li><a href=\"#tab-".($k+1)."\"><span>{$v['title']}</span></a></li>\n";
        endforeach;
        $ul .= '</ul>';

        foreach($data as $k=>$v):
            $div .= "<div id=\"tab-".($k+1)."\">{$v['content']}</div>\n";
        endforeach;
        return "<div id=\"".$name."\">".$ul . $div."</div>";
    }

    function beforeRender() {
        $view = ClassRegistry::getObject('view');
        if (is_object($view)) {
            $view->addScript($this->Javascript->link('jquery-1.4.4'));
            $view->addScript($this->Javascript->link('jquery-ui-1.8.6'));
        }
    }

}
?> 
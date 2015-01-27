<?php

    echo $session->flash();
    echo $form->create('Formc', array('url'=>array('controller'=>'contact', 'action'=>'index')));
    echo $form->inputs(
            array(
                'name'=>array('label'=>__('YourName',true)),
                'email'=>array('label'=>__('YourEmail',true)),
                'details'=>array('label'=>__('YourDetails',true))
            ));
    echo $form->end(__('Send', true));
?>
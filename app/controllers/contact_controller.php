<?php
class ContactController extends AppController {
        var $uses = array('Formc');
	var $name = 'Contact';
        var $helpers = array('menu','Js' => array('Jquery'));
        var $components = array('Session', 'Email');

	function admin_index() {

	}

        function index() {
           if (isset($this->data)) {
                $this->Formc->set($this->data);
                if ($this->Formc->validates()) {
                    //send email using the Email component
                    $this->Email->to = 'ouardisoft@server.lan';
                    $this->Email->subject = 'Contact message from ' . $this->data['Formc']['name'];
                    $this->Email->from = $this->data['Formc']['email'];

                    $this->Email->send($this->data['Formc']['details']);
                    $this->Session->setFlash('Email envoyé', 'default', array('class'=>'success'));

                    $this->redirect('/contact', null, true);
                }else{
                    $this->Session->setFlash('Formulaire non valide');
                }
           }
	}

        function add() {

        }
}
?>

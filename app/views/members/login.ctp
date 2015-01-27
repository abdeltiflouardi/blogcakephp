<h2>Accès Membres</h2>

<?php
echo $this->Session->flash('auth');

echo $this->Form->create('Member');
echo $this->Form->input('email', array('label' => "Email :"));
echo $this->Form->input('password', array('label' => "Mot de passe :"));
echo $this->Form->end("Connexion");
?>
<?php
App::import('Component', 'Auth');
class AppAuthComponent extends AuthComponent
{
    
	/**
	 * Configuration par défaut
	 *
	 * @var array
	 */
	var $defaults = array(
		'userModel'      => 'Admin',
		'userScope'      => null,
		'fields'         => null,
		'loginAction'    => null,
		'loginRedirect'  => null,
		'logoutRedirect' => null,
		'autoRedirect'   => true,
		'loginError'     => "Identifiant ou mot de passe incorrects.",
		'authError'      => "Vous n'avez pas accès à cette page."
	);

	/**
	 * Configurations possibles en fonction du préfixe de la route
	 *
	 * @var array
	 */
	var $configs = array(
		'admin' => array(
			'userModel'      => 'Admin',
			'userScope'      => array('Admin.disabled' => 0),
			'fields'         => array('username' => 'login', 'password' => 'password'),
			'loginAction'    => array('controller' => 'admins', 'action' => 'login', 'admin' => false),
			'loginRedirect'  => array('controller' => 'admins', 'action' => 'home', 'admin' => true),
			'logoutRedirect' => array('controller' => 'admins', 'action' => 'login', 'admin' => false),
		),
		'membres' => array(
			'userModel'      => 'Member',
			'userScope'      => array('Member.disabled' => 0),
			'fields'         => array('username' => 'email', 'password' => 'password'),
			'loginAction'    => array('controller' => 'members', 'action' => 'login', 'membres' => false),
			'loginRedirect'  => array('controller' => 'members', 'action' => 'home', 'membres' => true),
			'logoutRedirect' => array('controller' => 'members', 'action' => 'login', 'membres' => false),
		),
	);

	/**
	 * Démarrage du composant.
	 * Autorisation si pas de préfixe dans la Route qui a conduit ici.
	 *
	 * @param object $controller Le contrôleur qui a appelé le composant.
	 */
	function startup(&$controller)
	{
        
		$prefix = null;

		if(empty($controller->params['prefix']))
		{
			$this->allow();
		}
		else
		{
			$prefix = $controller->params['prefix'];
		}

		// Cas spécial des actions de login et logout, pour lesquelles le préfixe n'existe pas
		if(in_array($controller->action, array('login', 'logout')))
		{
			switch($controller->name)
			{
				case 'Admins':
					$prefix = 'admin';
					break;

				case 'Members':
					$prefix = 'membres';
					break;
			}
		}

		$this->_setup($prefix);
                parent::startup($controller);

	}

	/**
	 * Définition des variables de config en fonction d'un préfixe
	 *
	 * @param string $prefix
	 */
	function _setup($prefix)
	{
		$settings = $this->defaults;

		if(array_key_exists($prefix, $this->configs))
		{
			$settings = array_merge($settings, $this->configs[$prefix]);
		}

		$this->_set($settings);
	}
}
?>
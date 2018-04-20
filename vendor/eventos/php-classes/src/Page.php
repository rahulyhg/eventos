<?php

	namespace Eventos;

	use Rain\Tpl;

	class Page
	{
		private $config;
		
		function __construct()
		{
			$config = array( 'tpl_dir' => 'views'.DIRECTORY_SEPARATOR, 'cache_dir' => 'views-cache'.DIRECTORY_SEPARATOR );
			Tpl::configure( $config );

		}

		public function drawPage($files = array(null), $params = array(null))
		{
			$tpl = new Tpl();
			foreach ($params as $key => $value) {
				$tpl->assign( $key, $value);
			}
			foreach ($files as $value) {
				$tpl->draw($value);
			}
		}
	}
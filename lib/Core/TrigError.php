<?php

	namespace Core;
	
	class TrigError extends \ErrorException
	{
		public function __toString()
		{
			switch($this->severity)
			{
				case E_USER_ERROR:
					$type = 'Erreur fatale';
						break;
				
				case E_WARNING:
					case E_USER_WARNING:
						$type = 'Attention';	
							break;
				
				case E_NOTICE:
					case E_USER_NOTICE:
						$type = 'Note';
							break;
				
				default:
					$type = 'Erreur inconnue';
						break;
			}
			
			return 'Type : ' . $type . ' : [' . $this->code . '] <br />Message : ' . $this->message . '<br />Fichier : ' . $this->file . '<br />Ligne : ' . $this->line;
		}
	}

	function error2exception($code, $message, $fichier, $ligne)
	{
		throw new TrigError($message, 0, $code, $fichier, $ligne);
	}
	
	function customException($e)
	{
		/* Selon le code reçu le message d'erreur révèle plus ou moins d'informations : */
		switch($e->getCode())
		{
			case '512':
				echo $e->getMessage();
					break;
			case '0':
				echo $e->getMessage();
					break;
			default:
				echo 'Fichier -> ' . $e->getFile() . '<br />Ligne -> ' . $e->getLine() . '<br />Message -> ' . $e->getMessage() . '<br />Code -> ' . $e->getCode();
					break;
		}
	}
	
	set_error_handler('error2exception');
	// set_exception_handler('customException');
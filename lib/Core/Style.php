<?php

	/*
		Genarkys
		
		ver 1.0
		
	*/

	namespace Core;
	
	class Style
	{
		protected $categoryUser = ['Membre', 'Lecteur', 'Écrivain', 'Lecteur/Écrivain'];
		/*
			styleDate()
			
			$mode ->
				1 -> jj/mm/yyyy hh:mm:ss
				2 -> hh:mm:ss
				3 -> depuis yy mm jj hh mm ss
				
			$date -> milliseconds number format
		*/
		
		public function styleDate($date)
		{
			$diff = time() - $date;
			$jour = floor($diff / 86400);
			$temps = $diff - $jour * 86400;
			$heure = floor(($diff % 86400) / 3600); 
			$minute = floor((($temps / 3600) - floor($temps / 3600)) * 60);
			$seconds = $temps - ((floor($temps / 60)) * 60);
			$msg = '';
			if($jour > 0)
			{
				if($jour < 10)
				{
					if($jour != 1)
						$msg .= '0'.$jour.' jours ';
					else
						$msg .= '0'.$jour.' jour ';
				}
				else
					$msg .= $jour . 'jours ';
			}
			if($heure > 0)
			{
				if($heure < 10)
					$msg .= '0'.$heure.'h ';
				else
					$msg .= $heure.'h ';
			}
			if($minute > 0)
			{
				if($minute < 10)
				{
					$msg .= '0'.$minute. 'm ';
				}
				else
					$msg .= $minute. 'm ';
			}
			if($seconds > 0)
			{
				if($seconds < 10)
					$msg .= '0'.$seconds.'s';
				else
					$msg .= $seconds.'s';
			}
			return $msg;
		}
		
		public function styleCatUser($cat)
		{
			return $this->categoryUser[$cat];
		}
	}
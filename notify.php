<?php
	/**
	 * PHP Notify System
	 *
	 * Elephpant Icon by pok3. (http://pok3.deviantart.com/)
	 * 
	 * @author Danillo César de Oliveira Melo (@danillos)
	 */


	/**
	* 
	*/
	class Notify {
		
		/**
		 * Growl OSX path
		 *
		 * @author Danillo César de Oliveira Melo
		 */
		static $growl_path = '/usr/local/bin/growlnotify';
		
		
		/**
		 * Show alert window
		 *
		 * @param string $text_1 Title or body message
		 * @param string $text_2 Body message for alert
		 * @param string $icon
		 * @return void
		 */
		public static function msg($text_1 = "PHP", $text_2 = "PHP", $icon = 'php.png') {
			$icon = dirname(__FILE__).'/'.$icon;			
			$drive = Notify::get_drive();
			
			
			if ($text_2 !== 'PHP') {
				$title = $text_1;
				$message = $text_2; 
			} else {
				$title = $text_2;
				$message = $text_1;
			}
			
			switch ($drive) {
				case 'growl':
					exec(Notify::$growl_path." -p 0 -m '".$message."'  '".$title."' --image ".$icon." ");
					break;
				
				default:
					# code...
					break;
			}
			
		}
		
		/**
		 * Say a text (OSX)
		 *
		 * @param string $text 
		 * @return void
		 */
		public static function say($text) {
			// TODO: if not OSX catch error or say in OS native
			exec('say "'.$text.'"');
		}
		
		/**
		 * Get application name for show text
		 *
		 * @return string
		 */
		public static function get_drive() {
			// Check OSX Growl
			exec(Notify::$growl_path.' -v', $reponse, $status);
			if ($status === 0) {
				return 'growl';
			}
			
			// Check UBUNTU xxx

			// Check WINDOWS Growl
			
			// Check WINDOWS Snarl
			
		}
		
	}
?>
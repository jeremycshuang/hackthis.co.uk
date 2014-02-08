<?php
	class log {
		function __construct($app) {
			$this->app = $app;
		}

		function add($file, $line) {
			$file = preg_replace("/[^A-Za-z0-9_-]/", '', $file);
			
			$line = '['.date('c').'] ' . $_SERVER['REMOTE_ADDR'] . ' - ' . $line . "\n";

			if (($fp = @fopen($this->app->config['log'] . $file, 'a')) !== false) {
				fwrite($fp, $line);
				fclose($fp);
			}
		}
	}
?>
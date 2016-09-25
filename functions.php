<?php

	function themeslug_enqueue_style() {
		wp_enqueue_style( 'core', 'dist/css/style.min.css', false );
	};

	function themeslug_enqueue_script() {
		wp_enqueue_script( 'my-js', 'dist/js/main.min.js', false );
	};

	// Get the stylesheet and script
	function wedl_scripts() {
		// Theme stylesheet.
		wp_enqueue_style( 'wiesendeliefde-style', get_template_directory_uri() . '/dist/css/style.min.css');
		wp_enqueue_script( 'wiesendeliefde-script', get_template_directory_uri() . '/dist/js/main.min.js');
	}

	add_action( 'wp_enqueue_scripts', 'wedl_scripts' );

	class Template {

	    function Render($file, $args = array()){
	        $template = new Tools_ThemeView($file . '.php', $args);
	        $template->render();
	    }

	}

	if ( ! class_exists('Tools_ThemeView') ) { // TODO: check if this is nessasery
		class Tools_ThemeView {
			private $args;
			private $file;

			public function __get($name) {
				return $this->args[$name];
			}

			public function __construct($file, $args = array()) {
				$this->file = $file;
				$this->args = $args;
			}

			public function __isset($name){
				return isset( $this->args[$name] );
			}

			public function render() {
				if( locate_template($this->file) ){
					include( locate_template($this->file) );//Theme Check free. Child themes support.
				} else {
					$this->file = 'templates/' . $this->file;
					if( locate_template($this->file) ){
						include( locate_template($this->file) );//Theme Check free. Child themes support.
					}
				}
			}
		}
	}
?>

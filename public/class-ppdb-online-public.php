<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       cobaja.com
 * @since      1.0.0
 *
 * @package    Ppdb_Online
 * @subpackage Ppdb_Online/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ppdb_Online
 * @subpackage Ppdb_Online/public
 * @author     ridho <ridhofauza799@gmail.com>
 */
class Ppdb_Online_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ppdb_Online_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ppdb_Online_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ppdb-online-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ppdb_Online_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ppdb_Online_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ppdb-online-public.js', array( 'jquery' ), $this->version, false );

	}
//membuat function shortcode daftar-siswa
	public function daftar_siswa_shortcode(){
		$users = get_users(array('fields' => array('ID')));
		$body = '';
		foreach ($users as $user_id) {
			$metas = get_user_meta($user_id->ID);
			//print_r($metas);die();
			$body .='
				<tr>
					<td>'.$metas['nickname'][0].'</td>
					<td>Magetan</td>
				</tr>
			';
		}
		$return = '
		<table>
			<thead>
				<tr>
					<th>Nama</th>
					<th>Alamat</th>
				</tr>
			</thead>
				<tbody>
					'.$body.'
				</tbody>
		</table>
		';
		return $return;
		}

}

<?php
/**
 * Plugin Name
 *
 * @package     LearnPress Paystack
 * @author      Ikpugbu George
 *
 * @wordpress-plugin
 * Plugin Name: Paystack Plugin for LearnPress
 * Plugin URI:  https://wordpress.org/plugins/lp-paystack/
 * Description: Accept credit card payment on LearnPress using paystack
 * Version:     4.2.3.5
 * Author:      George Ikpugbu
 * Require_LP_Version: 4.2.3.5
 * Text Domain: lp-paystack
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined( 'ABSPATH' ) or die();

define( 'LP_ADDON_PAYSTACK_FILE', __FILE__ );
define( 'LP_ADDON_PAYSTACK_VER', '4.2.3.5' );
define( 'LP_ADDON_PAYSTACK_REQUIRE_VER', '4.2.3.5' );

/**
 * Class LP_Addon_Paystack_Preload
 */
class LP_Addon_Paystack_Preload {

	/**
	 * LP_Addon_Paystack_Preload constructor.
	 */
	public function __construct() {
		add_action( 'learn-press/ready', array( $this, 'load' ) );
	}

	/**
	 * Load addon
	 */
	public function load() {
		LP_Addon::load( 'LP_Addon_Paystack', 'inc/load.php', __FILE__ );
	}
}

new LP_Addon_Paystack_Preload();

<?php
/**
 * Plugin load class.
 *
 * @author   Ikpugbu George
 * @package  LearnPress/Paystack
 * @version  1.0.0
 */

defined( 'ABSPATH' ) or die();

if ( ! class_exists( 'LP_Addon_Paystack' ) ) {
    /**
     * Class LP_Addon_Paystack.
     */
    class LP_Addon_Paystack extends LP_Addon {

        /**
		 * @var string
		 */
		public $version = LP_ADDON_PAYSTACK_VER;

		/**
		 * @var string
		 */
		public $require_version = LP_ADDON_PAYSTACK_REQUIRE_VER;

        public function __construct() {
            parent::__construct();
        }

        /**
		 * Init hooks.
		 */
		protected function _init_hooks() {
			// add payment gateway class
			add_filter( 'learn_press_payment_method', array( $this, 'add_payment' ) );
			add_filter( 'learn-press/payment-methods', array( $this, 'add_payment' ) );
		}

        /**
		 * Define Learnpress IDPay payment constants.
		 *
		 */
		protected function _define_constants() {
			define( 'LP_ADDON_PAYSTACK_PATH', dirname( LP_ADDON_PAYSTACK_FILE ) );
			define( 'LP_ADDON_PAYSTACK_INC', LP_ADDON_PAYSTACK_PATH . '/inc/' );
			define( 'LP_ADDON_PAYSTACK_URL', plugin_dir_url( LP_ADDON_PAYSTACK_FILE ) );
			define( 'LP_ADDON_PAYSTACK_TEMPLATE', LP_ADDON_PAYSTACK_PATH . '/templates/' );
		}

        /**
         * Add paystack to payment system.
         *
         * @param $methods
         *
         * @return mixed
         */
        public function add_payment( $methods ) {
            $methods['paystack'] = 'LP_Gateway_Paystack';

            return $methods;
        }

        public function plugin_links() {
            $links[] = '<a href="' . admin_url( 'admin.php?page=learn-press-settings&tab=payments&section=paystack' ) . '">' . __( 'Settings', 'learnpress' ) . '</a>';

            return $links;
        }

        /**
         * Include core file
         */
        protected function _includes() {
            include_once LP_ADDON_PAYSTACK_INC . 'class-lp-gateway-paystack.php';
        }

        public function plugin_url( $file = '' ) {
            return plugins_url( '/' . $file, __DIR__ );
        }

    }
}
<?php

if (!defined('ABSPATH')) die('Access denied.');

if (!class_exists('Updraft_Task_1_2')) require_once(WPO_PLUGIN_MAIN_PATH . 'vendor/team-updraft/common-libs/src/updraft-tasks/class-updraft-task.php');

if (!class_exists('WP_Optimize_Minify_Preloader')) require_once(dirname(__FILE__) . '/class-wpo-minify-preloader.php');

class WP_Optimize_Minify_Load_Url_Task extends Updraft_Task_1_2 {

	/**
	 * Default options.
	 */
	public function get_default_options() {
		return array();
	}

	/**
	 * Run preload http requests with different user-agent values to cache pages for different devices.
	 *
	 * @return bool
	 */
	public function run() {
		$url = $this->get_option('url');

		if (empty($url)) return;

		$minify_preloader = WP_Optimize_Minify_Preloader::instance();

		// load pages with different user-agents values.

		$minify_preloader->preload_desktop($url);
		$minify_preloader->preload_amp($url);

		if (defined('WP_CLI') && WP_CLI) {
			WP_CLI::log($url);
		}

		/**
		 * Action triggered after preloading a single url
		 *
		 * @param string $url             The url to preload
		 * @param object $minify_preloader Minify preloader instance
		 */
		do_action('wpoptimize_after_minify_preload_url', $url, $minify_preloader);

		/**
		 * Allows to change the delay between each URL preload, to reduce server load.
		 *
		 * @param integer $preload_delay The delay between each request in microseconds (1000000 = 1 second).
		 */
		usleep(apply_filters('wpoptimize_minify_preload_delay', 500000));

		return true;
	}
}

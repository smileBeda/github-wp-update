<?php

global $github_updater_version;

$current_version = '1.0.1';

// If a newer or same version of our class has been loaded, don't define this one.
if (!empty($github_updater_version) && version_compare($github_updater_version, $current_version, '>=')) {
    return;
}

$github_updater_version = $current_version;

if (!class_exists('GitHub_Updater')) {
    class GitHub_Updater {

        private $plugin_slug;
        private $current_version;
        private $github_repo_url;

        public function __construct($plugin_slug, $current_version, $github_repo_url) {
            $this->plugin_slug = $plugin_slug;
            $this->current_version = $current_version;
            $this->github_repo_url = $github_repo_url;

            // Hook into the pre-set transient filter for plugins.
            add_filter('pre_set_site_transient_update_plugins', array($this, 'check_for_updates'));
        }

        public function check_for_updates($transient) {
            if (empty($transient->checked)) {
                return $transient;
            }

            // Fetch the release data from GitHub.
            $release = $this->get_github_release_info();

            if (is_array($release) && isset($release['tag_name']) && version_compare($release['tag_name'], $this->current_version, '>')) {
                $transient->response[$this->plugin_slug] = (object) [
                    'slug' => $this->plugin_slug,
                    'new_version' => $release['tag_name'],
                    'package' => $release['zipball_url'], // URL to the ZIP file
                    'url' => $this->github_repo_url // URL to the plugin's page (e.g., its GitHub repo)
                ];
            }

            return $transient;
        }

        private function get_github_release_info() {
            $url = $this->github_repo_url . '/releases/latest';

            $response = wp_remote_get($url);

            if (is_wp_error($response)) {
                return false;
            }

            $body = wp_remote_retrieve_body($response);
            return json_decode($body, true);
        }

    }
}

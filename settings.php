<?php

/**
 * Administration settings definitions for the hvp module.
 *
 * @package   mod_hvp
 * @copyright Joubel
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Make sure we are called from an internal Moodle site.
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/mod/hvp/lib.php');

if ($ADMIN->fulltree) {
    // Settings is stored on the global $CFG object

    // Content state
    $settings->add(new admin_setting_configcheckbox('enable_save_content_state', get_string('enable_save_content_state', 'hvp'),
        get_string('content_state_description', 'hvp'), 1));
    $settings->add(new admin_setting_configtext('content_state_frequency', get_string('content_state_frequency', 'hvp'),
        get_string('content_state_frequency_description', 'hvp'), 30, PARAM_INT));

    // Display options for H5P frame
    $settings->add(new admin_setting_heading('display_options', get_string('display_options', 'hvp'), ''));
    $settings->add(new admin_setting_configcheckbox('enable_frame', get_string('enable_frame', 'hvp'), '', 1));
    $settings->add(new admin_setting_configcheckbox('enable_download', get_string('enable_download', 'hvp'), '', 1));
    $settings->add(new admin_setting_configcheckbox('enable_embed', get_string('enable_embed', 'hvp'), '', 1));
    $settings->add(new admin_setting_configcheckbox('enable_copyright', get_string('enable_copyright', 'hvp'), '', 1));
    $settings->add(new admin_setting_configcheckbox('enable_about', get_string('enable_about', 'hvp'), '', 1));
}

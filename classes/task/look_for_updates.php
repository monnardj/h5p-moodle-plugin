<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 * Defines the task which looks for H5P updates.
 *
 * @package    mod_hvp
 * @copyright  2016 Joubel AS <contact@joubel.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_hvp\task;

defined('MOODLE_INTERNAL') || die();

/**
 * The mod_hvp look for updates task class
 *
 * @package    mod_hvp
 * @copyright  2016 Joubel AS <contact@joubel.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class look_for_updates extends \core\task\scheduled_task {
    public function get_name() {
        return get_string('lookforupdates', 'mod_hvp');
    }

    public function execute() {
        // Check to make sure external communications hasn't been disabled
        $extcom = !!get_config('mod_hvp', 'external_communication');
        $extcomnotify = !!get_config('mod_hvp', 'external_communication_notify');
        if ($extcom || !$extcomnotify) {
            $core = \mod_hvp\framework::instance();
            $core->fetchLibrariesMetadata(!$extcom);
            set_config('external_communication_notify', $extcom ? false : time(), 'mod_hvp');

            // TODO: Notify admin if there's an update available!
        }
    }
}

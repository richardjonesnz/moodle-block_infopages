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
 * block_infopages main file.  This block is designed to allow admins to add
 * static pages to a Moodle installation.
 *
 * @package block_infopages
 * @copyright Perry Way (https://www.linkedin.com/in/perry-way-75a49a144/)
 * Modified: Richard Jones (https://richardnz/net/)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_infopages extends block_base {
    /**
     * Initialize our block with a language string.
     */
    function init() {
        $this->title = get_string('pluginname', 'block_infopages');
    }

    /**
     * Add some text content to our block.
     */
    function get_content() {
        global $USER, $CFG;

        // Do we have any content?
        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        // OK let's add some content.
        $this->content = new stdClass();
        $this->content->footer = '';

        // Check permissions.
        $blockid = $this->instance->id;
        $context = context_block::instance($blockid);

        if (has_capability('block/infopages:seeviewpage', $context)) {

            $renderer = $this->page->get_renderer('block_infopages');
            $this->content->text = $renderer->fetch_block_content($blockid);
            // Add pop code here...
        }

        return $this->content;
    }
    /**
     * This is a list of places where the block may or
     * may not be added.
     */
    public function applicable_formats() {
        return array('all' => false,
                     'site' => true,
                     'admin-search' => true,
                     'my' => true);
    }
    /**
     * Allow multiple instances of the block.
     */
    function instance_allow_multiple() {
        return false;
    }

    /**
     * Allow block configuration.
     */
    function has_config() {
        return true;
    }
}
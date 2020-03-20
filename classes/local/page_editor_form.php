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
 * Page editing form
 *
 * @package block_infopages
 * @copyright Perry Way (https://www.linkedin.com/in/perry-way-75a49a144/)
 * Modified: Richard Jones (https://richardnz/net/)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_infopages\local;
defined('MOODLE_INTERNAL') || die();
require_once($CFG->libdir . '/formslib.php');

class block_infopages_page_editor_form extends moodleform {

    public function definition() {

        $mform = $this->_form;

        $mform->addElement('header', 'header',
                get_string('formheader', 'block_infopages'));

        $mform->addElement('text', 'name', get_string('name', 'block_infopages'));
        $mform->setType('name', PARAM_ALPHA);
        $mform->addRule('name', null, 'required', null, 'client');

        $this->add_action_buttons();
    }

}
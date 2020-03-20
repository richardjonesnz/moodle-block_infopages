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
 * Version information
 *
 * @package block_infopages
 * @copyright Perry Way (https://www.linkedin.com/in/perry-way-75a49a144/)
 * Modified: Richard Jones (https://richardnz/net/)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require("../../config.php");
global $DB;
$blockid = required_param('blockid', PARAM_INT);
$context = context_block::instance($blockid);
$PAGE->set_context($context);
$PAGE->set_pagelayout('standard');
$PAGE->set_title(get_string('pagetitle', 'block_infopages'));
$PAGE->set_heading(get_string('viewlink', 'block_infopages'));
$PAGE->set_url('/blocks/infopages/view.php');

require_login();
// Check basic permission.
require_capability('block/infopages:seeviewpage', $context);

// Get the list of static pages.
$pagerecords = $DB->get_records('infopages', null, null, 'id, name, heading, title, visibleto,
        layout, content');

$renderer = $PAGE->get_renderer('block_infopages');
$renderer->display_view_page($pagerecords);
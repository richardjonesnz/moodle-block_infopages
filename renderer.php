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
 * block_infopages renderer.
 *
 * @package block_infopages
 * @copyright Perry Way (https://www.linkedin.com/in/perry-way-75a49a144/)
 * Modified: Richard Jones (https://richardnz/net/)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;

class block_infopages_renderer extends plugin_renderer_base {

    public function fetch_block_content($blockid) {
        $data = new stdClass();

        $data->url = new moodle_url('/blocks/infopages/view.php',
                ['blockid' => $blockid]);
        $data->text = get_string('viewlink', 'block_infopages');

        return $this->render_from_template('block_infopages/block_content',
                $data);
    }

    public function display_view_page($pagerecords) {

        $data = new stdClass();
        $baseurl = new moodle_url('/blocks/infopages/page_editor.php');
        $data->pages = array_values($pagerecords);

        foreach ($data->pages as $page) {
            $page->url = $baseurl->out(false, ['pageid' => $page->id]);
        }

        // Start output to browser.
        echo $this->output->header();

        // Render the data in a Mustache template.
        echo $this->render_from_template('block_infopages/viewpage', $data);;

        // Finish the page.
        echo $this->output->footer();

    }
}
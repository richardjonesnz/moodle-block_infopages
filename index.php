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
 * @package    local_info
 * @copyright  Perry Way (https://www.linkedin.com/in/perry-way-75a49a144/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("../../config.php");

global $SITE;

//require_login();

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagetype('site-index');
$PAGE->set_pagelayout('standard');
$PAGE->set_title("Information Pages Index");
$PAGE->navbar->add("Information Pages Index");
$PAGE->set_heading("Information Pages Index");
$PAGE->set_url("/");
echo $OUTPUT->header();
?>


<div class="generalbox">
    <div class="container">
        <h1>Usage guidelines</h1>
        <p class="h5" style="margin:25px;">
            This plugin was born from a need to have some information oriented pages
            hosted inside Moodle. These pages would have the header and footer of Moodle
            but leaving the body of the page to be customized content, either static
            HTML or generated through code. In reality, almost anyone could create
            this plugin but because nobody has before, I decided to make available
            what I have done. It's not rocket science. In reality this is more of a
            hack than some amazing plugin. :)
        </p>
        <p class="h5" style="margin:25px;">
            Some examples of information oriented pages might be pages oriented towards
            helping students figure out how to get logged in (some students need thistle
            sort of help actually), information regarding resources of the institution
            such as Library Resources, Alumni Resources, Tutoring and Support,
            Clubs and Activities, Career Planning Checklist, the list goes on..
        </p>
        <p class="h5" style="margin:25px;">
            This .php file, index.php, can be used to begin your custom creation process.
            The way to include the Moodle header and footer is in the .php code, and
            this content you are reading now is in HTML.
        </p>
        <p class="h5" style="margin:25px;">
            Your files will have a url of your site followed by /local/info/&lt;your page name&gt;.php
        </p>
        <p class="h5" style="margin:25px;">
            If you want to ensure that someone needs to be logged in first before being
            able to view that page, uncomment line 29 above, allowing the call to be
            made to require_login(). See below code example:
        </p>
        <pre style="margin-left:50px;color:red;">
&LT;?php
require_once("../../config.php");

global $SITE;

//require_login();

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagetype('site-index');
$PAGE->set_pagelayout('standard');
$PAGE->set_title("Information Pages Index");
$PAGE->navbar->add("Information Pages Index");
$PAGE->set_heading("Information Pages Index");
$PAGE->set_url("/");
echo $OUTPUT->header();
?>
&lt;div class="generalbox"&gt;

    PUT YOUR CUSTOM HTML CONTENT IN HERE

&lt;/div&gt;
&lt;?php
echo $OUTPUT->footer();
die();
exit;
        </pre>
        <h1>Special Note</h1>
        <p class="h5" style="margin:25px;">
            If you want a nice box around your HTML, contain your HTML inside of a moodle-classed div such as class="generalbox"
        </p>
    </div>
<?php
echo $OUTPUT->footer();
die();
exit;
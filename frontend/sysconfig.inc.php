<?php
/**
 * SENAYAN application global configuration file
 *
 * Copyright (C) 2010  Arie Nugraha (dicarve@yahoo.com), Hendro Wicaksono (hendrowicaksono@yahoo.com), Wardiyono (wynerst@gmail.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */

// turn off all error messages for security reason
@ini_set('display_errors',false);
// check if safe mode is on
if ((bool) ini_get('safe_mode')) {
    define('SENAYAN_IN_SAFE_MODE', 1);
}

// set default timezone
// for a list of timezone, please see PHP Manual at "List of Supported Timezones" section
@date_default_timezone_set('Asia/Jakarta');

// senayan version
define('SENAYAN_VERSION', 'SLiMS 5 (Meranti)');

// senayan session cookies name
define('SENAYAN_SESSION_COOKIES_NAME', 'SenayanAdmin');
define('SENAYAN_MEMBER_SESSION_COOKIES_NAME', 'SenayanMember');

// senayan base dir
define('SENAYAN_BASE_DIR', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

// absolute path for simbio platform
define('SIMBIO_BASE_DIR', SENAYAN_BASE_DIR.'simbio2'.DIRECTORY_SEPARATOR);

// senayan library base dir
define('LIB_DIR', SENAYAN_BASE_DIR.'lib'.DIRECTORY_SEPARATOR);

// document, member and barcode images base dir
define('IMAGES_DIR', 'images');
define('IMAGES_BASE_DIR', SENAYAN_BASE_DIR.IMAGES_DIR.DIRECTORY_SEPARATOR);

// library automation module base dir
define('MODULES_DIR', 'modules');
define('MODULES_BASE_DIR', SENAYAN_BASE_DIR.'admin'.DIRECTORY_SEPARATOR.MODULES_DIR.DIRECTORY_SEPARATOR);

// files upload dir
define('FILES_DIR', 'files');
define('FILES_UPLOAD_DIR', SENAYAN_BASE_DIR.FILES_DIR.DIRECTORY_SEPARATOR);

// repository dir
define('REPO_DIR', 'repository');
define('REPO_BASE_DIR', SENAYAN_BASE_DIR.REPO_DIR.DIRECTORY_SEPARATOR);

// file attachment dir
define('ATT_DIR', 'att');
define('FILE_ATT_DIR', FILES_UPLOAD_DIR.ATT_DIR);

// printed report dir
define('REPORT_DIR', 'reports');
define('REPORT_FILE_BASE_DIR', FILES_UPLOAD_DIR.REPORT_DIR.DIRECTORY_SEPARATOR);

// languages base dir
define('LANGUAGES_BASE_DIR', LIB_DIR.'lang'.DIRECTORY_SEPARATOR);

// senayan web doc root dir
/* Custom base URL */
$sysconf['baseurl'] = '';
$temp_senayan_web_root_dir = preg_replace('@admin.*@i', '', dirname($_SERVER['PHP_SELF']));
define('SENAYAN_WEB_ROOT_DIR', $sysconf['baseurl'].$temp_senayan_web_root_dir.(preg_match('@\/$@i', $temp_senayan_web_root_dir)?'':'/'));

// javascript library web root dir
define('JS_WEB_ROOT_DIR', SENAYAN_WEB_ROOT_DIR.'js/');

// command execution status
define('BINARY_NOT_FOUND', 127);
define('BINARY_FOUND', 1);
define('COMMAND_SUCCESS', 0);
define('COMMAND_FAILED', 2);

// simbio main class inclusion
require SIMBIO_BASE_DIR.'simbio.inc.php';
// simbio security class
require SIMBIO_BASE_DIR.'simbio_UTILS'.DIRECTORY_SEPARATOR.'simbio_security.inc.php';
// we must include utility library first
require LIB_DIR.'utility.inc.php';


/* HTTP header */
header('Content-type: text/html; charset=UTF-8');

/* FILE DOWNLOAD */
$sysconf['allow_file_download'] = false;

/* FILE UPLOADS */
$sysconf['max_upload'] = intval(ini_get('upload_max_filesize'))*1024;
$post_max_size = intval(ini_get('post_max_size'))*1024;
if ($sysconf['max_upload'] > $post_max_size) {
    $sysconf['max_upload'] = $post_max_size-1024;
}
$sysconf['max_image_upload'] = 500;
// allowed image file to upload
$sysconf['allowed_images'] = array('.jpeg', '.jpg', '.gif', '.png', '.JPEG', '.JPG', '.GIF', '.PNG');
// allowed file attachment to upload
$sysconf['allowed_file_att'] = array('.pdf', '.rtf', '.txt',
    '.odt', '.odp', '.ods', '.doc', '.xls', '.ppt',
    '.avi', '.mpeg', '.mp4', '.flv', '.mvk',
    '.jpg', '.jpeg', '.png', '.gif',
    '.docx', '.pptx', '.xlsx',
    '.ogg', '.mp3', '.xml', '.mrc');

/* FILE ATTACHMENT MIMETYPES */
$sysconf['mimetype']['docx'] = 'application/msword';
$sysconf['mimetype']['js'] = 'application/javascript';
$sysconf['mimetype']['json'] = 'application/json';
$sysconf['mimetype']['doc'] = 'application/msword';
$sysconf['mimetype']['dot'] = 'application/msword';
$sysconf['mimetype']['ogg'] = 'application/ogg';
$sysconf['mimetype']['pdf'] = 'application/pdf';
$sysconf['mimetype']['rdf'] = 'application/rdf+xml';
$sysconf['mimetype']['rss'] = 'application/rss+xml';
$sysconf['mimetype']['rtf'] = 'application/rtf';
$sysconf['mimetype']['xls'] = 'application/vnd.ms-excel';
$sysconf['mimetype']['xlt'] = 'application/vnd.ms-excel';
$sysconf['mimetype']['chm'] = 'application/vnd.ms-htmlhelp';
$sysconf['mimetype']['ppt'] = 'application/vnd.ms-powerpoint';
$sysconf['mimetype']['pps'] = 'application/vnd.ms-powerpoint';
$sysconf['mimetype']['odc'] = 'application/vnd.oasis.opendocument.chart';
$sysconf['mimetype']['odf'] = 'application/vnd.oasis.opendocument.formula';
$sysconf['mimetype']['odg'] = 'application/vnd.oasis.opendocument.graphics';
$sysconf['mimetype']['odi'] = 'application/vnd.oasis.opendocument.image';
$sysconf['mimetype']['odp'] = 'application/vnd.oasis.opendocument.presentation';
$sysconf['mimetype']['ods'] = 'application/vnd.oasis.opendocument.spreadsheet';
$sysconf['mimetype']['odt'] = 'application/vnd.oasis.opendocument.text';
$sysconf['mimetype']['swf'] = 'application/x-shockwave-flash';
$sysconf['mimetype']['zip'] = 'application/zip';
$sysconf['mimetype']['mp3'] = 'audio/mpeg';
$sysconf['mimetype']['jpg'] = 'image/jpeg';
$sysconf['mimetype']['jpeg'] = 'image/jpeg';
$sysconf['mimetype']['gif'] = 'image/gif';
$sysconf['mimetype']['png'] = 'image/png';
$sysconf['mimetype']['flv'] = 'video/x-flv';
$sysconf['mimetype']['mp4'] = 'video/mp4';
$sysconf['mimetype']['xml'] = 'text/xml';
$sysconf['mimetype']['mrc'] = 'text/marc';

/* HTTPS Setting */
$sysconf['https_enable'] = false;
$sysconf['https_port'] = 443;

/* Date Format Setting for OPAC */
$sysconf['date_format'] = 'Y-m-d'; /* Produce 2009-12-31 */
// $sysconf['date_format'] = 'd-M-Y'; /* Produce 31-Dec-2009 */

// check if session is auto started and then destroy it
if ($is_auto = @ini_get('session.auto_start')) { define('SESSION_AUTO_STARTED', $is_auto); }
if (defined('SESSION_AUTO_STARTED')) { @session_destroy(); }

/** check for local sysconfig For Admin (fa) file
if (defined('DB_ACCESS') && DB_ACCESS == 'fa' && file_exists(SENAYAN_BASE_DIR.'sysconfig.local.fa.inc.php')) {
  include SENAYAN_BASE_DIR.'sysconfig.local.fa.inc.php';
} else {
  // check for local sysconfig file
  if (file_exists(SENAYAN_BASE_DIR.'sysconfig.local.inc.php')) {
    include SENAYAN_BASE_DIR.'sysconfig.local.inc.php';
  } else {
	  header("location: install/index.php");
	  exit;
  }
}
*/

/* DATABASE RELATED */
if (!defined('DB_HOST')) { define('DB_HOST', 'localhost'); }
if (!defined('DB_PORT')) { define('DB_PORT', '3306'); }
if (!defined('DB_NAME')) { define('DB_NAME', 'db_jkwjk3'); }
if (!defined('DB_USERNAME')) { define('DB_USERNAME', 'root'); }
if (!defined('DB_PASSWORD')) { define('DB_PASSWORD', ''); }

// database connection
// we prefer to use mysqli extensions if its available
if (extension_loaded('mysqli')) {
    /* MYSQLI */
    $dbs = @new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
    if (mysqli_connect_error()) {
        die('<div style="border: 1px dotted #FF0000; color: #FF0000; padding: 5px;">Error Connecting to Database. Please check your configuration</div>');
    }
} else {
    /* MYSQL */
    // require the simbio mysql class
    include SIMBIO_BASE_DIR.'simbio_DB/mysql/simbio_mysql.inc.php';
    // make a new connection object that will be used by all applications
    $dbs = @new simbio_mysql(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
}

/* Force UTF-8 for MySQL connection */
$dbs->query('SET NAMES \'utf8\'');

// load global settings from database. Uncomment below lines if you dont want to load it
utility::loadSettings($dbs);

<?php
/*******
 * doesn't allow this file to be loaded with a browser.
 */
if (!defined('AT_INCLUDE_PATH')) { exit; }

/******
 * this file must only be included within a Module obj
 */
if (!isset($this) || (isset($this) && (strtolower(get_class($this)) != 'module'))) { exit(__FILE__ . ' is not a Module'); }

/*******
 * assign the instructor and admin privileges to the constants.
 */
define('AT_PRIV_MAHARA',       $this->getPrivilege());
define('AT_ADMIN_PRIV_MAHARA', $this->getAdminPrivilege());


/*******
 * if this module is to be made available to students on the Home or Main Navigation.
 */
$_group_tool = $_student_tool = 'mods/mahara/index.php';



/*******
 * add the admin pages when needed.
 */
if (admin_authenticate(AT_ADMIN_PRIV_MAHARA, TRUE) || admin_authenticate(AT_ADMIN_PRIV_ADMIN, TRUE)) {
	$this->_pages[AT_NAV_ADMIN] = array('mods/mahara/index_admin.php');
	$this->_pages['mods/mahara/index_admin.php']['title_var'] = 'mahara';
	$this->_pages['mods/mahara/index_admin.php']['parent']    = AT_NAV_ADMIN;
}

/*******
 * instructor Manage section:
 */
//$this->_pages['mods/mahara/index_instructor.php']['title_var'] = 'mahara';
//$this->_pages['mods/mahara/index_instructor.php']['parent']   = 'tools/index.php';

/*******
 * student page.
 */
$this->_pages['mods/mahara/index.php']['title_var'] = 'mahara';
$this->_pages['mods/mahara/index.php']['img']       = 'mods/mahara/mahara.gif';

/* my start page pages */
$this->_pages[AT_NAV_START]  = array('mods/mahara/index.php');
$this->_pages['mods/mahara/index.php']['title_var'] = 'mahara';
$this->_pages['mods/mahara/index.php']['parent'] = AT_NAV_START;

?>
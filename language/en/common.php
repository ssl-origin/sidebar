<?php
/**
*
* @package phpBB Extension - phpBB Sidebar
* @copyright (c) 2026 Fred Rimbert https://forums.caforum.fr/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
$lang = array_merge($lang, array(
	'ACP_SIDEBAR_TITLE'	       => 'phpBB Sidebar',
	'ACP_SIDEBAR_SETTINGS'	   => 'Links settings',
	'SIDELINKS'				   => 'Useful Links',
	'SIDEBOARD'				   => 'Board Menu',
));

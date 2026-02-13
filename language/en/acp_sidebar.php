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
	'ACP_SIDEBAR_SETTINGS'			=> 'Sidebar Settings',
	'ACP_SIDEBAR_SETTINGS_EXPLAIN'	=> 'Fill in here your personalized links. Enter the link URL, ex. "https://domaine.fr"<br>These links will be displayed at the top of the sidebar under <strong>Useful links</strong>.',
	'SIDEBAR_LINKS_CONFIG'			=> 'Link Management',
	'LINK_TEXT'					    => 'Link Text',
	'LINK_URL'					    => 'Link URL',
));

<?php
/**
*
* @package phpBB Extension - phpBB Sidebar
* @copyright (c) 2024 Fred Rimbert https://forums.caforum.fr/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

return [
	'acp' => [
		'caforum_sidebar' => [
			'title' => 'SIDEBAR',
			'modes' => [
				'settings' => [
					'title' => 'SIDEBAR_SETTINGS',
					'auth'  => 'ext_caforum/sidebar && acl_a_board',
					'cat'   => ['ACP_CAT_DOT_MODS']
				],
			],
		],
	],
];

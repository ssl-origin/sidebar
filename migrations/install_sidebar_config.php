<?php
/**
*
* @package phpBB Extension - phpBB Sidebar
* @copyright (c) 2024 Fred Rimbert https://forums.caforum.fr/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace caforum\sidebar\migrations;

class install_sidebar_config extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['sidebar_link1_name']);
	}

	public function update_data()
	{
		$data = [];

		for ($i = 1; $i <= 5; $i++)
		{
			$data[] = ['config.add', ["sidebar_link{$i}_name", '']];
			$data[] = ['config.add', ["sidebar_link{$i}_url", '']];
		}

		return $data;
	}
}

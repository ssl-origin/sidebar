<?php
/**
*
* @package phpBB Extension - phpBB Sidebar
* @copyright (c) 2024 Fred Rimbert https://forums.caforum.fr/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace caforum\sidebar\migrations;

class install_sidebar_links extends \phpbb\db\migration\migration
{
    public function effectively_installed()
    {
        return isset($this->config['sidebar_link1_name']);
    }

    public function update_data()
    {
        return [
            ['config.add', ['sidebar_link1_name', '']],
            ['config.add', ['sidebar_link1_url', '']],
            ['config.add', ['sidebar_link2_name', '']],
            ['config.add', ['sidebar_link2_url', '']],
            ['config.add', ['sidebar_link3_name', '']],
            ['config.add', ['sidebar_link3_url', '']],
            ['config.add', ['sidebar_link4_name', '']],
            ['config.add', ['sidebar_link4_url', '']],
            ['config.add', ['sidebar_link5_name', '']],
            ['config.add', ['sidebar_link5_url', '']],
        ];
    }
}

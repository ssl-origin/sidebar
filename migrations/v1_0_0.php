<?php
/**
*
* @package phpBB Extension - phpBB Sidebar
* @copyright (c) 2026 Fred Rimbert https://forums.caforum.fr/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace caforum\sidebar\migrations;

class v1_0_0 extends \phpbb\db\migration\migration
{
    public function update_data()
    {
        return [
            // Configs with defaults
            ['config.add', ['caforum_sidebar_text_1', '']],
            ['config.add', ['caforum_sidebar_url_1', '']],
            ['config.add', ['caforum_sidebar_text_2', '']],
            ['config.add', ['caforum_sidebar_url_2', '']],
            ['config.add', ['caforum_sidebar_text_3', '']],
            ['config.add', ['caforum_sidebar_url_3', '']],
            ['config.add', ['caforum_sidebar_text_4', '']],
            ['config.add', ['caforum_sidebar_url_4', '']],
            ['config.add', ['caforum_sidebar_text_5', '']],
            ['config.add', ['caforum_sidebar_url_5', '']],

            // directly add your title in the "Extensions" tab
            ['module.add', ['acp', 'ACP_CAT_DOT_MODS', 'ACP_SIDEBAR_TITLE']],

            // Add the settings mode within this tab
            ['module.add', [
                'acp',
                'ACP_SIDEBAR_TITLE',
                [
                    'module_basename' => '\caforum\sidebar\acp\main_module',
                    'modes'           => ['settings'],
                    'auth'            => 'ext_caforum/sidebar && acl_a_board',
                ],
            ]],
        ];
    }

    public function revert_data()
    {
        return [
            // Remove in reverse order
            ['module.remove', [
                'acp',
                'ACP_SIDEBAR_TITLE',
                [
                    'module_basename' => '\caforum\sidebar\acp\main_module',
                    'modes'           => ['settings'],
                ],
            ]],

            ['module.remove', ['acp', 0, 'ACP_SIDEBAR_TITLE']],

            // Remove configs
            ['config.remove', ['caforum_sidebar_text_1']],
            ['config.remove', ['caforum_sidebar_url_1']],
            ['config.remove', ['caforum_sidebar_text_2']],
            ['config.remove', ['caforum_sidebar_url_2']],
            ['config.remove', ['caforum_sidebar_text_3']],
            ['config.remove', ['caforum_sidebar_url_3']],
            ['config.remove', ['caforum_sidebar_text_4']],
            ['config.remove', ['caforum_sidebar_url_4']],
            ['config.remove', ['caforum_sidebar_text_5']],
            ['config.remove', ['caforum_sidebar_url_5']],
        ];
    }
}

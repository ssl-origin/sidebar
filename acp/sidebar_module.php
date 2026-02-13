<?php
/**
*
* @package phpBB Extension - phpBB Sidebar
* @copyright (c) 2024 Fred Rimbert https://forums.caforum.fr/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace caforum\sidebar\acp;

class sidebar_module
{
    public $u_action;

    function main($id, $mode)
    {
        global $config, $request, $template, $user;

        $user->add_lang_ext('caforum/sidebar', 'common');

        $this->tpl_name = 'acp_sidebar';
        $this->page_title = 'SIDEBAR_SETTINGS';

        add_form_key('caforum_sidebar');

        if ($request->is_set_post('submit'))
        {
            if (!check_form_key('caforum_sidebar')) trigger_error('FORM_INVALID');

            for ($i = 1; $i <= 5; $i++)
            {
                set_config("sidebar_link{$i}_name", $request->variable("sidebar_link{$i}_name", '', true));
                set_config("sidebar_link{$i}_url", $request->variable("sidebar_link{$i}_url", '', true));
            }

            trigger_error($user->lang('SIDEBAR_SAVED') . adm_back_link($this->u_action));
        }

        for ($i = 1; $i <= 5; $i++)
        {
            $template->assign_vars([
                "SIDEBAR_LINK{$i}_NAME" => $config["sidebar_link{$i}_name"] ?? '',
                "SIDEBAR_LINK{$i}_URL"  => $config["sidebar_link{$i}_url"] ?? '',
            ]);
        }
    }
}

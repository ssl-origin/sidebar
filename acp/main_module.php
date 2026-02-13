<?php
/**
*
* @package phpBB Extension - phpBB Sidebar
* @copyright (c) 2024 Fred Rimbert https://forums.caforum.fr/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace caforum\sidebar\acp;

class main_module
{
    public $u_action;
    public $tpl_name;
    public $page_title;

    public function main($id, $mode)
    {
        global $config, $request, $template, $user;

        $user->add_lang('acp/common');
        $user->add_lang_ext('caforum/sidebar', 'acp_sidebar');  // Ajuste se o lang estiver em 'common'

        $this->tpl_name   = 'acp_sidebar_settings';
        $this->page_title = $user->lang('ACP_SIDEBAR_SETTINGS');

        add_form_key('acp_sidebar');

        if ($request->is_set_post('submit'))
        {
            if (!check_form_key('acp_sidebar'))
            {
                trigger_error('FORM_INVALID', E_USER_WARNING);
            }

            for ($i = 1; $i <= 5; $i++)
            {
                $config->set('caforum_sidebar_text_' . $i, $request->variable('link_text_' . $i, '', true));
                $config->set('caforum_sidebar_url_' . $i, $request->variable('link_url_' . $i, ''));
            }

            trigger_error($user->lang('CONFIG_UPDATED') . adm_back_link($this->u_action));
        }

        $template->assign_vars([
            'U_ACTION' => $this->u_action,
        ]);

        for ($i = 1; $i <= 5; $i++)
        {
            $template->assign_block_vars('links', [
                'ID'   => $i,
                'TEXT' => $config['caforum_sidebar_text_' . $i] ?? 'Lien personnalisé #' . $i,
                'URL'  => $config['caforum_sidebar_url_' . $i] ?? '#',
            ]);
        }
    }
}

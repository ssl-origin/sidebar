<?php
/**
*
* @package phpBB Extension - phpBB Sidebar
* @copyright (c) 2024 Fred Rimbert https://forums.caforum.fr/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace caforum\sidebar\acp;

class main_info
{
    public function module()
    {
        return [
            'filename' => '\caforum\sidebar\acp\main_module',
            'title'    => 'ACP_SIDEBAR_TITLE',
            'modes'    => [
                'settings' => [
                    'title' => 'ACP_SIDEBAR_SETTINGS',
                    'auth'  => 'ext_caforum/sidebar && acl_a_board',
                    'cat'   => [],  // <--- Ouvre directement dans l’onglet « Extensions » (sans onglet personnalisé)
                ],
            ],
        ];
    }
}

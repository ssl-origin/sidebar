<?php
/**
*
* @package phpBB Extension - phpBB Sidebar
* @copyright (c) 2024 Fred Rimbert
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace caforum\sidebar\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
    /** @var \phpbb\template\template */
    protected $template;

    /** @var \phpbb\config\config */
    protected $config;

    /** @var string */
    protected $phpbb_root_path;

    /**
     * Constructor
     */
    public function __construct(
        \phpbb\config\config $config,
        \phpbb\template\template $template,
        $phpbb_root_path
    ) {
        $this->config = $config;
        $this->template = $template;
        $this->phpbb_root_path = $phpbb_root_path;
    }

    /**
     * Déclare les événements auxquels le listener s'abonne
     */
    static public function getSubscribedEvents()
    {
        return [
            'core.user_setup'   => 'load_language_on_setup',
            'core.page_header'  => 'assign_sidebar_links',
        ];
    }

    /**
     * Charge la langue de l'extension
     */
    public function load_language_on_setup($event)
    {
        $lang_set_ext = $event['lang_set_ext'];
        $lang_set_ext[] = [
            'ext_name' => 'caforum/sidebar',
            'lang_set' => 'common',
        ];
        $event['lang_set_ext'] = $lang_set_ext;
    }

    /**
     * Assigne les liens de la sidebar dynamiques depuis le PCA
     */
    public function assign_sidebar_links()
    {
        for ($i = 1; $i <= 5; $i++)
        {
            $name = $this->config["sidebar_link{$i}_name"] ?? '';
            $url  = $this->config["sidebar_link{$i}_url"] ?? '';

            if (!empty($name) && !empty($url))
            {
                $this->template->assign_block_vars('sidebar_links', [
                    'NAME' => $name,
                    'URL'  => $url,
                ]);
            }
        }
    }
}

<?php
/**
*
* @package phpBB Extension - phpBB Sidebar
* @copyright (c) 2026 Fred Rimbert https://forums.caforum.fr/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace caforum\sidebar\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/**
	* Constructor
	* * @param \phpbb\config\config		$config
	* @param \phpbb\template\template	$template
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template)
	{
		$this->config = $config;
		$this->template = $template;
	}

	/**
	* @return array
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'	=> 'load_language_on_setup',
			'core.page_header'	=> 'assign_sidebar_links',
		);
	}

	/**
	* Carrega os arquivos de linguagem da extensão
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
	* Envia os links do banco de dados para o template da sidebar
	*/
	public function assign_sidebar_links($event)
	{
		// Percorre os 5 links salvos na config
		for ($i = 1; $i <= 5; $i++)
		{
			$text = $this->config['caforum_sidebar_text_' . $i];
			$url  = $this->config['caforum_sidebar_url_' . $i];

			// Só envia para o template se o texto do link não estiver vazio
			if ($text)
			{
				$this->template->assign_block_vars('sidebar_links', [
					'LINK_TEXT' => $text,
					'LINK_URL'  => $url,
				]);
			}
		}
	}
}

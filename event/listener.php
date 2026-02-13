<?php
/**
*
* @package phpBB Extension - phpBB Sidebar
* @copyright (c) 2024 Fred Rimbert https://forums.caforum.fr/
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
/**
* Assign functions defined in this class to event listeners in the core
*
* @return array
* @static
* @access public
*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'	=> 'load_language_on_setup',
		);
	}

	/** @var \phpbb\template\template */
	protected $template;

	//** @var string phpbb_root_path */
	protected $phpbb_root_path;

	/**
	* Constructor
	*/
	public function __construct($phpbb_root_path, \phpbb\template\template $template)
	{
		$this->phpbb_root_path = $phpbb_root_path;
		$this->template = $template;
	}
	/**
	* @param array $event
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
}

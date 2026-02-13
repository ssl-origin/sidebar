<?php
/**
*
* @package phpBB Extension - phpBB Sidebar
* @copyright (c) 2026 Fred Rimbert https://forums.caforum.fr/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace caforum\sidebar;

/**
 * Extension class for custom enable/disable/purge actions
 */
class ext extends \phpbb\extension\base
{
	/**
	 * Enable extension if phpBB version requirement is met
	 *
	 * @return bool
	 * @access public
	 */
	public function is_enableable()
	{
		return phpbb_version_compare(PHPBB_VERSION, '3.3.11', '>=');
	}
}

<?php
/**
 * @package   Module for displaying a list of HTML code blocks.
 * @version   0.0.1
 * @author    https://www.brainforge.co.uk
 * @copyright Copyright (C) 2023 Jonathan Brain. All rights reserved.
 * @license   GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

use Joomla\CMS\Language\Text;

// no direct access
defined('_JEXEC') or die;

/** @var object $params */
$htmlItems = $params->get('htmlitems');
if (empty($htmlItems)) return;

$htmlItems = (array) $htmlItems;

$headerTag = $params->get('header_tag');
$headerClass = $params->get('header_class');

$showtitles = intval($params->get('showtitles'));

$root = JURI::root(true) . '/';
$del = array();
foreach($htmlItems as $key=>&$item)
{
	if (isset($item->state) && $item->state < 1)
	{
		$del[] = $key;
		continue;
	}

	if ($showtitles)
	{
		$item->title = Text::_($item->title);
	}
}
unset($item);

foreach($del as $key) unset($htmlItems[$key]);
if (empty($htmlItems))
{
	return;
}

require JModuleHelper::getLayoutPath('mod_bfhtmlblocklist', $params->get('layout', 'default'));

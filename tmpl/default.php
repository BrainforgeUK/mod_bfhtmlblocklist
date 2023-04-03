<?php
/**
 * @package   Module for displaying a list of HTML code blocks.
 * @version   0.0.1
 * @author    https://www.brainforge.co.uk
 * @copyright Copyright (C) 2023 Jonathan Brain. All rights reserved.
 * @license   GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

// no direct access
defined('_JEXEC') or die;

/**
 * @var array $htmlItems
 * @var int $showtitles
 * @var string $headerTag
 * @var string $headerClass
 */

$headerStart = '<' . $headerTag . ' class="' . $headerClass . '">';
$headerEnd = '</' . $headerTag . '>'
?>
<div class="bfhtmlblocklist">
    <?php
    foreach($htmlItems as $htmlItem)
    {
        ?>
        <div class="bfhtmlblocklist-item">
            <?php
            if ($showtitles)
            {
	            echo $headerStart;
                echo htmlspecialchars($htmlItem->title);
	            echo $headerEnd;
            }

            echo $htmlItem->html;
            ?>
        </div>
        <?php
    }
    ?>
</div>

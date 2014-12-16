<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on stmd.js
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Block\Renderer;

use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Element\Paragraph;
use League\CommonMark\HtmlRenderer;

class ParagraphRenderer implements BlockRendererInterface
{
    /**
     * @param Paragraph $block
     * @param HtmlRenderer $htmlRenderer
     * @param bool $inTightList
     *
     * @return string
     */
    public function render(AbstractBlock $block, HtmlRenderer $htmlRenderer, $inTightList = false)
    {
        if ($inTightList) {
            return $htmlRenderer->renderInlines($block->getInlines());
        } else {
            return $htmlRenderer->inTags('p', array(), $htmlRenderer->renderInlines($block->getInlines()));
        }
    }
}
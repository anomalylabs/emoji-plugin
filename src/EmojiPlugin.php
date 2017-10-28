<?php namespace Anomaly\EmojiPlugin;

use Anomaly\EmojiPlugin\Emoji\Command\GetEmoji;
use Anomaly\EmojiPlugin\Emoji\Command\ReplaceEmojis;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class EmojiPlugin
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class EmojiPlugin extends Plugin
{

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'emoji',
                function ($code) {
                    return $this->dispatch(new GetEmoji($code));
                }
            ),
        ];
    }

    /**
     * Get the filters.
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter(
                'emoji',
                function ($content) {
                    return $this->dispatch(new ReplaceEmojis($content));
                }
            ),
        ];
    }

}

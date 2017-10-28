<?php namespace Anomaly\EmojiPlugin\Emoji\Command;

use Anomaly\EmojiPlugin\Emoji\EmojiRegistry;

/**
 * Class ReplaceEmojis
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ReplaceEmojis
{

    /**
     * The content to replace emojis in.
     *
     * @var string
     */
    protected $content;

    /**
     * Create a new ReplaceEmojis instance.
     *
     * @param string $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Handle the command.
     *
     * @param EmojiRegistry $registry
     * @return string
     */
    public function handle(EmojiRegistry $registry)
    {
        return preg_replace_callback(
            "/(\:[+_a-z1]{1,}\:)/",
            function ($match) use ($registry) {
                return $registry->get(substr($match[0], 1, -1));
            },
            $this->content
        );
    }
}

<?php namespace Anomaly\EmojiPlugin\Emoji\Command;

use Anomaly\EmojiPlugin\Emoji\EmojiRegistry;

/**
 * Class GetEmoji
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetEmoji
{

    /**
     * The emoji code.
     *
     * @var string
     */
    protected $code;

    /**
     * Create a new GetEmoji instance.
     *
     * @param string $emoji
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Handle the command.
     *
     * @param EmojiRegistry $registry
     * @return array|null
     */
    public function handle(EmojiRegistry $registry)
    {
        return $registry->get(str_replace(':', '', $this->code));
    }
}

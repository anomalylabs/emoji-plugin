<?php namespace Anomaly\EmojiPlugin\Emoji;

/**
 * Class EmojiRegistry
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class EmojiRegistry
{

    /**
     * Available emojis.
     *
     * @var array
     */
    protected $emojis = [];

    /**
     * Get an emoji.
     *
     * @param  $emoji
     * @return array|null
     */
    public function get($emoji)
    {
        if (!$emoji) {
            return null;
        }

        return array_get($this->emojis, $emoji);
    }

    /**
     * Register a emoji.
     *
     * @param        $emoji
     * @param  array $parameters
     * @return $this
     */
    public function register($emoji, array $parameters)
    {
        array_set($this->emojis, $emoji, $parameters);

        return $this;
    }

    /**
     * Get the emojis.
     *
     * @return array
     */
    public function getEmojis()
    {
        return $this->emojis;
    }

    /**
     * Set the emojis.
     *
     * @param array $emojis
     * @return $this
     */
    public function setEmojis(array $emojis)
    {
        $this->emojis = $emojis;

        return $this;
    }
}

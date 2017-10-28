<?php namespace Anomaly\EmojiPlugin\Emoji\Command;

use Illuminate\Contracts\Config\Repository;

/**
 * Class ReplaceAliases
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ReplaceAliases
{

    /**
     * The content to replace aliases in.
     *
     * @var string
     */
    protected $content;

    /**
     * Create a new ReplaceAliases instance.
     *
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Handle the command.
     *
     * @param Repository $config
     */
    public function handle(Repository $config)
    {
        $aliases = $config->get('anomaly.plugin.emoji::emojis.aliases', []);

        return preg_replace_callback(
            "/" . implode(
                '|',
                array_map(
                    function ($alias) {
                        return preg_quote($alias);
                    },
                    array_keys($aliases)
                )
            ) . "/",
            function ($match) use ($aliases) {
                return ':' . $aliases[$match[0]] . ':';
            },
            $this->content
        );
    }
}

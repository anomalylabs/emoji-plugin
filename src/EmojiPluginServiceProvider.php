<?php namespace Anomaly\EmojiPlugin;

use Anomaly\EmojiPlugin\Emoji\EmojiRegistry;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Illuminate\Contracts\Config\Repository;

/**
 * Class EmojiPluginServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class EmojiPluginServiceProvider extends AddonServiceProvider
{

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        EmojiRegistry::class => EmojiRegistry::class,
    ];

    /**
     * Register the addon.
     *
     * @param Repository $config
     * @param EmojiRegistry $registry
     */
    public function register(Repository $config, EmojiRegistry $registry)
    {
        $registry->setEmojis($config->get($this->addon->getNamespace('emojis')));
    }

}

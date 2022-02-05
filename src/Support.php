<?php

namespace Porter;

class Support
{
    public const SUPPORTED_META = [
        'name',
        'prefix',
        'features',
        'options',
    ];

    public const SUPPORTED_FEATURES = [
        'Users',
        'Passwords',
        'Categories',
        'Discussions',
        'Comments',
        'Polls',
        'Roles',
        'Avatars',
        'PrivateMessages',
        'Signatures',
        'Attachments',
        'Tags',
        'Bookmarks',
        'Permissions',
        'Ranks',
        'Reactions',
        'Badges',
        'UserNotes',
        'UserWall',
        'Groups',
        'Emoji',
        'Articles',
    ];

    private static $instance = null;

    private $sources = [];

    private $targets = [];

    public static function getInstance(): self
    {
        if (self::$instance == null) {
            self::$instance = new Support();
        }

        return self::$instance;
    }

    /**
     * @return array
     */
    public function getSources(): array
    {
        return $this->sources;
    }

    /**
     * @return array
     */
    public function getTargets(): array
    {
        return $this->targets;
    }

    /**
     * Accepts the `SUPPORTED` array from each package to build a list.
     *
     * @param array $sources
     * @return void
     */
    public function setSources(array $sources): void
    {
        foreach ($sources as $name) {
            $classname = '\Porter\Source\\' . $name;
            $this->sources[$name] = $classname::getSupport();
        }
    }

    /**
     * Accepts the `SUPPORTED` array from each package to build a list.
     *
     * @param array $targets
     * @return void
     */
    public function setTargets(array $targets): void
    {
        foreach ($targets as $name) {
            $classname = '\Porter\Target\\' . $name;
            $this->targets[$name] = $classname::getSupport();
        }
    }

    /**
     * Get the data support status for a single platform feature.
     *
     * @param string $package
     * @param string $feature
     * @return string HTML-wrapped Yes or No symbols.
     */
    public function getFeatureStatusHtml(string $package, string $feature, bool $notes = true): string
    {
        $supported = $this->getSources();

        if (!isset($supported[$package]['features'])) {
            return '<span class="No">No</span>';
        }

        $available = $supported[$package]['features'];

        // Calculate feature availability.
        $status = '<span class="No">&#x2717;</span>';
        if (isset($available[$feature])) {
            if ($available[$feature] === 1) {
                $status = '<span class="Yes">&#x2713;</span>';
            } elseif ($available[$feature]) {
                if ($notes) {
                    // Send the text of the note
                    $status = $available[$feature];
                } else {
                    // Say 'yes' for table shorthand
                    $status = '<span class="Yes">&#x2713;</span>';
                }
            }
        }

        return $status;
    }

    /**
     * Define what data can be successfully ported to Vanilla.
     *
     * First array key is where the data is stored.
     * Second array key is the feature name, and value is one of:
     *    - 0 if unsupported
     *    - 1 if supported
     *    - string if supported, with notes or caveats
     *
     * @return array
     */
    public function getAllFeatures(): array
    {
        return array_fill_keys(self::SUPPORTED_FEATURES, 0);
    }
}
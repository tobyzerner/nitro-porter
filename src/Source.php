<?php

namespace Porter;

abstract class Source
{
    public const SUPPORTED = [
        'name' => '',
        'prefix' => '',
        'charset_table' => '',
        'hashmethod' => '',
        'options' => [],
        'features' => [],
    ];

    protected const FLAGS = [];

    protected bool $useDiscussionBody = true;

    /**
     * @deprecated
     * @var ExportModel
     */
    public $exportModel = null;

    /**
     * @deprecated
     * @var array Required tables, columns set per exporter
     */
    public $sourceTables = array();

    /**
     * Forum-specific export routine
     */
    abstract public function run(ExportModel $ex);

    /**
     * Register supported features.
     */
    public static function getSupport(): array
    {
        return static::SUPPORTED;
    }

    /**
     * Retrieve characteristics of the package.
     *
     * @param string $name
     * @return mixed|null
     */
    public static function getFlag(string $name)
    {
        return (isset(static::FLAGS[$name])) ? static::FLAGS[$name] : null;
    }

    public function getDiscussionBodyMode(): bool
    {
        return $this->useDiscussionBody;
    }

    public function skipDiscussionBody()
    {
        $this->useDiscussionBody = false;
    }

    /**
     * @return string
     */
    public static function getCharSetTable(): string
    {
        $charset = '';
        if (isset(self::getSupport()['charset_table'])) {
            $charset = self::getSupport()['charset_table'];
        }
        return $charset;
    }

    /**
     * Set CDN file prefix if one is given.
     *
     * @deprecated
     * @return string
     */
    public function cdnPrefix()
    {
        $cdn = rtrim(Request::instance()->get('cdn') ?? '', '/');
        if ($cdn) {
            $cdn .= '/';
        }

        return $cdn;
    }

    /**
     * Retrieve a parameter passed to the export process.
     * @deprecated
     *
     * @param  string $name
     * @param  mixed  $default Fallback value.
     * @return mixed Value of the parameter.
     */
    public function param($name, $default = false)
    {
        $value = Request::instance()->get($name);
        if ($value === '') {
            $value = $default;
        }
        return $value;
    }
}

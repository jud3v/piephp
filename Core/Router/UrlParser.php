<?php


namespace Core\Router;


class UrlParser
{
    /**
     * The url to parse
     * @var string
     */
    private string $url;

    /**
     * UrlParser constructor.
     * @param $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function parse()
    {

    }
}
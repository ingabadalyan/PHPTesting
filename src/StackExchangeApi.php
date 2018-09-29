<?php


namespace StackExchange;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class StackExchangeApi extends Client
{
    const API_VERSION = '2.2';

    public function __construct(array $config = [])
    {
        $config['base_uri'] = getenv('STACKEXCHANGE_BASE_URL');
        parent::__construct($config);
    }

    /**
     * @return ResponseInterface
     */
    public function getInfo()
    {
        $url = $this->buildUrl('/info?site=stackoverflow');
        return $this->get($url);
    }

    /**
     * @param string $order
     * @param string $sort
     * @return ResponseInterface
     */
    public function getAnswers(string $order = 'desc', string $sort = 'activity')
    {
        $url = $this->buildUrl(sprintf('/answers?order=%s&sort=%s&site=stackoverflow', $order, $sort));
        return $this->get($url);
    }

    /**
     * @param string $url
     * @return string
     */
    private function buildUrl(string $url): string
    {
        return sprintf('/%s/%s', self::API_VERSION, $url);
    }
}

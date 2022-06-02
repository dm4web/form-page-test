<?php

declare(strict_types=1);

/**
 * @author    Daniil Molchanov <sadme28@gmail.com>
 * @copyright Copyright (c) 2022, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\ICNDB\Client;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * ICNDB client
 */
class ICNDBClient implements ICNDBClientInterface
{
    /**
     * @var \GuzzleHttp\ClientInterface
     */
    private $http;

    /**
     * @param \GuzzleHttp\ClientInterface $icndbClient
     */
    public function __construct(ClientInterface $icndbClient)
    {
        $this->http = $icndbClient;
    }

    /**
     * {@inheritDoc}
     */
    public function send(string $method, string $uri, array $params): array
    {
        $response = $this->http->request($method, $uri, $params);

        return $this->getData($response);
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return array
     *
     * @throws \Exception
     */
    private function getData(ResponseInterface $response): array
    {
        $json = $response->getBody()->getContents();

        $data = json_decode($json, true);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \Exception(sprintf('JSON error: %s', json_last_error_msg()));
        }

        if (!is_array($data)) {
            throw new \Exception(sprintf('Response data is not array: %s', $data));
        }

        return $data['value'];
    }
}

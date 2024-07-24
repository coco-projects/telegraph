<?php

    declare(strict_types = 1);

    namespace Coco\telegraph;

    use Coco\telegraph\exceptions\FileUploaderException;
    use Coco\telegraph\exceptions\TelegraphRequestException;
    use Coco\telegraph\services\AccountService;
    use Coco\telegraph\services\PageService;
    use GuzzleHttp\Client;

class Telegraph
{
    private string $api       = 'https://api.telegra.ph/';
    private string $uploadApi = 'https://telegra.ph';

    private Client  $client;
    private ?string $token = null;

    private static string $proxyHost   = '127.0.0.1';
    private static int    $proxyPort   = 1080;
    private static bool   $enableProxy = false;
    private static bool   $debug       = false;

    private ?PageService    $pageService    = null;
    private ?AccountService $accountService = null;

    public function __construct($telegraphAccountToken = null)
    {
        $options = [
            'timeout' => 10000,
            'verify'  => false,
            'debug'   => static::$debug,
        ];

        if (static::$enableProxy) {
            $options['proxy'] = "socks5h://" . static::$proxyHost . ":" . static::$proxyPort;
        }

        $this->client = new Client($options);
        $this->setToken($telegraphAccountToken);

        $this->pageService    = new PageService($this);
        $this->accountService = new AccountService($this);
    }

    public static function setProxyEnable(bool $enable): void
    {
        static::$enableProxy = $enable;
    }

    public static function setDebug(bool $enable): void
    {
        static::$debug = $enable;
    }

    public static function setProxy($ip = '127.0.0.1', $port = '1080'): void
    {
        static::$proxyHost = $ip;
        static::$proxyPort = $port;
    }

    public function page(): PageService
    {
        return $this->pageService;
    }

    public function account(): AccountService
    {
        return $this->accountService;
    }

    public function setToken(?string $token = null): static
    {
        if (!is_null($token)) {
            $this->token = $token;
        }

        return $this;
    }

    public function hasToken(): bool
    {
        return !is_null($this->token);
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function handleRequest(string $method, array $data = [], bool $tokenRequired = true): mixed
    {
        $requestData['json'] = $data;

        if ($tokenRequired && !$this->hasToken()) {
            throw new TelegraphRequestException("Method {$method} requires access token");
        }

        if ($this->hasToken()) {
            $requestData['json']['access_token'] = $this->token;
        }

        $contents = $this->client->post($this->api . $method, $requestData)->getBody()->getContents();

        $response = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

        if (!$response['ok']) {
            throw new TelegraphRequestException($response['error']);
        }

        return $response['result'];
    }

    public function upload(string $file): ?string
    {
        // 检查文件是否存在，以及是否具有读取权限
        if (!file_exists($file)) {
            throw new FileUploaderException("File does not exist: {$file}");
        }

        if (!is_readable($file)) {
            throw new FileUploaderException("File is not readable: {$file}");
        }

        // 打开文件并保证后续关闭
        $fileStream = fopen($file, 'r');

        if ($fileStream === false) {
            throw new FileUploaderException("Failed to open file: {$file}");
        }

        $options = [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => $fileStream,
                    'filename' => basename($file),
                ],
            ],
            'headers'   => [
                'Accept'           => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Referer'          => $this->uploadApi,
                'User-Agent'       => static::getRandomUserAgent(),
            ],
        ];

        try {
            $response     = $this->client->post($this->uploadApi . '/upload/', $options);
            $contents     = $response->getBody()->getContents();
            $responseData = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

            if (isset($responseData['error'])) {
                throw new FileUploaderException($responseData['error']);
            }

            return $this->uploadApi . ($responseData[0]['src'] ?? null);
        } catch (\JsonException $e) {
            throw new FileUploaderException('Failed to parse response JSON: ' . $e->getMessage());
        } catch (\Exception $e) {
            throw new FileUploaderException('Upload failed: ' . $e->getMessage());
        } finally {
            if (is_resource($fileStream)) {
                fclose($fileStream);
            }
        }
    }

    protected static function getRandomUserAgent(): string
    {
        $userAgents = [
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0',
            'Mozilla/5.0 (X11; Linux x86_64; rv:105.0) Gecko/20100101 Firefox/105.0',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; rv:105.0) Gecko/20100101 Firefox/105.0',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:105.0) Gecko/20100101 Firefox/105.0',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Safari/605.1.15',
        ];

        return $userAgents[array_rand($userAgents)];
    }
}

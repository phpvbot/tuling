<?php
/**
 * Created by PhpStorm.
 * User: 雪风
 * Date: 2017-10-21
 * Time: 13:36
 */

namespace Vbot\Tuling;


use Hanson\Vbot\Console\Console;
use Hanson\Vbot\Extension\AbstractMessageHandler;
use Hanson\Vbot\Message\Text;
use Illuminate\Support\Collection;
use Vbot\Http\Http;

class Tuling extends AbstractMessageHandler
{

    public $name = 'tuling';
    public $zhName = '图灵机器人';
    public $author = '雪风';
    public $version = '1.0';
    public $baseExtensions = [
        Http::class,
    ];

    public function register()
    {
        $default_config = [
            'status'        => false,   //默认关闭机器人
            'api'           => 'http://www.tuling123.com/openapi/api',
            'key'           => '2b700ebfec6593f3e2f452b3bcb8be6e',
            'error_message' => '图灵机器人失灵了，暂时没法陪聊了，T_T！',
        ];
        $this->config = array_merge($default_config, $this->config);
        $this->status = $this->config['status'];
    }

    public function handler(Collection $message)
    {
        if ($this->config['status'] && $message['type'] === 'text' && ($message['fromType'] === 'Friend' || $message['isAt'])) {
            $username = $message['from']['UserName'];
            $options = [
                'form_params' => [
                    'key'    => $this->config['key'],
                    'info'   => $message['pure'],
                    'userid' => $message['from']['NickName']
                ]
            ];
            try {
                $response = Http::request('POST', $this->config['api'], $options);
                vbot('console')->log($response, '图灵消息');
                $data = json_decode($response);
                switch ($data->code) {
                    case 100000:
                        return Text::send($username, $data->text);
                    case 200000:
                        return Text::send($username, "$data->text ：$data->url");
                    default:
                        return Text::send($username, $this->config['error_message']);
                }
            } catch (\Exception $e) {
                vbot('console')->log($e->getMessage(), Console::ERROR);
                return Text::send($username, $this->config['error_message']);
            }
        }
    }
}
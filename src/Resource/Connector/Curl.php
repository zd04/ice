<?php
namespace Ice\Resource\Connector;
class Curl extends Abs {
    public static function getSn($nodeConfig, $nodeOptions) {
        return sprintf('%s:%s:%s', $nodeOptions['scheme'], $nodeConfig['host'], $nodeConfig['port']);
    }

    public static function getConn($nodeInfo) {
        $mysqli  = curl_init();

        $options = $nodeInfo['options'];
        $config  = $nodeInfo['config'];

        $defaultOptions = array(
            CURLOPT_RETURNTRANSFER      => TRUE,  // 返回结果
            CURLOPT_FOLLOWLOCATION      => TRUE,  // 支持302跳转
            CURLOPT_MAXREDIRS           => 5,     // 最大跳转次数
            CURLOPT_NOSIGNAL            => TRUE,  // Hack不能设置1000ms内超时问题
            CURLOPT_CONNECTTIMEOUT_MS   => 100,   // 100ms连接超时默认
            CURLOPT_TIMEOUT_MS          => 500,   // 500ms读写超时默认
        );

        if (isset($options['setopt'])) {
            $usedOptions = array_merge($defaultOptions, (array)$options['setopt']);
        } else {
            $usedOptions = $defaultOptions;
        }

        curl_setopt_array($curl, $usedOptions);

        return $curl;
    }
}

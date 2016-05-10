<?php
namespace Ice\Resource\Handler;
class Curl {
    protected function getFullUrl($path) {
        $host   = $this->nodeConfig['host'];
        $path   = '/' . ltrim($path, '/');
        $scheme = $this->nodeOptions['scheme'] ?: 'http';
        $port   = '';
        if (isset($this->nodeConfig['port'])) {
            if ($scheme == 'http' && $this->nodeConfig['port'] != 80
                    || $scheme == 'https' && $this->nodeConfig['port'] != 443) {
                $port = ':' . $this->nodeConfig['port'];
            }
        }
        if (isset($this->nodeOptions['hostname'])) {
            curl_setopt($this->conn, CURLOPT_HTTPHEADER, array("Host: {$this->nodeOptions['hostname']}"));
        }

        return sprintf('%s://%s%s%s', $scheme, $host, $port, $path);
    }

    public function post($path, $datas = array(), $opts = array(), &$respInfo = array()) {
        $postFields = is_array($datas) ? $datas : (string)$datas;

        $url = $this->getFullUrl($path);

        curl_setopt($this->conn, CURLOPT_URL, $url);

        curl_setopt($this->conn, CURLOPT_POST, TRUE);
        if ($postFields) {
            curl_setopt($this->conn, CURLOPT_POSTFIELDS, $postFields);
        }

        if (is_array($opts) && !empty($opts)) {
            curl_setopt_array($this->conn, $opts);
        }

        $respBody = curl_exec($this->conn);
        $respInfo = curl_getinfo($this->conn);

        if ($respInfo['http_code'] != '200') {
            return FALSE;
        }

        return strval($respBody);
    }

    public function get($path, $datas = array(), $opts = array(), &$respInfo = array()) {
        $postFields = is_array($datas) ? $datas : (string)$datas;

        $url    = $this->getFullUrl($path);

        curl_setopt($this->conn, CURLOPT_URL, $url);

        curl_setopt($this->conn, CURLOPT_HTTPGET, TRUE);
        if ($postFields) {
            curl_setopt($this->conn, CURLOPT_POSTFIELDS, $postFields);
        }

        if (is_array($opts) && !empty($opts)) {
            curl_setopt_array($this->conn, $opts);
        }

        $respBody = curl_exec($this->conn);
        $respInfo = curl_getinfo($this->conn);

        if ($respInfo['http_code'] != '200') {
            return FALSE;
        }

        return strval($respBody);
    }
}

<?php

namespace lsstore;

final class Store
{
    protected $settings;
    public function __construct()
    {
        $this->settings = json_decode(file_get_contents(IA_ROOT . DIRECTORY_SEPARATOR . 'seetings.json'), true);
    }
    public function upfile($file, $name)
    {
        return $this->cos_up($file, $name);
        // return $this->cos_del('http://cloud.ls11.cn/294ea5a256693d53193de852c178e70a1638954575.png');
    }
    private function qiniu_up($file, $name)
    {
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'qiniu.php';
        $bucket = $this->settings['qiniu_storage'];
        $rootname = $this->settings['qiniu_domain'];

        $auth = new \Qiniu\Auth($this->settings['qiniu_key'], $this->settings['qiniu_secret']);
        $token = $auth->uploadToken($bucket);
        $uploadMgr = new \Qiniu\Storage\UploadManager();
        list($ret, $err) = $uploadMgr->putFile($token, $name, $file['tmp_name']);
        if ($err !== null) {
            return $err->getResponse();
        } else {
            return trim($rootname) . '/' . $ret['key'];
        }
    }
    private function qiniu_del($url)
    {
        $object = substr($url, strripos($url, "/") + 1);
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'qiniu.php';
        $auth = new \Qiniu\Auth($this->settings['qiniu_key'], $this->settings['qiniu_secret']);
        $config = new \Qiniu\Config();
        $bucketManager = new \Qiniu\Storage\BucketManager($auth, $config);
        $err = $bucketManager->delete($this->settings['qiniu_storage'], $object);
        if ($err && $err[1]) {
            return $err[1]->message();
        } else {
            return 1;
        }
    }
    private function oss_up($file, $name)
    {
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'oss.php';
        try {
            if ($this->settings['open_alitype'] == 1) {
                $ossClient = new \OSS\OssClient($this->settings['ali_key'], $this->settings['ali_secret'], $this->settings['ali_endpoint']);
            } else {
                $ossClient = new \OSS\OssClient($this->settings['ali_key'], $this->settings['ali_secret'], trim($this->settings['ali_zdyurl']), true);
            }
            $result = $ossClient->uploadFile($this->settings['ali_storage'], $name, $file['tmp_name']);
            return $result['info']['url'];
        } catch (\OSS\Core\OssException $e) {
            return $e->getMessage();
        }
    }
    private function oss_del($url)
    {
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'oss.php';
        $object = substr($url, strripos($url, "/") + 1);
        try {
            $ossClient = new \OSS\OssClient($this->settings['ali_key'], $this->settings['ali_secret'], $this->settings['ali_endpoint']);
            $ossClient->deleteObject($this->settings['ali_storage'], $object);
            return 1;
        } catch (\OSS\Core\OssException $e) {
            return $e->getMessage();
        }
    }
    private function cos_up($file, $name)
    {
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'cos.php';
        $this->settings['cos_bucket'] = 'cloud-1251159048';
        $this->settings['cos_local'] = 'ap-chengdu';
        $this->settings['cos_domain'] = 'cloud.ls11.cn';
        $this->settings['cos_ishttp'] = $this->settings['cos_ishttp'] ? 'https' : 'http';
        $cosClient = new \Qcloud\Cos\Client(
            array(
                'region' => $this->settings['cos_local'],
                'schema' => 'https', //协议头部，默认为http
                'credentials' => array(
                    'secretId'  => $this->settings['cos_secretid'],
                    'secretKey' => $this->settings['cos_secretkey']
                )
            )
        );
        try {
            $bucket = $this->settings['cos_bucket'];
            $file = file_get_contents($file['tmp_name']);
            if ($file) {
                $result = $cosClient->putObject(array(
                    'Bucket' => $bucket,
                    'Key' => $name,
                    'Body' => $file
                ));
                if (!empty($this->settings['cos_domain'])) {
                    return $this->settings['cos_ishttp'] . '://' . $this->settings['cos_domain'] . '/' . $name;
                } else {
                    return $this->settings['cos_ishttp'] . '://' . $this->settings['cos_bucket'] . '.cos.' . $this->settings['cos_local'] . '.myqcloud.com/' . $name;
                }
            } else {
                return 'not file.';
            }
        } catch (\Qcloud\Cos\Exception\ServiceResponseException $e) {
            return $e->getMessage();
        }
    }
    private function cos_del($url)
    {
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'cos.php';
        $object = substr($url, strripos($url, "/") + 1);
        $cosClient = new \Qcloud\Cos\Client(
            array(
                'region' => $this->settings['cos_local'],
                'schema' => 'https', //协议头部，默认为http
                'credentials' => array(
                    'secretId'  => $this->settings['cos_secretid'],
                    'secretKey' => $this->settings['cos_secretkey']
                )
            )
        );
        try {
            $bucket = $this->settings['cos_bucket'];
            $result = $cosClient->deleteObject(array(
                'Bucket' => $bucket,
                'Key' => $object,
            ));
            return 1;
        } catch (\Exception $e) {
            return 0;
        }
    }
}

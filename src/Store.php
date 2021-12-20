<?php

namespace lstore;

use BaconQrCode\Renderer\Path\Close;

/**
 * 文件储存
 *
 * @Author 老良 1064688548@qq.com
 * @DateTime 2021-12-14 11:38:21
 * @version 1.0.1
 */
final class Store
{
    protected $settings;
    public function __construct()
    {
        $this->settings = get_storage_info();
    }
    /**
     * 文件上传
     *
     * @Author 老良 1064688548@qq.com
     * @DateTime 2021-12-12
     * @version 1.0.1
     * @param string $file 文件地址
     * @param string $name 文件名称
     * @param boolean $app 是否app文件夹
     * @param array $config 配置信息（array otherdir:系统文件夹最外层文件夹地址，dirname：区分文件夹）
     * @return void
     */
    public function upfile($file, $name, $app = false, $config = array())
    {
        if ($this->settings['stortype'] == 'qiniu') {
            return $this->qiniu_up($file, $name);
        } elseif ($this->settings['stortype'] == 'oss') {
            return $this->oss_up($file, $name);
        } elseif ($this->settings['stortype'] == 'cos') {
            return $this->cos_up($file, $name);
        } elseif ($this->settings['stortype'] == 'bos') {
            return $this->bos_up($file, $name);
        } elseif ($this->settings['stortype'] == 'upyun') {
            return $this->upyun_up($file, $name);
        } elseif ($this->settings['stortype'] == 'obs') {
            return $this->obs_up($file, $name);
        } else {
            return $this->local_up($file, $name, $app, $config);
        }
    }
    /**
     * Undocumented function
     *
     * @Author 老良 1064688548@qq.com
     * @DateTime 2021-12-12
     * @version 1.0.1
     * @param string $url 文件云链接
     * @param array $config 配置信息（array otherdir:系统文件夹最外层文件夹地址，dirname：区分文件夹）
     * @return void
     */
    public function delfile($url, $config = array())
    {
        if ($this->settings['stortype'] == 'qiniu') {
            return $this->qiniu_del($url);
        } elseif ($this->settings['stortype'] == 'oss') {
            return $this->oss_del($url);
        } elseif ($this->settings['stortype'] == 'cos') {
            return $this->cos_del($url);
        } elseif ($this->settings['stortype'] == 'bos') {
            return $this->bos_del($url);
        } elseif ($this->settings['stortype'] == 'upyun') {
            return $this->upyun_del($url);
        } elseif ($this->settings['stortype'] == 'obs') {
            return $this->obs_del($url);
        } else {
            return $this->local_del($url, $config);
        }
    }
    private function local_up($file, $name, $app, $config)
    {
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'local.php';
        $localup = new \Local\Client(array(
            'otherdir' => $config['otherdir'],
            'dirname' => $config['dirname'],
        ));
        return $localup->local_up($file, $name, $app);
    }
    private function local_del($url, $config)
    {
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'local.php';
        $localup = new \Local\Client(array(
            'dirname' => $config['dirname'],
        ));
        return $localup->local_del($url, $localup);
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
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'local.php';
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
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'local.php';
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
    public function bos_up($file, $name)
    {
        $phar = __DIR__ . DIRECTORY_SEPARATOR . 'BaiduBce.phar';
        if (!file_exists($phar)) {
            file_download('https://lshd.gz.bcebos.com/tool/BaiduBce.phar', $phar);
        }
        include $phar;
        $BOS_CONFIG =
            array(
                'credentials' => array(
                    'ak' => $this->settings['bos_accesskry'],
                    'sk' => $this->settings['bos_secretkey'],
                ),
                'endpoint' => !empty($this->settings['bos_domain']) ? ('https://' . $this->settings['bos_domain']) : ('https://' . $this->settings['bos_bucket'] . '.' . $this->settings['bos_local']),
                'custom' => !empty($this->settings['bos_domain']) ? true : false,
            );
        $client = new \BaiduBce\Services\Bos\BosClient($BOS_CONFIG);
        try {
            $client->putObjectFromFile(null, $name, $file['tmp_name']);
            return $BOS_CONFIG['endpoint'] . '/' . $name;
        } catch (\BaiduBce\Exception\BceBaseException $e) {
            return $e->getErrorCode();
        }
    }
    public function bos_del($url)
    {
        $phar = __DIR__ . DIRECTORY_SEPARATOR . 'BaiduBce.phar';
        if (!file_exists($phar)) {
            file_download('https://lshd.gz.bcebos.com/tool/BaiduBce.phar', $phar);
        }
        include $phar;
        $BOS_CONFIG =
            array(
                'credentials' => array(
                    'ak' => $this->settings['bos_accesskry'],
                    'sk' => $this->settings['bos_secretkey'],
                ),
                'endpoint' => !empty($this->settings['bos_domain']) ? $this->settings['bos_domain'] : ('https://' . $this->settings['bos_local']),
                'custom' => !empty($this->settings['bos_bucket']) ? true : false,
            );
        $client = new \BaiduBce\Services\Bos\BosClient($BOS_CONFIG);
        try {
            $object = substr($url, strripos($url, "/") + 1);
            $client->deleteObject($this->settings['bos_bucket'], $this->settings['bos_bucket'] . '/' . $object);
            return true;
        } catch (\BaiduBce\Exception\BceBaseException $e) {
            return $e->getErrorCode();
        }
    }
    public function upyun_up($file, $name)
    {
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'local.php';
        $serviceConfig = new \Upyun\Config($this->settings['upyun_servicename'], $this->settings['upyun_user'], $this->settings['upyun_upwd']);
        // $serviceConfig->setUploadType('BLOCK_PARALLEL');
        $client = new \Upyun\Upyun($serviceConfig);
        $files = fopen($file['tmp_name'], 'r');
        $re = $client->write('/' . $name, $files);
        if (!empty($re['x-upyun-content-length']) && filesize($file['tmp_name'])) {
            return $this->settings['upyun_domain'] . '/' . $name;
        } else {
            return '';
        }
    }
    public function upyun_del($url)
    {
        $object = substr($url, strripos($url, "/"));
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'local.php';
        $serviceConfig = new \Upyun\Config($this->settings['upyun_servicename'], $this->settings['upyun_user'], $this->settings['upyun_upwd']);
        $client = new \Upyun\Upyun($serviceConfig);
        return $client->delete($object, true);
    }
    public function obs_up($file, $name)
    {
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'obs.php';
        $obsClient = new \Obs\ObsClient([
            'key' => $this->settings['obs_accesskey'],
            'secret' => $this->settings['obs_secretkey'],
            'endpoint' => $this->settings['obs_endpoint']
        ]);
        try {
            $resp = $obsClient->putObject([
                'Bucket' => $this->settings['obs_bucket'],
                'Key' => $name,
                'SourceFile' => $file['tmp_name']
            ]);
            $as = $resp->toArray();
            return $as['ObjectURL'];
        } catch (\Obs\ObsException $e) {
            return $e->getExceptionMessage();
        }
    }
    public function obs_del($url)
    {
        $object = substr($url, strripos($url, "/") + 1);
        require __DIR__ . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'obs.php';
        $obsClient = new \Obs\ObsClient([
            'key' => $this->settings['obs_accesskey'],
            'secret' => $this->settings['obs_secretkey'],
            'endpoint' => $this->settings['obs_endpoint']
        ]);
        $resp = $obsClient->deleteObject([
            'Bucket' => $this->settings['obs_bucket'],
            'Key' => $object,
        ]);
        $as = $resp->toArray();
        return 1;
    }
}

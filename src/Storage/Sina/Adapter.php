<?php

/*
 * Copyright (C) 2016 SINA Corporation
 *  
 *  
 * 
 * This script is firstly created at 2016-08-29.
 * 
 * To see more infomation,
 *    visit our official website http://app.finance.sina.com.cn/.
 */

namespace Jiaojie\Laravel\Storage\Sina;

use League\Flysystem\AdapterInterface;
use League\Flysystem\Config as LConfig;
use SCS;

/**
 * Description of Adapter
 *
 * @encoding UTF-8 
 * @author jiaojie <jiaojie@staff.sina.com.cn> 
 * @since 2016-08-29 19:32 (CST) 
 * @version 0.1
 * @description 
 */
class Adapter implements AdapterInterface {

    /**
     *
     * @var \Sina\Storage\Client 
     */
    protected $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function copy($path, $newpath) {
        
    }

    public function createDir($dirname, LConfig $config) {
        
    }

    public function delete($path) {
        
    }

    public function deleteDir($dirname) {
        
    }

    public function getMetadata($path) {
        
    }

    public function getMimetype($path) {
        
    }

    public function getSize($path) {
        
    }

    public function getTimestamp($path) {
        
    }

    public function getVisibility($path) {
        
    }

    public function has($path) {
        
    }

    public function listContents($directory = '', $recursive = false) {
        $contents = $this->client->getBucket("file.finance.sina.com.cn", $directory . "/", null, null, '/', true);
        $ret = [];
        foreach ($contents as $k => $v) {
            if (isset($v["prefix"])) {
                $ret[] = [
                    "type" => "dir",
                    "path" => substr($k, 0, -1),
                ];
            } else {
                $ret[] = [
                    "type" => "file",
                    "path" => $k,
                    "size" => $v["size"],
                    "mime" => $v["type"],
                    "timestamp" => $v["time"],
                ];
            }
        }
        return $ret;
    }

    public function read($path) {
        
    }

    public function readStream($path) {
        
    }

    public function rename($path, $newpath) {
        
    }

    public function setVisibility($path, $visibility) {
        
    }

    public function update($path, $contents, LConfig $config) {
        
    }

    public function updateStream($path, $resource, LConfig $config) {
        
    }

    public function write($path, $contents, LConfig $config) {
        return $this->client->putObject($contents, $this->client->bucket, $path, SCS::ACL_PUBLIC_READ, [], $config->get("Content-Type"));
    }

    public function writeStream($path, $resource, LConfig $config) {
        
    }

}

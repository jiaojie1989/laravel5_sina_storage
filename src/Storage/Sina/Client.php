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

use SCS;

/**
 * Description of Client
 *
 * @encoding UTF-8 
 * @author jiaojie <jiaojie@staff.sina.com.cn> 
 * @since 2016-08-29 19:32 (CST) 
 * @version 0.1
 * @description 
 */
class Client {

    /**
     * SCS Client
     * 
     * @var \SCS 
     */
    protected $client;

    /**
     * ACL
     *
     * @var string 
     */
    protected $acl;

    /**
     * Bucket
     * 
     * @var string 
     */
    protected $bucket;

    public function __construct($accessKey, $secretKey, $useSSL = false, $endpoint = 'sinastorage.com', $bucket = "file.finance.sina.com.cn", $acl = \SCS::ACL_PUBLIC_READ) {
        $this->client = new SCS($accessKey, $secretKey, $useSSL, $endpoint);
        $this->acl = $acl;
        $this->bucket = $bucket;
    }

    public function __get($name) {
        return isset($this->$name) ? $this->$name : null;
    }

    public function __call($name, $arguments) {
        return call_user_func_array([$this->client, $name], $arguments);
    }

}

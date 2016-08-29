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

use League\Flysystem\Filesystem;
use Jiaojie\Laravel\Storage\MimeTypes;

/**
 * Description of FilesystemImpl
 *
 * @encoding UTF-8 
 * @author jiaojie <jiaojie@staff.sina.com.cn> 
 * @since 2016-08-29 19:27 (CST) 
 * @version 0.1
 * @description 
 */
class FilesystemImpl extends Filesystem {

    public function __construct(Adapter $adapter, $config = null) {
        parent::__construct($adapter, $config);
    }

    protected function detectContentType($path) {
        return MimeTypes::guessTypeByExtension($path);
    }

    public function put($path, $contents, array $config = []) {
        if (!isset($config["Content-Type"])) {
            $config["Content-Type"] = $this->detectContentType($path);
        }
        return parent::put($path, $contents, $config);
    }

}

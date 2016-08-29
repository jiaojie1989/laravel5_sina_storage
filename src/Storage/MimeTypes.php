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

namespace Jiaojie\Laravel\Storage;

/**
 * Description of MimeTypes
 *
 * @encoding UTF-8 
 * @author jiaojie <jiaojie@staff.sina.com.cn> 
 * @since 2016-08-29 19:30 (CST) 
 * @version 0.1
 * @description 
 */
class MimeTypes {

    public static $mimeTypes = [
        'default' => 'application/octet-stream',
        'doc' => 'application/msword',
        'htm' => 'text/html',
        'html' => 'text/html',
        'pdf' => 'application/pdf',
        'ppt' => 'application/vnd.ms-powerpoint',
        'txt' => 'text/plain',
        'wps' => 'application/vnd.ms-works',
        'xlm' => 'application/vnd.ms-excel',
        'xls' => 'application/vnd.ms-excel',
        'apk' => 'application/vnd.android.package-archive',
        'json' => 'application/json',
        'png' => "image/png",
        'jpg' => "image/jpeg",
        'js' => "application/javascript",
    ];

    public static function getType($type) {
        if (!isset(static::$mimeTypes[strtolower($type)])) {
            $type = "default";
        }
        return static::$mimeTypes[strtolower($type)];
    }

}

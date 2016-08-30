Sina Storage For Laravel 5
===
## Setup
### Setting up Service Provider
Put `Jiaojie\Laravel\Storage\Providers\S3Provider` in your `config/app.php` `providers` array.

### Setting configure for your SINA S3 Service
In your `config/filesystems.php`, put your config array into `disks`.
```php
"sina" => [
            "driver" => "sina",
            "access_key" => "YOUR_ACCESS_KEY",
            "secret_key" => "YOUR_SECRET_KEY",
            "use_ssl" => false,
            "endpoint" => "上传的地址URL",
            "bucket" => "指定的域名地址",
        ],
```

### Use
```php
$disk = Storage::disk("sina");
$disk->put("finapp/js/$filename.js", file_get_contents($path));
```

It will detect the mime type by your defined filename extension, in the example, it is "js".

## Thanks
Thanks to the framework laravel team for its wonderful framework.

Thanks to the league/flysystem for its general api of file system.

Thanks to cloudmario/scs for its api of sina cloud file system.

Finally with many thanks to the php team for its programming language.

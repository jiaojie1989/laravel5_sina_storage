Sina Storage For Laravel 5
===
[![Latest Stable Version](https://poser.pugx.org/jiaojie/laravel5-sina-storage/v/stable.svg)](https://packagist.org/packages/jiaojie/laravel5-sina-storage) [![Total Downloads](https://poser.pugx.org/jiaojie/laravel5-sina-storage/downloads.svg)](https://packagist.org/packages/jiaojie/laravel5-sina-storage) [![Latest Unstable Version](https://poser.pugx.org/jiaojie/laravel5-sina-storage/v/unstable.svg)](https://packagist.org/packages/jiaojie/laravel5-sina-storage) [![License](https://poser.pugx.org/jiaojie/laravel5-sina-storage/license.svg)](https://packagist.org/packages/jiaojie/laravel5-sina-storage)
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

# KS3-SDK for Composer

在[KS3官方SDK](https://github.com/ks3sdk/ks3-php-sdk)基础上，添加对Composer的支持

当前使用官方sdk版本：1.2

## 安装

### Composer

- `"zengdongbao/ks3-php": "dev-master"`

or

	composer install zengdongbao/ks3-php




## 使用


### 客户端初始化


```php

	require './vendor/autoload.php';

	use Zeng\Ks3\Ks3Client;

	$client = Ks3Client::make($ak,$sk,$endpoint);

```



### API



```php

	$client->listBuckets();			获取用户的所有bucket列表

	//或者通过静态方法使用
	Ks3Client::listBuckets();

```	

详细接口请查看官方文档：[ks3sdk/ks3-php-sdk](https://github.com/ks3sdk/ks3-php-sdk)


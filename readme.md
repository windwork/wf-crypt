Windwork 加密解密组件
============================
可逆加密算法组件封装

```
// useage:

$key = '秘钥';
$txt = '明文~';

// 使用AzDG算法加密解密
$crypt = \wf\crypt\CryptFactory::create();  
$enc = $crypt->encrypt($txt, $key); // 加密
$dec = $crypt->decrypt($enc, $key); // 解密

// 使用Xxtea算法加密解密
$crypt = \wf\crypt\CryptFactory::create('Xxtea');
$enc = $crypt->encrypt($txt, $key); // 加密
$dec = $crypt->decrypt($enc, $key); // 解密

```


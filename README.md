SosyoSMM Api Sınıfı
====================

SosyoSMM scriptinin kolay kullanımlı api sınıfının kullanım kılavuzu. 


Not !!
---------------------
Sınıfı dahil etmeden önce Api.php de sınıf içerisinde bulunan $api_url ve $api_key kısımlarını doldurmayı unutmayınız. Api anahtarınıza kullanıcı panelinden ulaşabilirsiniz.
    
Sınıfı dahil edip çalıştıralım
---------------------

``` php
	$api = new Api();
```
    
Bakiye sorgulama
---------------------
   
``` php
 $api->balance();  // 100
```
Aktif servisleri listeleme
---------------------
     
``` php
 $api->services();  // dizi formatında servisleri listeler
```
Sipariş oluşturma
---------------------

``` php
$api->order(array('service' => 1, 'link' => 'http://instagram.com/savascanaltun', 'quantity' => 100));  
```
Tekrarlanan sipariş oluşturma
---------------------
``` php
 $api->order(array('service' => 1, 'link' => 'http://instagram.com/savascanaltun', 'quantity' => 100, 'runs' => 10, 'interval' => 60));
```

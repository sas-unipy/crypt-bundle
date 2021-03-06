# crypt-bundle

Cryptographic Bundle for Symfony 3 using openlss/lib-crypt

## Installation
In AppKernel :
```php
	new UNIPY\CryptBundle\UNIPYCryptBundle(),
```

## Using
```php
	/** @var UNIPY\CryptProvider\Builder\ProvderBuilder $builder **/
	$builder = $container->get('unipy.crypt.default');
	$cryptor = $builder->get($options);
	$crypted = $cryptor->encrypt($data);
	$decrypted = $cryptor->decrypt($crypted);
```

Options depending of the provider used. 

`$data` should be an string to encrypt. It return an base64 encrypted data which can be decrypted using `decrypt()` method.

## Providers

### UNIPY\CryptBundle\Provider\OpenlssLibCryptProvider

#### Options

```php
	$options = array(
		'key' => $myKey,
		'iv' => $myIv, // Optionnal
	);
```

Key is required and can be generated by command `php bin/console unipy:crypt:gen-key`.
Iv is optional and can be generated on the fly by the provider.
Iv can be fetched using `$cryptor->getOptions();` wich return an array with one key `iv`

#### Example
Encrypting data

```php
	$data = "....";
	$myKey = "....";

	$builder = $container->get('unipy.crypt.default');
	$cryptor = $builder->get(array('key' => $myKey));
	$encrypted = $cryptor->encrypt($data);
	$options = $cryptor->getOptions();
	
	$options['data'] = $encrypted;
	file_put_contents($file, serialize($options));
```
Decrypting data 

```php
	$myKey = "...."; // same key used for encryption
	$options = unserialize(file_get_contents($file));
	$encrypted = $options['data'];

	$builder = $container->get('unipy.crypt.default');
	$cryptor = $builder->get(array('key' => $myKey, 'iv' => $options['iv']));
	$data = $cryptor->decrypt($encrypted);
```

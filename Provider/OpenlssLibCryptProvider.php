<?php

namespace UNIPY\CryptBundle\Provider;

use LSS\Crypt;

final class OpenlssLibCryptProvider implements CryptProviderInterface  {

    private $options;

    /**
     * @var Crypt
     */
    private $lib;

    public function __construct($options = array())
    {
        $this->options = $options;
        if(!array_key_exists('iv', $this->options))
            $this->options['iv'] = Crypt::IVCreate();

        $this->lib = Crypt::_get($this->options['key'], $this->options['iv']);
    }

    public function getOptions(){
        return array(
            'iv' => $this->options['iv'],
        );
    }

    public function encrypt($text)
    {
        return $this->lib->encrypt($text, true);
    }

    public function decrypt($text)
    {
        return $this->lib->decrypt($text, true);
    }

}
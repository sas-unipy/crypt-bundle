<?php

namespace UNIPY\CryptBundle\Builder;


use UNIPY\CryptBundle\Provider\CryptProviderInterface;

class ProviderBuilder {
    private $provider;

    public function __construct($provider){
        $this->provider = $provider;
    }

    /**
     * @param array $options
     * @return CryptProviderInterface
     */
    public function get($options = array()){
        return new $this->provider($options);
    }
}
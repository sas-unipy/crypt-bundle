<?php

namespace UNIPY\CryptBundle\Provider;


interface CryptProviderInterface {
    public function __construct($options = array());
    public function getOptions();

    public function encrypt($text);
    public function decrypt($text);
}
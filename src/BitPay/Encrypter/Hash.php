<?php

namespace BitPay\Encrypter;

class Hash implements EncrypterInterface
{
    /**
     * @var string
     */
    private $key;

    /**
     * Default constructor
     *
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Hash the data to send using sha256
     *
     * @param array $data
     * @return string Hashed data
     */
    public function encrypt($data)
    {
        $hmac = base64_encode(hash_hmac('sha256', $data, $this->key, true));

        return strtr($hmac, array('+' => '-', '/' => '_', '=' => ''));
    }
}

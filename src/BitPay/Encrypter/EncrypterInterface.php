<?php
namespace BitPay\Encrypter;

interface EncrypterInterface
{
    /**
     * Encrypt $data
     *
     * @param string $data
     * @return string
     */
    public function encrypt($data);
}

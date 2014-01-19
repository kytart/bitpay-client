<?php namespace BitPay\Tests;

use BitPay\Encrypter\Hash;
use \PHPUnit_Framework_TestCase;

class HashTest extends PHPUnit_Framework_TestCase
{

    public function testEncryptReturnsString()
    {
        $hash = new Hash('key');

        $this->assertTrue(
            is_string($hash->encrypt(serialize('data')))
        );
    }

    public function testEncryptArrayReturnsCorrectHash()
    {
        $hash = new Hash('key');

        $this->assertEquals(
            $hash->encrypt(serialize('data')),
            'TCFzuJLomjQ_nvVWATq8mY6fHzhN_TktdIJchg0Qi4o'
        );
    }

    public function testEncryptStringReturnsCorrectHash()
    {
        $hash = new Hash('key');

        $this->assertEquals(
            $hash->encrypt('data'),
            'UDH-PZicbRU3oBP6bnOdojRj_a7DtwE32Cjjas4iG9A'
        );
    }
}

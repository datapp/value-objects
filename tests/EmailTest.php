<?php

namespace Datapp\Value;

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{

    public function testShouldCreateValidEmail()
    {
        $this->assertInstanceOf(Email::class, new Email('info@datapp.de'));
    }

    public function testShouldReturnEmailAsString()
    {
        $this->assertEquals('info@datapp.de', (new Email('info@datapp.de')));
    }

    public function testShouldReturnHostOfEmail()
    {
        $this->assertEquals('datapp.de', (new Email('info@datapp.de'))->getHost());
    }

    public function testShouldThrowException()
    {
        $this->expectException(InvalidEmailException::class);
        new Email('in fo@datapp.de');
    }

}

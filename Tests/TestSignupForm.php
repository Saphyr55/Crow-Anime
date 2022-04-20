<?php


use PHPUnit\Framework\TestCase;

class TestSignupForm extends TestCase
{

    public function testLastRegister()
    {
        $this->assertEquals(15, (new \CrowAnime\Core\Form\Auth\SignupForm())->lastUser()['id_user']);
    }

}

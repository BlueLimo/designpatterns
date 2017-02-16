<?php

require_once 'tests/user.php';
 
class UserTest extends PHPUnit_Framework_TestCase {
 
    private $user;
 
    function setUp() {
        $this->user = new User();
    }
 
    function testItShouldNotExceed() {
       $name = 'maxwell';
       $maxlength = 10;
       $this->assertEquals($name, $this->user->add($name, $length));
    }
 
}
 
}
?>
<?php

namespace Nash;

class JohnTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider messageProvider
     */
    public function testCoverMessage($message, $expectedResult)
    {
        $result = John::coverMessage($message);

        $this->assertEquals($expectedResult, $result);
    }

    public function messageProvider()
    {
        return array(
            array('BAC', 2056),
            array('mail', 217035)
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Message has invalid characters
     */
    public function testCoverMessageShouldThrowAnExceptionWhenMessageHasNonSupportedCharacters()
    {
        $message = '_a_';

        John::coverMessage($message);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid message format
     */
    public function testCoverMessageShouldThrowAnExceptionWhenMessageIsNotAString()
    {
        $message = array();

        John::coverMessage($message);
    }

    /**
     * @dataProvider coveredMessageProvider
     */
    public function testUncoverMessage($message, $expectedResult)
    {
        $result = John::uncoverMessage($message);

        $this->assertEquals($expectedResult, $result);
    }

    public function coveredMessageProvider()
    {
        return array(
            array(2056, 'bac'),
            array(-1, 'a')
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid message format
     */
    public function testUncoverMessageShouldThrowAnExceptionWhenMessageIsNotANumber()
    {
        $message = 'aaaaa';

        John::uncoverMessage($message);
    }
}

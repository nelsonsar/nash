<?php

namespace Nash;

class Numerology
{
    const ASCII_CODE_LETTER_A = 97;
    const ASCII_CODE_LETTER_Z = 123;
    const JOHN_NASH_BASE = 26;
    const INVALID_CHAR_ERROR = 'Message has invalid characters';

    private static $letterMap = array();

    public static function coverMessage($message)
    {
        if (false === is_string($message)) throw new InvalidMessageFormatException;

        self::createLetterMap();
        $messageAsArray = self::createReversedLetterArrayFromMessage($message);
        $result = 0;

        foreach($messageAsArray as $letter) {
            if (false === self::isAllowedLetter($letter)) {
                throw new UnsupportedCharacterException;
            }

            $result *= self::JOHN_NASH_BASE;
            $result += ord($letter) - (self::ASCII_CODE_LETTER_A - 1);
        }

        return abs($result);
    }

    public static function uncoverMessage($coveredMessage)
    {
        if (false === is_numeric($coveredMessage)) throw new InvalidMessageFormatException;

        self::createLetterMap();
        $coveredMessage = abs($coveredMessage);
        $result = "";

        while ($coveredMessage > 0) {
            --$coveredMessage;
            $uncoveredLetterAsciiCode = $coveredMessage % self::JOHN_NASH_BASE + self::ASCII_CODE_LETTER_A;
            $uncoveredLetter = chr($uncoveredLetterAsciiCode);

            if (false === self::isAllowedLetter($uncoveredLetter)) throw new UnsupportedCharacterException;

            $result .= $uncoveredLetter;
            $coveredMessage = intval($coveredMessage / self::JOHN_NASH_BASE);
        }

        return $result;
    }

    private static function createLetterMap()
    {
        self::$letterMap = array();

        for ($asciiCode = self::ASCII_CODE_LETTER_A; $asciiCode < self::ASCII_CODE_LETTER_Z; $asciiCode++) {
            self::$letterMap[] = chr($asciiCode);
        }

        return self::$letterMap;
    }

    private static function isAllowedLetter($letter)
    {
        return (false !== array_search($letter, self::$letterMap));
    }

    private static function createReversedLetterArrayFromMessage($message)
    {
        $messageAsArray = str_split($message);
        $normalizedMessageArray = array_map('strtolower', $messageAsArray);

        return array_reverse($normalizedMessageArray);
    }
}

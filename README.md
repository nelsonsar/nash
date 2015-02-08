[![Build Status](https://travis-ci.org/nelsonsar/nash.svg?branch=master)](https://travis-ci.org/nelsonsar/nash)
[![Code Coverage](https://scrutinizer-ci.com/g/nelsonsar/nash/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/nelsonsar/nash/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nelsonsar/nash/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nelsonsar/nash/?branch=master)
Armadillo
=========

# Nash

Nash is a [bijective](http://en.wikipedia.org/wiki/Bijective_numeration) [base 26](http://en.wikipedia.org/wiki/Hexavigesimal) encoder and decoder from a beautiful mind (and that is not mine).

## How to use it

```php
<?php

$word = "are";

$coveredMessage = Nash\John::coverMessage($word); //$coveredMessage = 3849

$coveredWord = 2056;

$uncoveredMessage = Nash\John::uncoverMessage($coveredMessage); //$uncoveredMessage = 'BAC';
```

## Why?

I thought that this would be nice to represent small words as numbers. For example:

In base26 the word **duck** is equals to **195914** (which is not that bad) and this is useful to express sequential letters (AA, AAA, BA, CAA and other things that look like columns from spreadsheet programs).

So if you have something secret (and really like numbers...) or like numerology maybe this will help with something.

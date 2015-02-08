# Nash

Nash is a [bijective](http://en.wikipedia.org/wiki/Bijective_numeration) [base 26](http://en.wikipedia.org/wiki/Hexavigesimal) encoder and decoder.

## How to use it

```php
<?php

$word = "are";

$coveredMessage = Nash\John::coverMessage($word);

$coveredWord = 2056;

$uncoveredMessage = Nash\John::uncoverMessage($coveredMessage);
```

## Why?

I thought that this would be nice to represent small words as numbers and I found out that is not. For example:

In base26 the word **duck** is equals to **195914** (which has two more digits than the word itself). This is useful to express things like:

- A = 1 (or -1);
- AAA = 703;

And things like columns from spreadsheet programs.

So if you have something secret (and really like numbers...) or like numerology maybe this will help with something.

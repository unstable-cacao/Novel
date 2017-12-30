<?php
namespace Novel\Tokens\Strings;


use Novel\Core\Tokens\Strings\IHeredocToken;
use Novel\Tokens\Named\TNamedToken;


class HeredocToken extends AbstractExpressionStringToken implements IHeredocToken
{
	use Novel\Tokens\Named\TNamedToken;
}
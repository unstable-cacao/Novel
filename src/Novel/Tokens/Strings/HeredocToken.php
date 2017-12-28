<?php
namespace Novel\Tokens\Strings;


use Novel\Core\Tokens\Strings\IHeredocToken;
use Novel\Tokens\TNamedToken;


class HeredocToken extends AbstractExpressionStringToken implements IHeredocToken
{
	use TNamedToken;
}
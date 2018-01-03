<?php
namespace Novel\Tokens\Functions;


use Novel\Core\Tokens\Functions\IGlobalFunctionToken;
use Novel\Tokens\Functions\Common\TWithUse;
use Novel\Tokens\Functions\Common\TWithBody;


class GlobalFunctionToken extends AbstractFunctionToken implements IGlobalFunctionToken
{
	use TWithBody;
	use TWithUse;
}
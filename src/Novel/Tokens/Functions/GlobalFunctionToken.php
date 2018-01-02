<?php
namespace Novel\Tokens\Functions;


use Novel\Core\Tokens\Functions\IGlobalFunctionToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Functions\Common\TWithBody;
use Novel\Tokens\Functions\Common\TWithParamListToken;
use Novel\Tokens\Functions\Common\TWithReturnTypeToken;
use Novel\Tokens\Functions\Common\TWithUse;
use Novel\Tokens\Named\TNamedToken;


class GlobalFunctionToken extends AbstractChildlessToken implements IGlobalFunctionToken
{
	use TNamedToken;
	use TWithBody;
	use TWithUse;
	use TWithParamListToken;
	use TWithReturnTypeToken;
}
<?php
namespace Novel\Tokens\Functions;


use Novel\Core\Tokens\Functions\IFunctionToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Named\TNamedToken;
use Novel\Tokens\Functions\Common\TWithParamListToken;
use Novel\Tokens\Functions\Common\TWithReturnTypeToken;


abstract class AbstractFunctionToken extends AbstractChildlessToken implements IFunctionToken
{
	use TNamedToken;
	use TWithParamListToken;
	use TWithReturnTypeToken;
}
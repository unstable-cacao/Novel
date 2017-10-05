<?php
namespace Novel\Core\Transforming;


use Novel\Core\IIdent;
use Novel\Core\IToken;
use Novel\Core\Stream\ITransformStream;


interface ITokenTransformer
{
	/**
	 * @param IToken $token
	 * @param ITransformStream $stream
	 * @return IIdent[]|null
	 */
	public function transform(IToken $token, ITransformStream $stream): ?array;
}
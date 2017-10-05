<?php
namespace Novel\Core\Transforming;


use Novel\Core\IIdent;
use Novel\Core\IToken;


interface ITokenChainTransform
{
	/**
	 * @param IToken $token
	 * @return IIdent[]
	 */
	public function preTransform(IToken $token): array;
	
	/**
	 * @param IToken $token
	 * @return IIdent[]
	 */
	public function postTransform(IToken $token): array;
}
<?php
namespace Novel\Core;


use Novel\Core\Transforming\ITransformSetup;


interface ITransformMediator
{
	public function getSetup(): ITransformSetup;
	
	/**
	 * @param IToken $token
	 * @return ISymbol[]
	 */
	public function transform(IToken $token): array;
}
<?php
namespace Novel\Core;


use Novel\Core\Transforming\ITransformSetup;


interface ITransformMediator
{
	public function getSetup(): ITransformSetup;
	
	/**
	 * @param IToken $root
	 * @return ISymbol[]
	 */
	public function transform(IToken $root): array;
}
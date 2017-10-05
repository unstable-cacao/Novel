<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Transforming\ITokenChainTransform;
use Novel\Core\Transforming\ITokenMiddlewareTransform;
use Novel\Core\Transforming\ITokenTransformer;
use Novel\Core\Transforming\ITransformSetup;


class TransformCollection implements ITransformSetup
{
	/**
	 * @param mixed $object
	 * @return ITransformSetup
	 */
	public function add($object): ITransformSetup
	{
		// TODO: Implement add() method.
	}

	/**
	 * @param string|array $type
	 * @param mixed $object
	 * @return ITransformSetup
	 */
	public function addByType($type, $object): ITransformSetup
	{
		// TODO: Implement addByType() method.
	}


	/**
	 * @param IToken $token
	 * @return ITokenTransformer[]
	 */
	public function getMainFor(IToken $token): array 
	{
		
	}

	/**
	 * @param IToken $token
	 * @return ITokenMiddlewareTransform[]
	 */
	public function getMiddlewareFor(IToken $token): array 
	{
		
	}

	/**
	 * @param IToken $token
	 * @return ITokenChainTransform[]
	 */
	public function getChainFor(IToken $token): array 
	{
		
	}
}
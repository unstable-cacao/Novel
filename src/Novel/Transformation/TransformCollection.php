<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Transforming\ITokenChainTransform;
use Novel\Core\Transforming\ITokenMiddlewareTransform;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Core\Transforming\ITransformSetup;


class TransformCollection implements ITransformSetup
{
	/** @var array */
	private $transformers = [];
	
	/** @var array */
	private $chainTransformers = [];
	
	/** @var array */
	private $middlewareTransformers = [];
	
	/** @var array */
	private $transformersByType = [];
	
	/** @var array */
	private $chainTransformersByType = [];
	
	/** @var array */
	private $middlewareTransformersByType = [];
	
	
	private function addObjectsByType(string $type, array $objects)
	{
		foreach ($objects as $object) 
		{
			if (is_string($object))
				$object = new $object;
			
			if ($object instanceof ITokenTransform)
			{
				if (!key_exists($type, $this->transformersByType))
					$this->transformersByType[$type] = [];
				
				$this->transformersByType[$type][] = $object;
			}
			
			if ($object instanceof ITokenMiddlewareTransform)
			{
				if (!key_exists($type, $this->middlewareTransformersByType))
					$this->middlewareTransformersByType[$type] = [];
				
				$this->middlewareTransformersByType[$type][] = $object;
			}
			
			if ($object instanceof ITokenChainTransform)
			{
				if (!key_exists($type, $this->chainTransformersByType))
					$this->chainTransformersByType[$type] = [];
				
				$this->chainTransformersByType[$type][] = $object;
			}
		}
	}
	
	
	/**
	 * @param mixed $object
	 * @return ITransformSetup
	 */
	public function add($object): ITransformSetup
	{
		if (is_string($object))
				$object = new $object;
		
		if (is_array($object))
		{
			foreach ($object as $item) 
			{
				$this->add($item);
			}
		}
		else
		{
			if ($object instanceof ITokenTransform)
				$this->transformers[] = $object;
			
			if ($object instanceof ITokenMiddlewareTransform)
				$this->middlewareTransformers[] = $object;
			
			if ($object instanceof ITokenChainTransform)
				$this->chainTransformers[] = $object;
		}
		
		return $this;
	}

	/**
	 * @param string|array $type
	 * @param mixed $object
	 * @return ITransformSetup
	 */
	public function addByType($type, $object): ITransformSetup
	{
		if (is_array($type))
		{
			foreach ($type as $item) 
			{
				if (is_array($object))
					$this->addObjectsByType($item, $object);
				else
					$this->addObjectsByType($item, [$object]);
			}
		}
		else
		{
			if (is_array($object))
				$this->addObjectsByType($type, $object);
			else
				$this->addObjectsByType($type, [$object]);
		}
		
		return $this;
	}


	/**
	 * @param IToken $token
	 * @return ITokenTransform[]
	 */
	public function getMainFor(IToken $token): array 
	{
		$result = [];
		$type = get_class($token);
		
		if (key_exists($type, $this->transformersByType))
		{
			$result = $this->transformersByType[$type];
		}
		
		$result = array_merge($result, $this->transformers);
		
		return $result;
	}

	/**
	 * @param IToken $token
	 * @return ITokenMiddlewareTransform[]
	 */
	public function getMiddlewareFor(IToken $token): array 
	{
		$result = [];
		$type = get_class($token);
		
		if (key_exists($type, $this->middlewareTransformersByType))
		{
			$result = $this->middlewareTransformersByType[$type];
		}
		
		$result = array_merge($result, $this->middlewareTransformers);
		
		return $result;
	}

	/**
	 * @param IToken $token
	 * @return ITokenChainTransform[]
	 */
	public function getChainFor(IToken $token): array 
	{
		$result = [];
		$type = get_class($token);
		
		if (key_exists($type, $this->chainTransformersByType))
		{
			$result = $this->chainTransformersByType[$type];
		}
		
		$result = array_merge($result, $this->chainTransformers);
		
		return $result;
	}
}
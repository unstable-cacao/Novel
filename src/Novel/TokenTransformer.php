<?php
namespace Novel;


use Novel\Core\IIdent;
use Novel\Core\IToken;
use Novel\Core\IMainTransformer;
use Novel\Core\Transforming\ITransformSetup;

use Novel\Stream\IdentWriteStream;
use Novel\Stream\TransformStream;
use Novel\Transformation\TransformCollection;


class TokenTransformer implements IMainTransformer
{
	/** @var TransformCollection */
    private $setup;
    
    
    public function __construct()
	{
		$this->setup = new TransformCollection();
	}
	
	
	/**
	 * @param IToken $target
	 * @return IIdent[]
	 */
    private function executeMainTransformers(IToken $target): array
    {
    	$stream = new TransformStream($this);
    	$main = $this->setup->getMainFor($target);
    	
        foreach ($main as $item)
        {
        	$stream->validateClear();
            $result = $item->transform($target, $stream);
			
            if ($result)
			{
				return $result;
			}
        }
        
        return [];
    }
	
	/**
	 * @param IToken $target
	 * @return IIdent[]
	 */
    private function executeMiddleware(IToken $target): array 
	{
		$middle = $this->setup->getMiddlewareFor($target);
		
		$callback = function () use ($target)
		{
			return $this->executeMainTransformers($target);
		};
		
		foreach ($middle as $item)
		{
			$callback = function () use ($target, $item, $callback)
			{
				$stream = new IdentWriteStream();
				$item->executeTransform($target, $stream, $callback);
				return $stream->getIdents();
			};
		}
		
		return $callback();
	}
	
	/**
	 * @param IToken $target
	 * @return IIdent[]
	 */
	private function executePreTransform(IToken $target): array 
	{
		$result = []; 
		$chain = $this->setup->getChainFor($target);
		
		foreach ($chain as $item)
		{
			$result = array_merge(
				$result, 
				$item->preTransform($target)
			);
		}
		
		return $result;
	}
	
	/**
	 * @param IToken $target
	 * @return IIdent[]
	 */
	private function executePostTransform(IToken $target): array 
	{
		$result = []; 
		$chain = $this->setup->getChainFor($target);
		
		foreach ($chain as $item)
		{
			$result = array_merge(
				$result, 
				$item->postTransform($target)
			);
		}
		
		return $result;
	}
	
	
    /**
     * @param IToken $root
     * @return IIdent[]
     */
    public function transform(IToken $root): array
    {
		$stream = new TransformStream($this);
		
		$stream->push($this->executePreTransform($root));
		$stream->push($this->executeMiddleware($root));
		$stream->push($this->executePostTransform($root));
		
		return $stream->result();
    }
	
	public function getSetup(): ITransformSetup
	{
		return $this->setup;
	}
}
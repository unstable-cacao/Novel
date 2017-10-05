<?php
namespace Novel;


use Novel\Core\IIdent;
use Novel\Core\IToken;
use Novel\Core\IMainTransformer;
use Novel\Core\Transforming\ITokenTransformer;

use Novel\Stream\TransformStream;


class TokenTransformer implements IMainTransformer
{
    private $setup;


	/**
	 * @param IToken $target
	 * @return IIdent[]
	 */
    private function executeMainTransformers(IToken $target): array
    {
    	$stream = new TransformStream($this);
    	$main = []; //$this->setup->
    	
        foreach ($main as $item)
        {
        	$stream->validateClear();
            $result = $item->transform($target, $stream);
			
            if ($result)
			{
				return $result;
			}
        }
        
        throw new \Exception('No parser found for token ' . $target->name());
    }
	

    /**
     * @param IToken $root
     * @return IIdent[]
     */
    public function transform(IToken $root): array
    {

    }
}
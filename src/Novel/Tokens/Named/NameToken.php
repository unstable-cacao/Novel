<?php
namespace Novel\Tokens\Named;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class NameToken extends AbstractChildlessToken implements INameToken
{
	/** @var IName */
	private $name;
	
	
	/**
	 * @param string|IName $name
	 */
	public function __construct($name)
	{
		if (is_string($name))
		{
			$name = new NameObject($name);
		}
		else if (!($name instanceof IName))
			throw new \Exception("Name must be string or instance of IName");
		
		$this->name = $name;
	}
	
	
	public function getName(): string
	{
		return $this->name->get();
	}
	
	public function getNameObject(): IName
	{
		return $this->name;
	}
	
	
	/**
	 * @param string|INameToken|NameObject $name
	 * @return INameToken
	 */
	public static function getNameToken($name): INameToken
	{
		if (is_string($name))
			return new NameToken($name);
		
		return $name;
	}
}
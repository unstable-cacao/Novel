<?php
namespace Novel\Core\Transforming;


interface ITransformSetup
{
	/**
	 * @param mixed $object
	 * @return ITransformSetup
	 */
	public function add($object): ITransformSetup;
	
	/**
	 * @param string|array $type
	 * @param mixed $object
	 * @return ITransformSetup
	 */
	public function addByType($type, $object): ITransformSetup;
}
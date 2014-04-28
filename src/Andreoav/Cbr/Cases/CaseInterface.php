<?php namespace Andreoav\Cbr\Cases;

interface CaseInterface
{
	public function loadCase($_filepath);

	public function getName();

	public function setName($_name);

	public function getAttributes();

	public function getAttributeByName($_attrName);
}
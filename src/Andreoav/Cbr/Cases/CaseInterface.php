<?php namespace Andreoav\Cbr\Cases;

interface CaseInterface
{
	public function loadCase($filepath);

	public function getName();

	public function setName($_name);

	public function getAttributes();
}
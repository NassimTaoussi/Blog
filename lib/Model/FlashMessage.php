<?php

class FlashMessages implements Countable, Iterator
{
	/**
	 * @var array<array-key, array{message: string, type: string}>
	 */
	private array $messages = [];
	
	private int $position = 0;
	
	public function __construct()
	{
		$this->messages = &$_SESSION['flash'];
	}
	
	public function count(): int
	{
		return count($this->messages);
	}
	
	/**
	 * @return array{message: string, type: string}
	 */
	public function current(): array
	{
		$message = $this->messages[$this->position];
		
		unset($this->messages[$this->position]);
		
		return $message;
	}
	
	public function key(): int
	{
		return $this->position;
	}
	
	public function next(): void
	{
		++$this->position;
	}
	
	public function rewind(): void
	{
		$this->position = 0;
	}
	
	public function valid(): bool
	{
		return isset($this->messages[$this->position]);
	}
}

?>
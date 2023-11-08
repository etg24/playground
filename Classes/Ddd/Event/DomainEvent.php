<?php
namespace Etg24\Playground\Ddd\Event;

class DomainEvent {

	const VERSION = 1;

	const STORED = true;

	/**
	 * @var string
	 */
	public $_eventId;

	/**
	 * @var \DateTime
	 */
	public $_occurredOn;

	/**
	 * @var array
	 */
	public $_metaData = [];

}

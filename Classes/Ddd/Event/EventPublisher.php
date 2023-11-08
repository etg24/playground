<?php
namespace Etg24\Playground\Ddd\Event;

use Neos\Flow\Annotations as Flow;

trait EventPublisher {

	/**
	 * @var EventBusInterface
	 * @Flow\Inject
	 */
	protected $eventBus;

}

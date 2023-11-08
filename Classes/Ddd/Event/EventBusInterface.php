<?php
namespace Etg24\Playground\Ddd\Event;

interface EventBusInterface {

	public function publish(DomainEvent $event);

	public function publishMany(array $events);

	// An EventBus is active by default. When inactive,
	// - published events are discarded immediately
	// this is for migrations & tests and should not be used in a application context
	public function deactivate();
	public function activate();

}

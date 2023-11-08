<?php
namespace Etg24\Playground\Communication\Conversations\Domain\Model;

use Neos\Flow\Annotations as Flow;

/**
 * @Flow\Entity
 */
class Conversation {

	/**
	 * @var array<string>
	 */
	protected $participantIds;

	/**
	 * @return string[]
	 */
	public function getParticipantIds() {
		return $this->participantIds;
	}

}

<?php
namespace Etg24\Playground\Communication\Conversations\Service;

use Etg24\App\Utility\ScalarSetUtility;
use Etg24\Playground\Communication\Conversations\Domain\Model\Conversation;
use Etg24\Playground\Ddd\Event\EventPublisher;
use Neos\Flow\Annotations as Flow;

/**
 * @Flow\Scope("singleton")
 */
class ConversationService {

	use EventPublisher;

	public function findAssigneeCandidates(Conversation $conversation1, Conversation $conversation2) {
		// todo: throw exception if the conversations have identical participants
		return ScalarSetUtility::intersection($conversation1->getParticipantIds(), $conversation2->getParticipantIds());
	}

}

<?php
namespace Etg24\Playground\Communication\Conversations\Service;

use Etg24\App\Utility\ScalarSetUtility;
use Etg24\Playground\Communication\Conversations\Domain\Model\Conversation;
use Etg24\Playground\Ddd\Event\EventPublisher;
use Neos\Flow\Annotations as Flow;
use Etg24\Playground\Exceptions\ConversationServiceException;

/**
 * @Flow\Scope("singleton")
 */
class ConversationService {

	use EventPublisher;

	public function findAssigneeCandidates(...$conversations) {
        $participantIds = [];
        foreach($conversations as $conversation) {
            $participantIds[] = $conversation->getParticipantIds();
        }
        if (ScalarSetUtility::isIdentical(...$participantIds)) {
            throw new ConversationServiceException('The conversations are identical');
        }
		return ScalarSetUtility::intersection(...$participantIds);
	}

}

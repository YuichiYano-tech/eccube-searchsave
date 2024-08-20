<?php

namespace Plugin\SearchQueryLogger;

use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityManagerInterface;
use Plugin\SearchQueryLogger\Entity\SearchQuery;

class SearchQueryLogger implements EventSubscriberInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.request' => 'onKernelRequest',
        ];
    }

    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();
        $searchWord = $request->query->get('name');
        $userIp = $request->getClientIp();

        if ($searchWord) {
            $this->saveSearchQuery($searchWord, $userIp);
        }
    }

    private function saveSearchQuery($search_keyword, $user_ip)
    {
        $searchQuery = new SearchQuery();
        $searchQuery->setSearchKeyword($search_keyword);
        $searchQuery->setUserIp($user_ip);
        $searchQuery->setSearchDate(new \DateTime());

        $this->entityManager->persist($searchQuery);
        $this->entityManager->flush();
    }
}

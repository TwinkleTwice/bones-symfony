<?php

namespace App\Controller;

use App\Event\TestEvent;
use App\EventDispatcher\LoggingEventDispatcherDecorator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @psalm-api
 */
class TestController extends AbstractController
{
    /**
     * @Route("/event", name="api_test_event", methods={"GET"})
     */
    public function sendMessage(Request $request, LoggingEventDispatcherDecorator $eventDispatcher): JsonResponse
    {
        $message = $request->query->get('message', 'Сообщение не передано');

        $event = new TestEvent($message);
        $eventDispatcher->dispatch($event);

        return new JsonResponse(['message' => 'Event dispatched successfully']);
    }
}

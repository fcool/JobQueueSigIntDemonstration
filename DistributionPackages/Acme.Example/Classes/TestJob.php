<?php

namespace Acme\Example;

use Flowpack\JobQueue\Common\Job\JobInterface;
use Flowpack\JobQueue\Common\Queue\Message;
use Flowpack\JobQueue\Common\Queue\QueueInterface;

class TestJob implements JobInterface
{
    public function execute(QueueInterface $queue, Message $message): bool
    {
        sleep(3);
        return true;
    }

    public function getLabel(): string
    {
        return 'LABEL';
    }
}

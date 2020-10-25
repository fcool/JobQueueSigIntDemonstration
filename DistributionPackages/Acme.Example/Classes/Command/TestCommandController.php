<?php

namespace Acme\Example\Command;

use Acme\Example\TestJob;
use Flowpack\JobQueue\Common\Job\JobManager;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;

/**
 * @Flow\Scope("singleton")
 */
class TestCommandController extends CommandController
{
    /**
     * @Flow\Inject
     * @var JobManager
     */
    protected $jobManager;

    public function createTestJobCommand()
    {
        $this->jobManager->queue('test', new TestJob());
    }
}

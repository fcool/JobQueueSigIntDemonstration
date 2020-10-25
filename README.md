# TestProject for SIGINT handling of Jobqueue.Common

This is a demonstration of the possibility how the worker commands could be improved to handle SIGINT signals from command line.

In the vanilla status you just checked out, it already is able to react on CTRL+C at safe points. The way the current implementation is, the timeout of the Queue Workers is set to the maximal worker timeout.

To have the full benefit, you need to apply the patch delivered with this repository. 

`patch -p0 < FEATURE__Allow_DoctrineQueue_to_be_interrupted_by_SIGINT.patch`

To observe the behavior you can do:

`./flow test:createtestjob`

You probably should do this several times.

The configuration provided with this package, sets the timeout to 5 seconds. You will have to wait until the timeout has been reached.

If you run `./flow job:work test` and press CTRL+C (other from the default, which would interrupt the current running command immediately) you will have to wait until the 5 seconds are reached, and then the command will terminate.

If you applied the patch, it will more or less terminate immediately - but still only if the process is currently in a save state - so currently waiting.

This behavior allows to send a SIGINT at any time and the worker will finish eventually working jobs and terminate afterwards. 

--TEST--
swow_watch_dog: schedulable
--SKIPIF--
<?php
require __DIR__ . '/../include/skipif.php';
skip('Fix needed');
skip_if_in_valgrind();
?>
--FILE--
<?php
require __DIR__ . '/../include/bootstrap.php';

use Swow\Coroutine;
use Swow\WatchDog;

Assert::false(WatchDog::isRunning());

WatchDog::run(1 * 1000 * 1000, 0, function () {
    Assert::true(WatchDog::isRunning());
    $coroutine = Coroutine::getCurrent();
    $coroutine->__alert_count = ($coroutine->__alert_count ?? 0) + 1;
    sleep(0);
    if ($coroutine->__alert_count > 5) {
        $coroutine->kill();
    }
});

$coroutine = Coroutine::getCurrent();
$count = 0;

Coroutine::run(function () use ($coroutine, &$count) {
    do {
        var_dump($count);
        sleep(0);
    } while ($coroutine->isAvailable());
    var_dump($count);
});

while (true) {
    $count++;
}

echo 'Never here' . PHP_LF;

?>
--EXPECTREGEX--
int\(0\)
(?:int\((\d+)\)\n?)+

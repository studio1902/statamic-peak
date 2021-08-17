<?php

function printError($message) {
    echo "\033[41;37m{$message}\033[0;37m\n";
}

printError('Old statamic/cli installer detected!');
printError('Please upgrade to the latest cli installer and re-install your starter kit.');
printError('https://github.com/statamic/cli');

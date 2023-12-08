<?php

switch (getUri()) {
    case '':
    case 'index.php':
        require_once 'index.php';
        break;
    default:
        throw new \Exception(getUri(). ' - not found', 404);
}

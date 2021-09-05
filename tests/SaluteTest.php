<?php

use PHPUnit\Framework\TestCase;

define("WORKDIR", __DIR__ . '/../');

test("asserts salute message", function() {
    $salute_test = "Quihubo";

    $salute = new Controllers\Salute($salute_test);

    $salute_message = $salute->getSalute();

    $this->assertEquals($salute_test, $salute_message['message']);
});

test("asserts imagen message", function() {
    $salute_test = "Quihubo";

    $salute = new Controllers\Salute($salute_test);

    $salute_message = $salute->getSalute();

    $this->assertNotEmpty($salute_test, $salute_message['image']);

    $image = file_get_contents($salute_message['image']);

    expect($image)->not->toBeFalse();
});
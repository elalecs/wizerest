<?php

namespace Controllers;

use Dotenv\Dotenv;
use InvalidArgumentException;

final class Salute {

    private $salute_message;

    public function __construct(string $salute_message = "Hola Mundo")
    {
        $this->salute_message = $salute_message;
    }

    public function getSalute() {
        $unsplash_image = $this->getUnsplashImage();
        $response_message = [
            'message' => $this->salute_message,
            'image' => $unsplash_image
        ];

        return $response_message;
    }

    private function getUnsplashImage() {
        $unsplash_token = $this->getUnslashToken();
        $remote_raw = file_get_contents("https://api.unsplash.com/photos/random?client_id={$unsplash_token}");
        $remote_obj = json_decode($remote_raw);

        $salute_param = base64_encode($this->salute_message);

        $image_uri = $remote_obj->urls->raw . "&txt-font=Futura%20Condensed%20Medium&txt-align=middle%2Ccenter&txt-color=ff2e4357&txt-size=62&txt64={$salute_param}&fit=crop&h=200&w=640&blur=150";

        return $image_uri;
    }

    private function getUnslashToken() {
        $dotenv = Dotenv::createImmutable(WORKDIR);
        $dotenv->load();

        if (!isset($_ENV['UNSPLASH_APP'])) {
            throw new InvalidArgumentException(
                sprintf(
                    "Token was not found on .env: " . json_encode($_ENV)
                )
            );
        }

        $token = $_ENV['UNSPLASH_APP'];

        if (empty($token)) {
            throw new InvalidArgumentException(
                sprintf(
                    "Token is empty"
                )
            );
        }

        return $token;
    }
}
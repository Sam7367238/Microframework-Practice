<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

final readonly class HomeController {

    public function __construct(private UserRepository $userRepository) {}

    public function index(Request $request, Response $response): Response {
        $this -> userRepository -> findAll();

        $renderer = Twig::fromRequest($request);

        return $renderer -> render($response, "home.html.twig");
    }
}

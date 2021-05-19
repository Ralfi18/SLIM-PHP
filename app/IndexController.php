<?php 
namespace App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class IndexController {
    /** */
    public function __construct()
    {
        echo "IndexController";
    }
    /** */
    public function index(Request $request, Response $response, array $args)
    {
        // var_dump(is_file(FCPATH."/views/index.html.twig"));die;
        $loader = new FilesystemLoader(FCPATH."/views/");
        $twig = new Environment($loader);
        $template = $twig->load('index.html.twig');
        $view = $template->render(['heading' => 'Page Heading']);
        $response->getBody()->write($view);
        return $response;
    }
} /** END */
<?php 
namespace App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

use App\ProductModel;

class IndexController {
    /** */
    public function __construct()
    {
        // echo "IndexController";
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

    public function getProducts(Request $request, Response $response, array $args)
    {
        $model = new ProductModel();
        $products = $model->findAll();
        var_dump($products);
        $response->getBody()->write("test");
        return $response;
    }

    public function adProduct(Request $request, Response $response, array $args)
    {
        $product = new ProductModel();
        $product->setName("TEST");
        $product->save($product);

        $response->getBody()->write("Created Product with ID " . $product->getId() . "\n");
        return $response;
    }
} /** END */
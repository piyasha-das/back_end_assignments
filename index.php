<!-- <html>
  <head>
    <title>website</title>
  </head>
  <body>
    <h1>Hello World!</h1>

    <p>This is the landing page of <strong>your_domain</strong>.</p>
  </body>
</html> -->
<?php
  
    // // phpinfo();
    // include 'Application.php';
    // // include '/var/www/Files/controller/logincontroller1.php';
    // // include '/var/www/Files/controller/logincontroller2.php';
    // // include '/var/www/Files/controller/pdf.php';
    // // include '/var/www/Files/controller/Registercontroller.php';
    // // include 'Router.php';
    // $app = new Application();
    // // $router = new Router();

    // $app->router->get('/',function(){
    //   return "helloworld";
    //   // include '/view/register.php';
    //   // header('location:/var/www/Files/register.php');
    // });
    // // var_dump('hello');
    // // die();
    // $app->router->get('/homepage',function(){
    //   // include '/var/www/Files/view/homepage.php';
    //   return "homepage";
    // });
    // // $app->userRouter($router);
    // $app->run();
    // echo 1;
    // $router = new Router();
    // $router->add('/');
    // $router->add('/homepage');
    // $router->add('/contact');
    
    // echo '<pre>';
    // print_r($router);
    // $router->submit();
    // class FrontController{
    //   public function __construct(){
    //       // $this->Frontpage();
    //       $fc = new FrontController;
    //       $this->Frontpage();
    //   }
    // switch($_SERVER['REQUEST_URI']){
    //   case '/':
    //     include '/var/www/Files/view/register.php';
    //     break;
    //     // case '/register':
    //     //   include '/var/www/Files/view/register.php';
    //     //   break;
    //   case '/homepage':
    //     // header('location:/var/www/Files/view/homepage.php');
    //     // echo "piyasha";
    //     include (__DIR__."/homepage.php");
    //     break;
    // }
        // $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

      // require_once __DIR__.'/vendor/autoload.php';
      include 'Router.php';
      include 'about.php';
      // include 'resume.php';
        $router=new Router();
        $router->get('/',function(){
          echo 'Home page';
        });
        // $router->get('/about',function(){
        //   echo 'About page';
        // });
        $router->get('/aboutus',About::class.'::execute');
        $router->get('/resume',Resume::class.'::execute');
        $router->get('/register',Register::class.'::execute');
        $router->get('/homepage',Homepage::class.'::execute');
        $router->get('/profile',Profile::class.'::execute');

        session_start();
        // if(isset($_SESSION['emailid'])){
          // header('location:/homepage');
        // }
        // $router->post('/resume',function($params){
        //   var_dump($_POST);
        // });
        $router->addNotFoundHandler(function(){
          echo 'NotFound';
        });
        $router->run();
?>



<?php
class Router
{
  private $request;
  private $supportedHttpMethods = array(
    "GET",
    "POST"
  );
  function __construct(IRequest $request)
  {
   $this->request = $request;
  }
  function __call($name, $args)
  {
    list($route, $method) = $args;
    if(!in_array(strtoupper($name), $this->supportedHttpMethods))
    {
      $this->invalidMethodHandler();
    }
    $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
  }
  /**
   * Removes trailing forward slashes from the right of the route.
   * @param route (string)
   */
  private function formatRoute($route)
  {
    $result = rtrim($route, '/');
    if ($result === '')
    {
      return '/';
    }
    return $result;
  }
  private function invalidMethodHandler()
  {
    header("{$this->request->serverProtocol} 405 Method Not Allowed");
  }
  private function defaultRequestHandler()
  {
    header("{$this->request->serverProtocol} 404 Not Found");
    echo '<div class="container">
    <div class="row">
    <div class="col-12 card">
    <div class="card-body" align="center">
    <h1 >404</h1>
    <br/>
    <br/>
    <h5>File not found</h5><br/>
    The resource you have requested for cannot be found and does not exist here. 
    <br/>
    <br/>
    <small>Try going back <a href="./">home</a></small>
    </div>
    </div>
    </div>
    </div>';
  }
  /**
   * Resolves a route
   */
  function resolve()
  {
    $methodDictionary = $this->{strtolower($this->request->requestMethod)};
    $formatedRoute = $this->formatRoute($this->request->requestUri);
    $method = $methodDictionary[$formatedRoute];
    if(is_null($method))
    {
      $this->defaultRequestHandler();
      return;
    }
    echo call_user_func_array($method, array($this->request));
  }
  function __destruct()
  {
    $this->resolve();
  }
}
function myErrorHandler($errno, $errstr, $errfile, $errline) {
    //Should handle error here. But, meeeeeh!
}

// Set user-defined error handler function
set_error_handler("myErrorHandler");
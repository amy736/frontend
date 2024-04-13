<?php 

use Slim\Http\Request; //namespace 
use Slim\Http\Response; //namespace 

//include adminProc.php file 
include __DIR__ .'/function/bookingProc.php';


//alow cors
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});
//end

// FOR BOOKING

//read table booking
$app->get('/booking', function (Request $request, Response $response, array $arg){

    return $this->response->withJson(array('data' => 'success'), 200); });  
 
// read all data from table booking
$app->get('/allbooking',function (Request $request, Response $response,  array $arg) { 

    $data = getAllbooking($this->db); 
    if (is_null($data)) { 

        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404); 
} 
    return $this->response->withJson(array('data' => $data), 200); }); 

//request table order by condition (id) 
$app->get('/booking/[{id}]', function ($request, $response, $args){   
    $id = $args['id']; 
    if (!is_numeric($id)) { 

        return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);  
} 
    $data = getbooking($this->db, $id); 
    if (empty($data)) { 

        return $this->response->withJson(array('error' => 'no data'), 500); 
} 

return $this->response->withJson(array('data' => $data), 200);});

//post method order
$app->post('/booking/add', function ($request, $response, $args) { 

    $form_data = $request->getParsedBody(); 
    $data = createbooking($this->db, $form_data); 
    if (is_null($data)) { 

        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404); 
} 
    return $this->response->withJson(array('data' => $data), 200); }); 


//delete row Order
$app->delete('/booking/del/[{id}]', function ($request, $response, $args){   
    $id = $args['id']; 
    
   if (!is_numeric($id)) { 

       return $this->response->withJson(array('error' => 'numeric paremeter required'), 422); } 
       $data = deletebooking($this->db,$id); 
       if (empty($data)) { 

           return $this->response->withJson(array('message'=> 'is successfully deleted'), 200);}; }); 
 

   
//put table order 
$app->put('/booking/put/[{id}]', function ($request, $response, $args){
    $id = $args['id']; 
    
    if (!is_numeric($id)) { 
        
        return $this->response->withJson(array('error' => 'numeric paremeter required'), 422); } 
        $form_dat=$request->getParsedBody(); 
        $data=updatebooking($this->db,$form_dat,$id); 
        if ($data <=0)
        return $this->response->withJson(array('data' => 'successfully updated'), 200); 
});
   


//FOR INFO


//read table booking
$app->get('/info', function (Request $request, Response $response, array $arg){

    return $this->response->withJson(array('data' => 'success'), 200); });  
 

// read all data from table booking
$app->get('/allinfo',function (Request $request, Response $response,  array $arg) { 

    $data = getAllinfo($this->db); 
    if (is_null($data)) { 

        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404); 
} 
    return $this->response->withJson(array('data' => $data), 200); }); 

//request table order by condition 
$app->get('/info/{id}', function ($request, $response, $args){   
    $info_id = $args['id']; 
    if (!is_numeric($info_id)) { 

        return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);  
} 
    $data = getinfo($this->db, $info_id); 
    if (empty($data)) { 

        return $this->response->withJson(array('error' => 'no data'), 500); 
} 

return $this->response->withJson(array('data' => $data), 200);});

//post method order
$app->post('/info/add', function ($request, $response, $args) { 

    $form_data = $request->getParsedBody(); 
    $data = createinfo($this->db, $form_data); 
    if (is_null($data)) { 

        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404); 
} 
    return $this->response->withJson(array('data' => $data),200); });

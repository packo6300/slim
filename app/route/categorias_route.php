<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use App\Model\CategoriasModel;
define("MODEL","Categorias");
$app->group('/categoria/', function () {
    
    $this->get('test', function ($req, $res, $args) {
        $this->logger->info("RESTFul API '/test'");
        return $res->getBody()
                   ->write('Hello CATEGORIS');
    });
    /**
     * obtiene la lista de categorias
     * 
     */
    $this->get('getAll', function ($req, $res, $args) {
        $this->logger->info("RESTFul API '".MODEL."/gelAll'");
        $um = new CategoriasModel();
        
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $um->GetAll()
            )
        );
    });
});
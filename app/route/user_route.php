<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use App\Model\UserModel;

$app->group('/user/', function () {
    
    $this->get('test', function ($req, $res, $args) {
        $this->logger->info("RESTFul API '/test'");
        return $res->getBody()
                   ->write('Hello Users');
    });
    
    $this->get('getAll', function ($req, $res, $args) {
        $this->logger->info("RESTFul API '/gelAll'");
        $um = new UserModel();
        
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $um->GetAll()
            )
        );
    });
    
    $this->get('get/{id}', function ($req, $res, $args) {
        $this->logger->info("RESTFul API '/get/".$args['id']."'");
        $um = new UserModel();        
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $um->Get($args['id'])
            )
        );
    });
    
    $this->post('save', function ($req, $res) {
        $this->logger->info("RESTFul API '/save'");
        $um = new UserModel();
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $um->InsertOrUpdate(
                    $req->getParsedBody()
                )
            )
        );
    });
    
    $this->get('delete/{id}', function ($req, $res, $args) {
        $this->logger->info("RESTFul API '/delete/".$args['id']."'");
        $um = new UserModel();
        
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $um->Delete($args['id'])
            )
        );
    });
    
});
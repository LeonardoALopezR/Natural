<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class collectController extends Controller
{
    public function addProducer(Request $request){
        $producer = new App\producers;
        $producer->municipality = $request->municipality;
        $producer->locality = $request->locality;
        $producer->ground = $request->ground;
        $producer->surfaceHa = $request->surfaceHa;
        $producer->category = $request->category;
        $producer->GPS = $request->GPS;
        $producer->variety = $request->variety;
        $producer->plantationFrame = $request->plantationFrame;
        $producer->treesNumberHa = $request->treesNumberHa;
        $producer->estimateKgTree = $request->estimateKgTree;
        $producer->amountTreesZone = $request->amountTreesZone;
        $producer->estimateZone = $request->estimateZone;
        $producer->organicZone = $request->organicZone;
        $producer->estimateOrganicZone = $request->estimateOrganicZone;
        $producer->lastDate = $request->lastDate;
        $producer->annotations = $request->annotations;
        $producer->comment = $request->comment;
        $producer->save();

        return $producer;
        //return back()->with('mensaje', 'Productor agregado');
    }

    public function addDelivery(Request $request){
        $producers = new App\producers;
        $delivery = new App\deliveries;
        $delivery->callDate = $request->callDate;
        $delivery->deliveredGridNumber = $request->deliveredGridNumber;
        // $delivery->returnedGridNumber = $request->returnedGridNumber;
        $delivery->comment = $request->comment;
        $delivery->producer()->attach($request->producer);
        $delivery->producer()->sync($request->producer);
        // $delivery->producer = $request->producer;
        $delivery->deliveryStatus = $request->deliveryStatus;
        $delivery->signature = $request->signature;
        $delivery->isDelivery = $request->isDelivery;
        // $delivery->deliverieBy()->attach($delivery->collect);
        // $delivery->collect = $request->collect;
        $delivery->save();

        return $delivery;
    }

    public function makeList(Request $request){
        $delivery = new App\deliveries;
        $groups = new App\groups;
        $groups->deliveries()->attach($request->deliveries);
        $groups->deliveries()->sync($request->deliveries);
        $groups->isDelivery=$request->isDelivery;
        $groups->save();

        return $groups;
    }

    public function getList($id){
        $groups = App\groups::findOrFail($id);
        
        return $nota;
    }

    public function makeRoute(Request $request){
        $groups = new App\groups;
        $routes = new App\routes;
        $vehicles = new App\vehicles;
        $routes->group()->attach($request->group);
        $routes->group()->sync($request->group);
        $routes->departureTime =$request->departureTime;
        $routes->arrivalTime =$request->arrivalTime;
        $routes->vehicle()->attach($request->vehicle);
        $routes->vehicle()->sync($request->vehicle);
        $routes->save();

        return $routes;
    }

    public function getRoute($id){
        $routes = App\routes::findOrFail($id);
        
        return $routes;
    }

    public function makeWeighing(){

    }

    public function getWeighing(){
        
    }
}

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

    public function addVehicle(Request $request){
        $vehicle = new App\vehicles;
        $vehicle->plate = $request->plate;
        $vehicle->unit = $request->unit;
        $vehicle->name = $request->name;
        $vehicle->vehicleYear = $request->vehicleYear;
        $vehicle->model = $request->model;
        $vehicle->type = $request->type;
        $vehicle->insuranceNumber = $request->insuranceNumber;
        $vehicle->carWheel = $request->carWheel;
        $vehicle->circulationCard = $request->circulationCard;
        $vehicle->operational = $request->operational;
        $vehicle->save();

        return $vehicle;
        //return back()->with('mensaje', 'Productor agregado');
    }

    public function addDriver(Request $request){
        $driver = new App\drivers;
        $driver->firstName = $request->firstName;
        $driver->lastName = $request->lastName;
        $driver->save();

        return $driver;
        //return back()->with('mensaje', 'Productor agregado');
    }

    public function addDelivery(Request $request){
        $producer = App\producers::findOrFail($request->producer_id);
        $delivery = new App\deliveries;
        $delivery->callDate = $request->callDate;
        $delivery->deliveredGridNumber = $request->deliveredGridNumber;
        // $delivery->returnedGridNumber = $request->returnedGridNumber;
        $delivery->comment = $request->comment;
        // $delivery->producer()->attach($request->producer);
        // $delivery->producer()->sync($request->producer);
        // $delivery->producer_id = $request->producer_id;
        $delivery->deliveryStatus = $request->deliveryStatus;
        $delivery->signature = $request->signature;
        $delivery->isDelivery = $request->isDelivery;
        // $delivery->deliverieBy()->attach($delivery->collect);
        // $delivery->collect = $request->collect;
        // $delivery->save();
        $producer->delivery()->save($delivery);
        
        // return $producer;
        return $delivery;
    }

    public function makeGroup(Request $request){
        $delivery = App\deliveries::findMany($request->deliveries);
        $group = new App\groups;
        $group->isDelivery=$request->isDelivery;
        $group->save();
        $group->delivery()->saveMany($delivery);

        return $delivery;
    }

    public function getGroup($id){
        $group = App\groups::findOrFail($id);
        $delivery = $group->delivery;

        return $delivery;
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

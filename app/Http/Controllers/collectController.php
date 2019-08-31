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

    public function addCollect(Request $request,$id){
        $delivery = App\deliveries::findOrFail($id);
        $delivery->returnedGridNumber = $request->returnedGridNumber;
        $delivery->deliveryStatus = $request->deliveryStatus;
        $delivery->isDelivery = $request->isDelivery;
        // $delivery->collect = $request->collect;
        // $delivery->save();
        $delivery->collect()->save($delivery);
        
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

    public function vehicleAssigment(Request $request){
        $driver = App\drivers::findOrFail($request->drivers);
        // $vehicle = App\drivers::findOrFail($request->vehicles);
        // $driver_vehicle =new App\driver_vehicles;

        // foreach($driver->vehicle as $vehicle2){

        // }

        $driver->vehicle()->attach($request->vehicles);
        // $vehicle->driver()->attach($request->drivers);

        return $driver;
    }

    public function makeRoute(Request $request){
        $group = App\groups::findOrFail($request->groups);
        $vehicle = App\vehicles::findOrFail($request->vehicles);
        $group->vehicle()->attach($vehicle->id,['departureTime' => $request->departureTime, 'arrivalTime' => $request->arrivalTime]);

        return $vehicle->id;
    }

    public function getRoute($id){
        $group = App\groups::findOrFail($id);
        
        return $group->vehicle;
    }

    public function makeWeighing(Request $request){
        $weighing = new App\weighings;
        $collect = App\deliveries::findOrFail($request->collect_id);
        $weighing->entryWeightTime = $request->entryWeightTime;
        $weighing->exitWeightTime = $request->exitWeightTime;
        $weighing->emptyGridWeight = $request->emptyGridWeight;
        $weighing->fullGridWeight = $request->fullGridWeight;
        $weighing->fullNumber = $request->fullNumber;
        $weighing->kg = $request->kg;
        $weighing->comment = $request->comment;
        $weighing->commentQ = $request->commentQ;
        $collect->weighing()->save($weighing);

        return $weighing;
    }

    public function getWeighing($id){
        $collect = App\deliveries::findOrFail($id);

        return $collect->weighing;
    }
}

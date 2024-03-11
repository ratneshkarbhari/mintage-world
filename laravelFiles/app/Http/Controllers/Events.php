<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class Events extends Controller
{
    
    function create(Request $request){

        $eventData = [

            "title" => $request->title,
            "description" => $request->description,
            "start" => $request->start_date,
            "end"=> $request->end_date,
            "address"=> $request->address,
            "status" => "1",
            "image" => NULL,
            


        ];

        if (Event::insert($eventData)) {
            return [
                "result" => "success",
                "message" => "Event created successfully"
            ];
        } else {
            return [
                "result" => "failure",
                "message" => "Event create failed"
            ];
        }
        

    }

    function update(Request $request){

        if($eventDataExisting = Event::find($request->id)){

            $eventData = [

                "title" => $request->title,
                "description" => $request->description,
                "start" => $request->start_date,
                "end"=> $request->end_date,
                "address"=> $request->address,
                "status" => "1",
                "image" => NULL,
                
    
    
            ];
    
            if ($eventDataExisting->update($eventData)) {
                return [
                    "result" => "success",
                    "message" => "Event updated successfully"
                ];
            } else {
                return [
                    "result" => "failure",
                    "message" => "Event update failed"
                ];
            }
    

        }else{
            return [
                "result" => "failure",
                "message" => "Event doesnt exist"
            ];
        }
        
    }

}

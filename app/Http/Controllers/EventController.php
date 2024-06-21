<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all events with RSVP details and paginate 9 events per page
        $allEvents = Event::with('rsvps.user')
            ->latest()
            ->paginate(9, ['*'], 'page');

        return view('events.index', compact('allEvents',));
    }


    public function all_events()
    {
       // $events = Event::paginate(10);
        // Retrieve all events in descending order and paginate them
        $events = Event::orderBy('created_at', 'desc')->paginate(10);
        return view('events.all_events',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = [
            'Johannesburg (Gauteng)',
            'Cape Town (Western Cape)',
            'Durban (KwaZulu-Natal)',
            'Pretoria (Gauteng)',
            'Port Elizabeth (Eastern Cape)',
            'Bloemfontein (Free State)',
            'Kimberley (Northern Cape)',
            'Nelspruit (Mpumalanga)',
            'Pietermaritzburg (KwaZulu-Natal)',
            'Welkom (Free State)',
            'Rustenburg (North West)',
            'Vereeniging (Gauteng)',
            'Tembisa (Gauteng)',
            'Benoni (Gauteng)',
            'Middelburg (Mpumalanga)',
            'George (Western Cape)',
            'Newcastle (KwaZulu-Natal)',
            'Klerksdorp (North West)',
            'Carletonville (Gauteng)',
            'Uitenhage (Eastern Cape)',
            'Krugersdorp (Gauteng)',
        ];
        $event_type = ['online','physical'];
        $category = ['Conference','Workshop','Webinar','Meetup'];
        $events = Event::all();
        //form to create a new resource
        return view('events.create',compact('locations','event_type','category','events'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        try{
            $input = $request->all();

            if ($image = $request->file('event_image')) {
                $destinationPath = 'upload/events';
                $eventImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $eventImage);
                $input['event_image'] = "$eventImage";
            }

            // Create a new event
            $event = Event::create($input);

            $notification = array(
                'message' => 'Event Successfully Created',
                'alert-type' => 'success'
            );


        } catch(\Exception $e){
            // Handle the error
            $notification = array(
                'message' => 'Error: ' . $e->getMessage(),
                'alert-type' => 'error'
            );
        }

        return redirect('admin/admin/events')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
       return view('events.event-detail',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($prefix, Event $event)
    {
        $locations = [
            'Johannesburg (Gauteng)',
            'Cape Town (Western Cape)',
            'Durban (KwaZulu-Natal)',
            'Pretoria (Gauteng)',
            'Port Elizabeth (Eastern Cape)',
            'Bloemfontein (Free State)',
            'Kimberley (Northern Cape)',
            'Nelspruit (Mpumalanga)',
            'Pietermaritzburg (KwaZulu-Natal)',
            'Welkom (Free State)',
            'Rustenburg (North West)',
            'Vereeniging (Gauteng)',
            'Tembisa (Gauteng)',
            'Benoni (Gauteng)',
            'Middelburg (Mpumalanga)',
            'George (Western Cape)',
            'Newcastle (KwaZulu-Natal)',
            'Klerksdorp (North West)',
            'Carletonville (Gauteng)',
            'Uitenhage (Eastern Cape)',
            'Krugersdorp (Gauteng)',
        ];
        $event_type = ['online','physical'];
        $category = ['Conference','Workshop','Webinar','Meetup'];
        return view('events.edit',compact('locations','category','event_type','event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($prefix, UpdateEventRequest $request, $id)
    {
        try {
            $event = Event::findOrFail($id);

            $input = $request->all();

            // Handle event image upload
            if ($request->hasFile('event_image')) {
                // Delete old image if it exists
                if ($event->event_image) {
                    $oldImagePath = public_path('upload/events/' . $event->event_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $destinationPath = 'upload/events';
                $eventImage = date('YmdHis') . "." . $request->file('event_image')->getClientOriginalExtension();
                $request->file('event_image')->move(public_path($destinationPath), $eventImage);
                $input['event_image'] = $eventImage;  // Save only the filename
            }

           // dd($input);
            $event->update($input);

            $notification = [
                'message' => 'Event Successfully Updated',
                'alert-type' => 'success'
            ];
        } catch (\Exception $e) {
            // Handle the error
            $notification = [
                'message' => 'Error: ' . $e->getMessage(),
                'alert-type' => 'error'
            ];
        }

        return redirect()->route('events.index')->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($prefix,Event $event)
    {
        try {

            // If the event has an image, delete it from the storage
            if ($event->event_image) {
                $imagePath = 'upload/events/' . $event->event_image;
                if (Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }
            }

            // Delete the event
            $event->delete();

            // Prepare a success notification
            session()->flash('message', 'Event Successfully Deleted');
            session()->flash('alert-type', 'success');


        } catch (\Exception $e) {
            // Handle the error
            session()->flash('message', 'Error: ' . $e->getMessage());
            session()->flash('alert-type', 'error');
        }

        // Return a response, such as redirecting back
        return back();
    }
}

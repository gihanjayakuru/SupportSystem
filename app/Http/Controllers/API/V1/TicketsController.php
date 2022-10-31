<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{

    // public  function list(Request $request){

    //     $ticketsQuery = Ticket::query();

    //     if($request->key){
    //         $ticketsQuery->where('customer_name', $request->key);
    //     }

    //     return response()->json([
    //        'message'=> 'Tickets fetched success',
    //        'data'=> null 
    //     ]);
        

    // }

    // public function list(Request $request){
        
    //     $ticketsQuery = Ticket::query();

    //     if ($s = $request->input('s')){
    //         $ticketsQuery->whereRaw( "customer_name LIKE '%" . $s . "%'");
    //     }
    //     return $ticketsQuery->get();

        
    // }

    
    public function index(Request $request)
    {
        $tickets = Ticket::paginate($request->query('per_page', 10));
        
        $ticketsQuery =Ticket::query();

        $q = $request->query('q');
        $sortColumn = $request->query('sort', 'created_at');
        $sortDir = $request->query('sort_dir') == 'asc' ? 'asc' : 'desc';
        $sorttableColumns = [
          'customer_name',
          'created_at',
          'updated_at',
          'status',
            
        ];

        // Searching
        if($q){
            $ticketsQuery->where('ref', 'LIKE', "%$q%")
            ->orWhere('customer_name', 'LIKE', "%$q%")
            ->orWhere('phone', 'LIKE', "%$q%")
            ->orWhere('description', 'LIKE', "%$q%");
        }

        //Sorting.
        if(in_array($sortColumn, $sorttableColumns)){
            $ticketsQuery->orderBy($sortColumn, $sortDir);
        }

        $tickets = $ticketsQuery->paginate($request->query('per_page', 10));


        return response()->json([
            'data' => $tickets,
            'message' => 'Your ticket successfully fetched. Please write down the reference number to check the ticket status later.'
        ]);


    }


    
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required|max:200',
            'email' => 'required|email',
            'description' => 'required',
        ]);
    
        $data = $request->only([
            'customer_name',
            'email',
            'phone',
            'description',
        ]);
    
        $data['ref'] = sha1(time());
        $data['status'] = 0;
    
        $ticket = Ticket::create($data);
    
        if ($ticket) {
            // dispatch the TicketCreated event
            \App\Events\TicketCreated::dispatch($ticket);
    
            return response()->json([
                'data' => $ticket,
                'message' => 'Your ticket is created successfully. Please write down the reference number to check the ticket status later.'
            ]);
        }
    
        return response()->json([
            'data' => null,
            'message' => 'Oops! Could not create your ticket. Please try later.'
        ], 500);
    }

    public function show() 
    {

     $ticket = Ticket::all();
     
     return response()->json(['ticket' => $ticket], 200);

    }
    
    public function search($ref){

        // return ['result' => "data from search"];
        
        return Ticket::where('ref', $ref)->get();

        // return $ref = Ticket::where('ref', $ref->query('reference'))->first();
        
    }

    
}
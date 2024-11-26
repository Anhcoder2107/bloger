<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Kyslik\ColumnSortable\Sortable;



class ReadbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // require 'vendor/autoload.php';
        $user = Auth::user();
        $email = $user->email;

        
        


        

        return view('readbooks/readbook', ['email' => $email]);



        // $data = DB::table('users')->get();

        // foreach($data as $row){
        //     foreach ($row as $doc => $var){
        //         if ($row->email != 'user@gmail.com'){
        //             echo $doc ." ". $var;
        //             echo "</Br>";
        //         }
                
        //     }
        // }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

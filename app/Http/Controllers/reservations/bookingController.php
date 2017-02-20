<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\booking;
use App\user;

class bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = user::orderby('email','DES')->pluck('email','id');

        //Si todos los campos del filtro están vacios
        if(($request->user_email == "" || $request->user_email == null) && ($request->booking_id == "" || $request->booking_id == null)){
            
            $bookings = DB::table('user_booking')
            ->join('availabilities', 'user_booking.availability_id', '=', 'availabilities.id')
            ->join('users', 'user_booking.user_id', '=', 'users.id')
            ->join('fields', 'availabilities.field_id', '=', 'fields.id')
            ->select('user_booking.created_at','user_booking.booking_id','users.email','availabilities.date','availabilities.ini_hour','availabilities.fin_hour','fields.name')
            ->orderby('user_booking.created_at','DES')
            ->get();

        }else{

            //Si está seleccionado el usuario
            if(($request->user_email != "" || $request->user_email != null) && ($request->booking_id == "" || $request->booking_id == null)){

            $bookings = DB::table('user_booking')
            ->join('availabilities', 'user_booking.availability_id', '=', 'availabilities.id')
            ->join('users', 'user_booking.user_id', '=', 'users.id')
            ->join('fields', 'availabilities.field_id', '=', 'fields.id')
            ->where('users.id','=',$request->user_email)
            ->select('user_booking.created_at','user_booking.booking_id','users.email','availabilities.date','availabilities.ini_hour','availabilities.fin_hour','fields.name')
            ->orderby('user_booking.created_at','DES')
            ->get();

            }else{

                if(($request->user_email != "" || $request->user_email != null) && ($request->booking_id != "" || $request->booking_id != null)){

                    $bookings = DB::table('user_booking')
                    ->join('availabilities', 'user_booking.availability_id', '=', 'availabilities.id')
                    ->join('users', 'user_booking.user_id', '=', 'users.id')
                    ->join('fields', 'availabilities.field_id', '=', 'fields.id')
                    ->where('users.id','=',$request->user_email)
                    ->where('user_booking.booking_id','like',$request->booking_id.'%')
                    ->select('user_booking.created_at','user_booking.booking_id','users.email','availabilities.date','availabilities.ini_hour','availabilities.fin_hour','fields.name')
                    ->orderby('user_booking.created_at','DES')
                    ->get();
                    
                }else{

                    $bookings = DB::table('user_booking')
                    ->join('availabilities', 'user_booking.availability_id', '=', 'availabilities.id')
                    ->join('users', 'user_booking.user_id', '=', 'users.id')
                    ->join('fields', 'availabilities.field_id', '=', 'fields.id')
                    ->where('user_booking.booking_id','like',$request->booking_id.'%')
                    ->select('user_booking.created_at','user_booking.booking_id','users.email','availabilities.date','availabilities.ini_hour','availabilities.fin_hour','fields.name')
                    ->orderby('user_booking.created_at','DES')
                    ->get();

                }

            }
        }



        //dd($bookings);
        return view('reservations.booking.index')
                ->with('user_id',$request->user_email)
                ->with('booking_id',$request->booking_id)
                ->with('users',$users)
                ->with('bookings',$bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

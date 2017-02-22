<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\booking;
use App\user;
use App\booking_rule;
use App\availability;
use App\sport;
use App\field;
use App\booking_state;
use App\availability_status;

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
            
        $bookings = DB::table('user_booking')
            ->join('users', 'user_booking.user_id', '=', 'users.id')
            ->join('availabilities', 'user_booking.availability_id', '=', 'availabilities.id')
            ->join('fields', 'availabilities.field_id', '=', 'fields.id')
            ->join('booking_status', 'user_booking.booking_state_id', '=', 'booking_status.id')
            ->select('user_booking.created_at','user_booking.id','user_booking.booking_id','users.email','availabilities.date','availabilities.ini_hour','availabilities.fin_hour','fields.name','booking_status.status')
            ->orderby('user_booking.created_at','asc')
            ->get();


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

    public function confirmarReserva($id){

        $users = user::orderby('email','DES')->pluck('email','id');
        $booking = booking::where('id','=',$id)->first();
        $rules = booking_rule::orderby('priority','ASC')->get();
        $availability = availability::find($booking->availability_id);
        $field = field::find($availability->field_id);
        $sport = sport::find($field->sport_id);

        //dd($booking);
        return view('reservations.booking.confirm')
            ->with('users',$users)
            ->with('availability',$availability)
            ->with('booking',$booking)
            ->with('rules',$rules)
            ->with('field',$field)
            ->with('sport',$sport);

    }

    public function confirmarReservaStore(Request $request){

        $booking_state_id = booking_state::where('status','=',"Confirmada")->first();
        $booking = booking::find($request->booking_id);
        $booking->booking_state_id = $booking_state_id->id;
        $booking->save();

        flash('La reserva se confirmó exitosamente. El código de la reserva es: <b>'.$booking->booking_id.'</b>', 'success')->important();
        return redirect()->route('reserva.index');
    }

    public function cancelarReserva($id){

        $users = user::orderby('email','DES')->pluck('email','id');
        $booking = booking::where('id','=',$id)->first();
        $rules = booking_rule::orderby('priority','ASC')->get();
        $availability = availability::find($booking->availability_id);
        $field = field::find($availability->field_id);
        $sport = sport::find($field->sport_id);

        //dd($booking);
        return view('reservations.booking.cancel')
            ->with('users',$users)
            ->with('availability',$availability)
            ->with('booking',$booking)
            ->with('rules',$rules)
            ->with('field',$field)
            ->with('sport',$sport);
    }

    public function cancelarReservaStore(Request $request){

        $booking_state_id = booking_state::where('status','=',"Cancelada")->first();
        $booking = booking::find($request->booking_id);
        $booking->booking_state_id = $booking_state_id->id;
        $booking->save();

        $availability_status_id = availability_status::where('status','Disponible')->first(); 
        $availability = availability::find($booking->availability_id);
        $availability->availability_status_id = $availability_status_id->id;
        $availability->save();

        flash('La reserva <b>'.$booking->booking_id.'</b> se canceló exitosamente', 'danger')->important();
        return redirect()->route('reserva.index');
    }

}

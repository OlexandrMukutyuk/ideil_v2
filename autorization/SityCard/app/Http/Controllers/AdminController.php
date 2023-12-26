<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\payment;
use App\Models\history;
use App\Models\ticket_type;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index(){

        $ticket_type_Data = ticket_type::all();

        return view("index_admin", ['ticket_type' => $ticket_type_Data]);
    }

    public function delete($id) {
        $ticketType = ticket_type::find($id);

        if (!$ticketType) {

            return redirect()->route('index_admin')->with('error', 'Запис не знайдено.');
        }

        $ticketType->delete();

        return redirect()->route('index_admin')->with('success', 'Запис успішно видалено.');
    }

    public function update($id) {
        $ticketType = ticket_type::find($id);

        if (!$ticketType) {

            return redirect()->route('index_admin')->with('error', 'Запис не знайдено.');
        }
        //dd($ticketType);
        return view('admin/update', ['ticketType' => $ticketType]);

    }

    public function update_confirm($id){
        $data = request()->only(['bus_type', 'cost', 'city']);

        $validator = Validator::make($data, [
            'bus_type' => 'required',
            'cost' => 'required|numeric',
            'city' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('index_admin')->with('error', 'Невірні дані в запиті.');
        }

        $ticketType = ticket_type::find($id);

        if (!$ticketType) {
            return redirect()->route('index_admin')->with('error', 'Запис не знайдено.');
        }

        $ticketType->update($data);

        return redirect()->route('index_admin')->with('success', 'Запис оновлено успішно.');
    }

    public function create(){
        return view('admin/create_ticket');
    }

    public function create_confirm(){
        $data = request()->only(['bus_type', 'cost', 'City']);

        ticket_type::create($data);

        return redirect()->route('index_admin')->with('success', 'Новий запис створено успішно.');
    }
}

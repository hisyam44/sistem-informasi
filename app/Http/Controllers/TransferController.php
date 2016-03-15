<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TransferRequest;

use App\Transfer;

class TransferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
      $user = \Auth::user();
    	$transfers = $user->transfers()->orderBy('created_at','desc')->get();
    	return view('transfer.index',compact('transfers'));
    }

   	public function create(){
   		return view('transfer.create');
   	}

   	public function store(TransferRequest $request){
      $user = \Auth::user();
   		$transfer = new Transfer();
   		$transfer->title = $request->title;
   		$transfer->category = $request->category;
   		$transfer->amount = $request->amount;
      if($request->category == 'debet'){
          $user->saldo += $request->amount;
      }elseif($request->category == 'credit'){
          $user->saldo -= $request->amount;
      }
      $transfer->saldo_temporary = $user->saldo;
      $transfer->description = $request->description;
      $transfer->published_at = \Carbon\Carbon::parse($request->published_at);
      $success = $user->transfers()->save($transfer);
      $user->save();
      if(!$success){

      }
      return redirect('/');
   	}

    public function income(){
      $user = \Auth::user();
      $transfers = $user->transfers()->where('category','debet')->orderBy('created_at','desc')->get();
      return view('transfer.index',compact('transfers'));
    }

    public function outcome(){
      $user = \Auth::user();
      $transfers = $user->transfers()->where('category','credit')->orderBy('created_at','desc')->get();
      return view('transfer.index',compact('transfers'));
    }

    public function delete(){
      
    }

}

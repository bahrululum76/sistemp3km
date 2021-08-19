<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proposal;
class Propen extends Component
{
    public function render()
    {

        // $proposal = Proposal::where('category_id','=',1)->get();

        return view('livewire.propen',['proposal' =>Proposal::where('category_id','=',2)
        ->where('status_id','=',1)
        ->where('periode',date("Y"))   
        ->get(), ] );
    }
    // public function update(){
    //     Proposal::where('category_id', '=', 2)
    //     ->where('status_id',1)
    //     ->where('periode',now())     
    //             ->update([
    //                     'status_id' => 8,
    //                 ]);
    // }

}

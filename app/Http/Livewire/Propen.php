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
        ->orWhere('status_id','=',2)
        ->orWhere('status_id','=',3)
        ->orWhere('status_id','=',4)
        ->get(), ] );
    }
    public function update(){
        Proposal::where('category_id', '=', 2)->update([
                        'status_id' => 8,
                    ]);
    }

}

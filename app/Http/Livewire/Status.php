<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proposal;
class Status extends Component
{
    public function render()
    {

        // $proposal = Proposal::where('category_id','=',1)->get();

        return view('livewire.status',['proposal' =>Proposal::where('category_id','=',1)
        ->where('status_id','=',1)
        ->orWhere('status_id','=',2)
        ->orWhere('status_id','=',3)
        ->orWhere('status_id','=',4)
        ->get(), ] );
    }

    public function update(){
        Proposal::where('category_id', '=', 1)->update([
                        'status_id' => 8,
                    ]);

        //     if ($status_id == 8) {
        //     try {
        //         Proposal::where('id', '=', $id)->update([
        //             'status_id' => 7,
        //         ]);

        //         (['success' => 
        //             "Data Aktif"
        //         ]);
        //     } catch (\Exception $e) {
        //         (['error' => 
        //             "Aktivasi Gagal"
        //         ]);
        //     }
        // } else {
        //     try {
        //         Proposal::where('id', '=', $id)->update([
        //             'status_id' => 8,
        //         ]);

        //         (['Error' => 
        //             "Data Tidak Aktif"
        //             ]);
        //     } catch (\Exception $e) {
        //         (['error' => 
                    
        //             "Proses Gagal"
        //         ]);
        //     }
        // }
    }
}

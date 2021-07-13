<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proposal;
class Status extends Component
{
    public function render()
    {

        // $proposal = Proposal::where('category_id','=',1)->get();

        return view('livewire.status',['proposal' =>Proposal::where('category_id','=',1)->get(), ] );
    }

    public function update($status_id, $id){
       

            if ($status_id == 8) {
            try {
                Proposal::where('id', '=', $id)->update([
                    'status_id' => 7,
                ]);

                (['success' => 
                    "Data Aktif"
                ]);
            } catch (\Exception $e) {
                (['error' => 
                    "Aktivasi Gagal"
                ]);
            }
        } else {
            try {
                Proposal::where('id', '=', $id)->update([
                    'status_id' => 8,
                ]);

                (['Error' => 
                    "Data Tidak Aktif"
                    ]);
            } catch (\Exception $e) {
                (['error' => 
                    
                    "Proses Gagal"
                ]);
            }
        }
    }
}

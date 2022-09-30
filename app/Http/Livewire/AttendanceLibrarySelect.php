<?php

namespace App\Http\Livewire;

use App\Models\Atten;
use App\Models\Concept;
use App\Models\ConceptDetail;
use App\Models\Learning;
use App\Models\Library;
use Livewire\Component;

class AttendanceLibrarySelect extends Component
{
    // public $concepts = "";

    public  $selectedSubject = null,
            $selectedConcept = null,
            $selectedConceptDetail = null,
            $selectedlearningActivity = null;

    public  $concepts = null;
    public  $conceptDetails = null;
    public  $learnings = null;



    public function render()
    {
        return view('livewire.attendance-library-select', [
            'subjects' => Library::all(),
            // 'concepts' => $this->concepts
        ]);
    }
    
    public function updatedselectedSubject($library_id){
        $this->concepts = Concept::where('library_id', $library_id)->get();
    }
    public function updatedselectedConcept($concept_id){
        $this->conceptDetails = ConceptDetail::where('concept_id', $concept_id)->get();
    }
    public function updatedselectedConceptDetail($concept_detail_id){
        $this->learnings = learning::where('concept_detail_id', $concept_detail_id)->get();
    }
}

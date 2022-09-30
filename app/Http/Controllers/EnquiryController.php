<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Enrolment;
use App\Models\School;
use App\Models\enquiryPage;
use App\Http\Requests\EnquiryRequest;
use App\Mail\confirmationEnquiryMail;
use App\Models\commentsEnquiry;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Unique;
Use Exception;

class EnquiryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('create', 'store');
        $this->middleware('can:Preenrolment.index')->except('create', 'store', 'page', 'pageDelete');
    }

    public function index()
    {
        $enquirys = Enquiry::all();
        // $enrolments = Enrolment::all();
        
        return view('enquiry.index')->with([
            'enquirys' => $enquirys,
            // 'enrolments' => $enrolments,
        ]);
        
    }

    public function create()
    {
        return view('enquiry.create');
    }

    public function store(EnquiryRequest $request)
    {
        // $rules = [
        //     'parent_email' => ['required', 'unique:enrolments'],
        // ];

        // $messages = [
        //     'parent_email.unique' => "This Parent email address is already in use. Please use an alternative valid email address.",
        // ];

        // request()->validate($rules, $messages);

        Enquiry::create($request->all());
        $enquirys = Enquiry::all();
        $idLinkEnrolment = ($enquirys->last()->id);
        $linkEnrolment = url('enrolment.create/'.$idLinkEnrolment);
        $infoMsg = request()->all();

        $enquiry = $enquirys->find($idLinkEnrolment);
        
        $countItems = collect($enquiry)->only(
            'ep1_state','ep2_state','ep3_state','ep4_state','ep5_state',
            'ep6_state','ep7_state','ep8_state','ep9_state','ep10_state',
            'ep11_state','ep12_state','ep13_state','ep14_state',
        );

        $filter = $countItems->filter(function($value){
            return $value != 'Pending';
        });

        $itemsPending = $filter->count();

        $totalEnrolmentProcess = round(($itemsPending) * (7.14));
       
        $enquiry->update([
            'enrolment_process' => $totalEnrolmentProcess,
        ]);

        if (Auth::user()){
            if (request()->confirmation_email === 'yes'){
                Mail::to(request()->parent_email)->queue(new confirmationEnquiryMail($infoMsg, $linkEnrolment));
            }
        }else{
            Mail::to(request()->parent_email)->queue(new confirmationEnquiryMail($infoMsg, $linkEnrolment));
        }
        return redirect()->route('welcome')
            // ->with($idLinkEnrolment);
            ->withSuccess('Your enquiry has been received with many thanks.  A member of our team will be in touch with you very soon.  In the meantime, 
            you will receive an email with your registration link should you wish to take the next step towards completing your enrolment.');
    }
    
    public function show(Enquiry $enquiry)
    {
        $countItems = collect($enquiry)->only(
            'ep1_state','ep2_state','ep3_state','ep4_state','ep5_state',
            'ep6_state','ep7_state','ep8_state','ep9_state','ep10_state',
            'ep11_state','ep12_state','ep13_state','ep14_state',
        );

        $filter = $countItems->filter(function($value){
            return $value != 'Pending';
        });

        $itemsPending = $filter->count();

        $totalEnrolmentProcess = round(($itemsPending) * (7.14));

        // return $totalEnrolmentProcess;

        $schools = School::all();
        $enrolments = $enquiry->enrolment;
        // dd($enrolment);
        $today = date('Y-m-d'); //me genera la fecha actual

        $commentsEnquiry = commentsEnquiry::where('enquiry_id' , $enquiry->id)->orderBy('created_at','DESC')->get();
        $comentEmpty = json_decode($commentsEnquiry, true);
        // return $commentsEnquiry;


        return view('enquiry.show')->with([
            'enquiry' => $enquiry,
            'today' => $today,// envio la fecha a la vista de show, paraa usarla en otros atibutos
            'enrolments' => $enrolments,
            'schools' => $schools,
            'totalEnrolmentProcess' => $totalEnrolmentProcess,
            'commentsEnquiry' => $commentsEnquiry,
            'comentEmpty' => $comentEmpty
        ]);
    }

  
    public function update(Enquiry $enquiry)
    {
        $countItems = collect($enquiry)->only(
            'ep1_state','ep2_state','ep3_state','ep4_state','ep5_state',
            'ep6_state','ep7_state','ep8_state','ep9_state','ep10_state',
            'ep11_state','ep12_state','ep13_state','ep14_state',
        );

        $filter = $countItems->filter(function($value){
            return $value != 'Pending';
        });

        $itemsPending = $filter->count();

        
        $totalEnrolmentProcess = round(($itemsPending) * (7.7));
        
        // dd($totalEnrolmentProcess);
       
        $enquiry->update([
            'enrolment_process' => $totalEnrolmentProcess,
        ]);

        $enquiry->update(request()->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {   
        // $enquiry->enrolment->delete();
        try {
            //Eliminar registro
            $enquiry->delete();
            session()->flash('success', 'Enquiry removed successfully');
            return redirect()->back();

        } catch (Exception $e) {
            // dd($e->getMessage());
            session()->flash('error', 'Query cannot be deleted because there is already an associated enrollment');
            return redirect()->back();
        }
       
    }
    
    public function commentStore(Enquiry $enquiry, Request $request){

        $comments = commentsEnquiry::create(request()->all());

        // return $request;
        return redirect()->back();

        // return $enquiry;
        
    }

    public function page(){

        $enquiryPage = enquiryPage::all();

        // return $enquiryPage;
        return view('enquiry.enquiryPage')->with([
            'enquiryPage' => $enquiryPage,
            // 'enrolments' => $enrolments,
        ]);
        
    }

    public function pageStatus($enquiryPage){

        
        $enquiry = enquiryPage::where ('id', $enquiryPage)->first();
        // return $enquiry;
        $enquiry->update([
            'status' => 'Reviewed',
        ]);


        session()->flash('success', 'Enquiry update successfully');
        return redirect()->back();

    }
    public function pageDelete($enquiryPage){

        $enquiry = enquiryPage::where ('id', $enquiryPage)->first();
        $enquiry->delete();
        session()->flash('success', 'Enquiry removed successfully');
        return redirect()->back();

    }

    public function deleteCheckedEnquiryPage(Request $request){


        $ids = $request->ids;
        enquiryPage::whereIn('id', $ids)->delete();
        return response()->json(['success'=>"Enquiry have been deleted"]);

    }
}

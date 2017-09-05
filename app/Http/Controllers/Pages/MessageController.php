<?php

namespace App\Http\Controllers\Pages;

use App\Contracts\Message\MessageRepository;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Models\Message;
use App\Models\Resume;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{

    protected $messages;

    /**
     * Controller constructor.
     * @param MessageRepository $messages
     *
     */
    function __construct(MessageRepository $messages)
    {
        $this->messages = $messages;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function index(Request $request)
    {
        $resumes = Auth::user()->resumes()->has('messages')->get();
        $companies =  Auth::user()->companies()->has('messages')->get();
        $jobs = Auth::user()->jobs()->has('messages')->get();
        $messages = [];
        foreach($resumes as $key => $resume)
        {
            array_push($messages,$resume->messages()->get());
        }
        foreach($companies as $key => $company)
        {
            array_push($messages,$company->messages()->get());
        }
        foreach($jobs as $key => $job)
        {
            array_push($messages,$job->messages()->get());
        }
        $messages = array_collapse($messages);
        $messages = $this->messages->paginate($messages, 5);
        $messages->withPath('message');
        if ($request->expectsJson()) {
            return view('front.message.load' , ['messages' => $messages])->render();
        }
        return view('front.message.index',compact('messages'));
    }

    /**
     * Create a message of resume
     * @param Request $request
     * @param $id
     * @return ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function resumeMessage(Request $request , $id)
    {
        if ($request->expectsJson()){
            $resume = Resume::find($id);
            $message = $request->all();
            if (isset($request['file_url'])) {
                $message['file_url'] = $this->messages->fileUpload($request['file_url'] , 'message_file');
            }
            $resume->messages()->save(new Message($message));
            return view('front.contact.message')->render();
        } else return response('error!');
    }

    /**
     * Create a message of company
     * @param Request $request
     * @param $id
     * @return ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function companyMessage(Request $request , $id)
    {
        if ($request->expectsJson()){
            $company = Company::find($id);
            $message = $request->all();
            if (isset($request['file_url'])) {
                $message['file_url'] = $this->messages->fileUpload($request['file_url'] , 'message_file');
            }
            $company->messages()->save(new Message($message));
            return view('front.contact.message')->render();
        } else return response('error!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {

        if (isset($id)) $result = Message::destroy($id);
        if ($result) {
            $resumes = Auth::user()->resumes()->has('messages')->get();
            $companies =  Auth::user()->companies()->has('messages')->get();
            $jobs = Auth::user()->jobs()->has('messages')->get();
            $messages = [];
            foreach($resumes as $key => $resume)
            {
                array_push($messages,$resume->messages()->get());
            }
            foreach($companies as $key => $company)
            {
                array_push($messages,$company->messages()->get());
            }
            foreach($jobs as $key => $job)
            {
                array_push($messages,$job->messages()->get());
            }
            $messages = array_collapse($messages);
            $messages = $this->messages->paginate($messages, 5);
            $messages->withPath('message');
            if ($request->expectsJson()) {
                return view('front.message.load' , ['messages' => $messages])->render();
            }
        } else {
            return abort('403');
        }
    }

}

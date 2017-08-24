<?php

namespace App\Http\Controllers\Pages;

use App\Contracts\Resume\ResumeRepository;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Media;
use App\Models\Resume;
use App\Models\Skill;
use App\Models\Tag;
use App\Utility\DataUtility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    protected $resumes;

    /**
     * Controller constructor.
     * @param ResumeRepository $resumes
     */
    function __construct(ResumeRepository $resumes)
    {
        $this->resumes = $resumes;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param array $pageinfo
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , $pageinfo = [])
    {
        $pageInfo = DataUtility::pageInfo(10 , $request->all());
        $pathUrl = $request->path();
        $pathUrl = DataUtility::pathUrl($pageInfo , $pathUrl);
        $resumes = Resume::query();
        if ($request->expectsJson()) {
            $resumes = $this->resumes->fetchByPageInfo($resumes , $pageInfo , null , null , null , null , $pathUrl);
            return view('front.resume.load' , ['resumes' => $resumes])->render();
        }

        $resumes = $this->resumes->fetchByPageInfo($resumes , $pageInfo , null , null , null , null , $pathUrl);
        return view('front.resume.index' , compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view("front.resume.create");
        } else return abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resume = $this->resumes->find($id);
        return view('front.resume.show' , compact('resume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resume = $this->resumes->find($id);
        return view('front.resume.edit' , compact('resume'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $data = $request->all();
            $education = DataUtility::requestDataReset($data['education']);
            $experience = DataUtility::requestDataReset($data['experience']);
            $skill = DataUtility::requestDataReset($data['skill']);

//            if(array_key_exists('_token' ,  $data)) Session::forget('_token');     Avoid form data multiple submit!
            $data['user_id'] = Auth::user()->id;
            if ($request->hasFile('image')) {
                $data['image'] = $this->resumes->fileUpload($data['image'] , 'resume');
            }
            if ($request->hasFile('cv_url')) {
                $data['cv_url'] = $this->resumes->fileUpload($data['cv_url'] , 'cv');
            }

            $resume = $this->resumes->save($data);

            if (isset($data['tags'])) {
                $tags = explode(',' , $data['tags']);
                foreach ($tags as $tag) {
                    $resume->tags()->save(new Tag(['name' => $tag]));
                }
            }

            if (isset($data['medias'])) {
                foreach ($data['medias'] as $key => $value) {
                    if ($value != null) $resume->medias()->save(new Media(['name' => $key , 'url' => $value]));
                }
            }

            if (isset($education)) {
                foreach ($education as $key => $item) {
                   if ($item !== last($education)) {
                       if (isset($item['image'])) $item['image'] = $this->resumes->fileUpload($item['image'], Carbon::now()->format('hs').'edu'.$key);
                       $resume->educations()->save(new Education($item));
                   }
                }
            }

            if (isset($experience)) {
                foreach ($experience as $key => $item) {
                    if ($item !== last($experience)) {
                        if (isset($item['image'])) $item['image'] = $this->resumes->fileUpload($item['image'], Carbon::now()->format('hs').'exp'.$key);
                        $resume->educations()->save(new Experience($item));
                    }
                }
            }

            if (isset($skill)) {
                foreach ($skill as $item) {
                    if ($item !== last($skill)) {
                        $resume->educations()->save(new Skill($item));
                    }
                }
            }



            return redirect('resume-manage');
        } else
            return abort('403');

    }

    /**DownLoad file
     * @param $file
     * @return mixed
     */
    public function getDownload($file)
    {
        if(isset($file)){
            $file = urldecode($file);
            $file = public_path()."/".$file;
            return Response()->download($file);
        } else return abort('403');
    }
}

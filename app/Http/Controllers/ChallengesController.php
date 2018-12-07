<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChallengesCreateRequest;
use App\Http\Requests\ChallengesEditRequest;
use App\Category;
use App\Challenge;
use Auth;

class ChallengesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      // $user_id = Auth::user()->id;

      $challenges = Challenge::orderBy("name")->paginate(10);
      $allChallenges = Challenge::all()->count();
      return view("challenges.index")->with(compact("challenges","allChallenges"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::orderBy('name')->get();
      return view("challenges.createChallenge")->with(compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChallengesCreateRequest $request)
    {
      $challenge = new  Challenge;
      $this->saveData($request,$challenge);
       $userID = Auth::user()->id;
      return redirect("/user/".$userID);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $challenge = Challenge::findOrFail($id);
  		return view('challenges.show')->with(compact('challenge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $challenge = Challenge::findOrFail($id);
      $categories = Category::orderby("name")->get();
      return view("challenges.editChallenge")->with(compact("challenge","categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChallengesEditRequest $request, $id)
    {
      // dd($request);
      $challenge = Challenge::find($id);
      $this->saveData($request,$challenge);
      return redirect(route("user.show",Auth::user()->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        $challenge = Challenge::findorfail($id);
        $challenge->delete();
        return redirect(route("user.show",Auth::user()->id))->with("deleted","Challenge deleted");
      } catch (\Exception $e) {
        return redirect(route("user.show",Auth::user()->id))->with("errorDeleted","Cant deleted the Challenge");
      }

    }

    private function saveData($request,$challenge){
      // dd($request);
      $challenge->name = $request->name;
      $challenge->description = $request->description;
      $challenge->metaChallenge = $request->metaChallenge;
      $challenge->category_id = $request->category_id;
      $challenge->user_id = Auth::user()->id;
      if ($request->points) {
        $challenge->points=$request->points;
      }
       $challenge->finish = ($request->finish) ? 1 : 0; // por que es un tinyint
      $challenge->save();
    }
}

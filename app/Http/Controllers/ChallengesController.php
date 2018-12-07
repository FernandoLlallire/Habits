<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChallengesRequest;
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
    public function store(ChallengesRequest $request)
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
      return view("challenges.editForm")->with(compact("challenge","categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChallengesRequest $request, $id)
    {
      $challenge = Challenge::find($id);
      $this->saveData($request,$challenge);
      return redirect("/challenges");
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
        return redirect(route("challenges.index"))->with("deleted","Challenge deleted");
      } catch (\Exception $e) {
        return redirect(route("challenges.show",$id))->with("errorDeleted","Cant deleted the Challenge");
      }

    }

    private function saveData($request,$challenge){
      $challenge->name = $request->name;
      $challenge->description = $request->description;
      $challenge->metaChallenge = $request->metaChallenge;
      $challenge->category_id = $request->category_id;
      $challenge->user_id = Auth::user()->id;
      $challenge->save();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Mockery\Matcher\Contains;
use App\Services\indexService;

class ContactFormController extends Controller
{
    protected indexService $indexService;

    public function __construct(indexService $indexService)
    {
        $this->indexService = $indexService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->indexService->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ContactForm::create([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'url' => $request->url,
            'gender' => $request->gender,
            'age' => $request->age,
            'contact' => $request->contact,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $contact = ContactForm::find($id);

        // if ($contact->gender === 0) {
        //     $gender = '男性';
        // } else {
        //     $gender = '女性';
        // };

        // if ($contact->age === 1) {
        //     $age = '~19歳';
        // } elseif ($contact->age === 2) {
        //     $age = '20~29歳';
        // } elseif ($contact->age === 3) {
        //     $age = '30~39歳';
        // } elseif ($contact->age === 4) {
        //     $age = '40~49歳';
        // } elseif ($contact->age === 5) {
        //     $age = '50~59歳';
        // } elseif ($contact->age === 6) {
        //     $age = '60歳~';
        // }

        // return view('contacts.show', compact('contact', 'gender', 'age'));

        return $this->indexService->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

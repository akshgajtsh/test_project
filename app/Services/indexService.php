<?php

namespace App\Services;

use App\Interfaces\indexRepositoryInterface;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class indexService
{
    protected indexRepositoryInterface $indexRepositoryInterface;

    public function __construct(indexRepositoryInterface $indexRepositoryInterface)
    {
        $this->indexRepositoryInterface = $indexRepositoryInterface;
    }

    public function index(Request $request)
    {
        $contacts = $this->indexRepositoryInterface->index($request);
        return view('contacts.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = $this->indexRepositoryInterface->show($id);

        if ($contact->gender === 0) {
            $gender = '男性';
        } else {
            $gender = '女性';
        };

        if ($contact->age === 1) {
            $age = '~19歳';
        } elseif ($contact->age === 2) {
            $age = '20~29歳';
        } elseif ($contact->age === 3) {
            $age = '30~39歳';
        } elseif ($contact->age === 4) {
            $age = '40~49歳';
        } elseif ($contact->age === 5) {
            $age = '50~59歳';
        } elseif ($contact->age === 6) {
            $age = '60歳~';
        }

        return view('contacts.show', compact('contact', 'gender', 'age'));
    }

    public function edit($id)
    {
        $contact = $this->indexRepositoryInterface->edit($id);

        return view('contacts.edit', compact('contact'));
    }

    public function update(int $id, Request $request)
    {
        $contact = $this->indexRepositoryInterface->findById($id);

        $contact->name = $request->name;
        $contact->title = $request->title;
        $contact->email = $request->email;
        $contact->url = $request->url;
        $contact->gender = $request->gender;
        $contact->age = $request->age;
        $contact->contact = $request->contact;
        $contact->save();

        return redirect()->route('contacts.index');
    }

    public function destroy(int $id)
    {
        $contact = $this->indexRepositoryInterface->findById($id);
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}

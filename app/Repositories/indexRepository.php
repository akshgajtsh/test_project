<?php

namespace App\Repositories;

use App\Interfaces\indexRepositoryInterface;
use App\Models\ContactForm;
use Illuminate\Http\Request;


class indexRepository implements indexRepositoryInterface
{
    public function findById(int $id): ContactForm
    {
        return ContactForm::find($id);
    }

    public function index()
    {
        return ContactForm::select('id', 'name', 'title', 'created_at')->get();
    }

    public function show($id)
    {
        return ContactForm::find($id);
    }

    public function edit($id)
    {
        return ContactForm::find($id);
    }

    public function update(ContactForm $contactForm, array $data): bool
    {
        return $contactForm->update($data);
    }

    public function destroy(ContactForm $contact): bool 
    {
        return $contact->delete();
    }
}

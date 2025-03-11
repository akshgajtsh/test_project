<?php

namespace App\Repositories;

use App\Interfaces\indexRepositoryInterface;
use App\Models\ContactForm;

class indexRepository implements indexRepositoryInterface
{
    public function index()
    {
        return ContactForm::select('id', 'name', 'title', 'created_at')->get();
    }

    public function show($id)
    {
        return ContactForm::find($id);
    }
}

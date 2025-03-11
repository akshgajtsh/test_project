<?php

namespace App\Interfaces;

use App\Models\ContactForm;

interface indexRepositoryInterface
{
    public function index();

    public function show($id);
}

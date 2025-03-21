<?php

namespace App\Interfaces;

use App\Models\ContactForm;

interface indexRepositoryInterface
{
    public function findById(int $id): ContactForm;

    public function index();

    public function show($id);

    public function edit($id);

    public function update(ContactForm $contactForm, array $data): bool;

    public function destroy(ContactForm $contact): bool;
}

<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Resumes/Index', []);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // I don't think much validation is necessary
        $validated = $request->validate([
            'resumeName' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'email|max:255',
            'contactNumber' => 'string|regex:/^[0-9]{10}$/|max:20',

        ]);
        $request->user()->resumes()->create($validated);
        return redirect(route('resumes.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Resume $resume)
    {
        $resume->load('socials');
        $resume->load('education');
        $resume->load('certifications');
        $resume->load('works');
        $resume->load('skills');
        $resume->load('projects');
        echo $resume;
        return Inertia::render('Resumes/SingleResume', ['resume' => $resume]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resume $resume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resume $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resume $resume)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    public function index(Request $request) {
        return view('repositories.index', [
            'repositories' => $request->user()->repositories
        ]);
    }

    public function create() {
        return view('repositories.create');
    }

    public function store(Request $request) {
        $request->validate([
           'url' => 'required',
            'description' => 'required',
        ]);

        $request->user()->repositories()->create($request->all());

        return redirect()->route('repositories.index');
    }

    public function show(Request $request, Repository $repository)
    {
        if($request->user()->id != $repository->user_id)
        {
            abort(403);
        }

        return view('repositories.show', compact('repository'));
    }

    public function edit(Request $request, Repository $repository)
    {
        if($request->user()->id != $repository->user_id)
        {
            abort(403);
        }

        return view('repositories.edit', compact('repository'));
    }

    public function update(Request $request, Repository $repository) {
        $request->validate([
            'url' => 'required',
            'description' => 'required',
        ]);

        if($request->user()->id != $repository->user_id)
        {
           abort(403);
        }

        $repository->update($request->all());

        return redirect()->route('repositories.edit',$repository);
    }

    public function destroy(Request $request, Repository $repository) {
        if($request->user()->id != $repository->user_id)
        {
            abort(403);
        }

        $repository->delete();

        return redirect()->route('repositories.index');
    }
}

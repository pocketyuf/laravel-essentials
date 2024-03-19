<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(UserRepository $repository) {
        $users = $repository->getAll();
        return view('user.index', compact('users'));
    }

    /**
        * Show the form for creating a new resource.
        *
        * @return Response
        */
    public function create(): View {
        return view('user.create');
    }

    /**
        * Store a newly created resource in storage.
        *
        * @return Response
        */
    public function store(Request $request, UserRepository $repository) {
        return $repository->register($request);
    }

    /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
    public function show($id, UserRepository $repository) {
        return $repository->get($id);
    }

    /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
    public function edit($id, UserRepository $repository) {
        $user = $repository->get($id);
        return view('user.edit', compact('user'));
    }

    /**
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function update(Request $request, UserRepository $repository) {
        return $repository->update($request->id);
    }

    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function destroy($id, UserRepository $repository) {
        return $repository->delete($id);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\AllergenceMaster;
use App\Models\ConstituentMaster;
use App\Models\DietMaster;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['roles', 'allergies', 'tags', 'diets', 'constituents'])->get();

        $roles = Role::get();

        $allergence_masters = AllergenceMaster::get();

        $tags = Tag::get();

        $diet_masters = DietMaster::get();

        $constituent_masters = ConstituentMaster::get();

        return view('admin.users.index', compact('allergence_masters', 'constituent_masters', 'diet_masters', 'roles', 'tags', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $allergies = AllergenceMaster::pluck('name', 'id');

        $tags = Tag::pluck('name', 'id');

        $diets = DietMaster::pluck('name', 'id');

        $constituents = ConstituentMaster::pluck('name', 'id');

        return view('admin.users.create', compact('allergies', 'constituents', 'diets', 'roles', 'tags'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->allergies()->sync($request->input('allergies', []));
        $user->tags()->sync($request->input('tags', []));
        $user->diets()->sync($request->input('diets', []));
        $user->constituents()->sync($request->input('constituents', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $allergies = AllergenceMaster::pluck('name', 'id');

        $tags = Tag::pluck('name', 'id');

        $diets = DietMaster::pluck('name', 'id');

        $constituents = ConstituentMaster::pluck('name', 'id');

        $user->load('roles', 'allergies', 'tags', 'diets', 'constituents');

        return view('admin.users.edit', compact('allergies', 'constituents', 'diets', 'roles', 'tags', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->allergies()->sync($request->input('allergies', []));
        $user->tags()->sync($request->input('tags', []));
        $user->diets()->sync($request->input('diets', []));
        $user->constituents()->sync($request->input('constituents', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'allergies', 'tags', 'diets', 'constituents', 'userUserAlerts');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

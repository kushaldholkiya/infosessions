<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAllergenceMasterRequest;
use App\Http\Requests\StoreAllergenceMasterRequest;
use App\Http\Requests\UpdateAllergenceMasterRequest;
use App\Models\AllergenceMaster;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllergenceMasterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('allergence_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allergenceMasters = AllergenceMaster::all();

        return view('admin.allergenceMasters.index', compact('allergenceMasters'));
    }

    public function create()
    {
        abort_if(Gate::denies('allergence_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.allergenceMasters.create');
    }

    public function store(StoreAllergenceMasterRequest $request)
    {
        $allergenceMaster = AllergenceMaster::create($request->all());

        return redirect()->route('admin.allergence-masters.index');
    }

    public function edit(AllergenceMaster $allergenceMaster)
    {
        abort_if(Gate::denies('allergence_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.allergenceMasters.edit', compact('allergenceMaster'));
    }

    public function update(UpdateAllergenceMasterRequest $request, AllergenceMaster $allergenceMaster)
    {
        $allergenceMaster->update($request->all());

        return redirect()->route('admin.allergence-masters.index');
    }

    public function show(AllergenceMaster $allergenceMaster)
    {
        abort_if(Gate::denies('allergence_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allergenceMaster->load('allergiesUsers');

        return view('admin.allergenceMasters.show', compact('allergenceMaster'));
    }

    public function destroy(AllergenceMaster $allergenceMaster)
    {
        abort_if(Gate::denies('allergence_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allergenceMaster->delete();

        return back();
    }

    public function massDestroy(MassDestroyAllergenceMasterRequest $request)
    {
        AllergenceMaster::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyConstituentMasterRequest;
use App\Http\Requests\StoreConstituentMasterRequest;
use App\Http\Requests\UpdateConstituentMasterRequest;
use App\Models\ConstituentMaster;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConstituentMasterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('constituent_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $constituentMasters = ConstituentMaster::all();

        return view('admin.constituentMasters.index', compact('constituentMasters'));
    }

    public function create()
    {
        abort_if(Gate::denies('constituent_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.constituentMasters.create');
    }

    public function store(StoreConstituentMasterRequest $request)
    {
        $constituentMaster = ConstituentMaster::create($request->all());

        return redirect()->route('admin.constituent-masters.index');
    }

    public function edit(ConstituentMaster $constituentMaster)
    {
        abort_if(Gate::denies('constituent_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.constituentMasters.edit', compact('constituentMaster'));
    }

    public function update(UpdateConstituentMasterRequest $request, ConstituentMaster $constituentMaster)
    {
        $constituentMaster->update($request->all());

        return redirect()->route('admin.constituent-masters.index');
    }

    public function show(ConstituentMaster $constituentMaster)
    {
        abort_if(Gate::denies('constituent_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $constituentMaster->load('constituentsUsers');

        return view('admin.constituentMasters.show', compact('constituentMaster'));
    }

    public function destroy(ConstituentMaster $constituentMaster)
    {
        abort_if(Gate::denies('constituent_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $constituentMaster->delete();

        return back();
    }

    public function massDestroy(MassDestroyConstituentMasterRequest $request)
    {
        ConstituentMaster::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDietMasterRequest;
use App\Http\Requests\StoreDietMasterRequest;
use App\Http\Requests\UpdateDietMasterRequest;
use App\Models\DietMaster;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DietMasterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('diet_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dietMasters = DietMaster::all();

        return view('frontend.dietMasters.index', compact('dietMasters'));
    }

    public function create()
    {
        abort_if(Gate::denies('diet_master_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.dietMasters.create');
    }

    public function store(StoreDietMasterRequest $request)
    {
        $dietMaster = DietMaster::create($request->all());

        return redirect()->route('frontend.diet-masters.index');
    }

    public function edit(DietMaster $dietMaster)
    {
        abort_if(Gate::denies('diet_master_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.dietMasters.edit', compact('dietMaster'));
    }

    public function update(UpdateDietMasterRequest $request, DietMaster $dietMaster)
    {
        $dietMaster->update($request->all());

        return redirect()->route('frontend.diet-masters.index');
    }

    public function show(DietMaster $dietMaster)
    {
        abort_if(Gate::denies('diet_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dietMaster->load('dietsUsers');

        return view('frontend.dietMasters.show', compact('dietMaster'));
    }

    public function destroy(DietMaster $dietMaster)
    {
        abort_if(Gate::denies('diet_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dietMaster->delete();

        return back();
    }

    public function massDestroy(MassDestroyDietMasterRequest $request)
    {
        DietMaster::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

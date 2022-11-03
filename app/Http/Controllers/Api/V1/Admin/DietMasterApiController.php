<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDietMasterRequest;
use App\Http\Requests\UpdateDietMasterRequest;
use App\Http\Resources\Admin\DietMasterResource;
use App\Models\DietMaster;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DietMasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('diet_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DietMasterResource(DietMaster::all());
    }

    public function store(StoreDietMasterRequest $request)
    {
        $dietMaster = DietMaster::create($request->all());

        return (new DietMasterResource($dietMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DietMaster $dietMaster)
    {
        abort_if(Gate::denies('diet_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DietMasterResource($dietMaster);
    }

    public function update(UpdateDietMasterRequest $request, DietMaster $dietMaster)
    {
        $dietMaster->update($request->all());

        return (new DietMasterResource($dietMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DietMaster $dietMaster)
    {
        abort_if(Gate::denies('diet_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dietMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

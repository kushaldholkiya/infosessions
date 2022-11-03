<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConstituentMasterRequest;
use App\Http\Requests\UpdateConstituentMasterRequest;
use App\Http\Resources\Admin\ConstituentMasterResource;
use App\Models\ConstituentMaster;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConstituentMasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('constituent_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConstituentMasterResource(ConstituentMaster::all());
    }

    public function store(StoreConstituentMasterRequest $request)
    {
        $constituentMaster = ConstituentMaster::create($request->all());

        return (new ConstituentMasterResource($constituentMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ConstituentMaster $constituentMaster)
    {
        abort_if(Gate::denies('constituent_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConstituentMasterResource($constituentMaster);
    }

    public function update(UpdateConstituentMasterRequest $request, ConstituentMaster $constituentMaster)
    {
        $constituentMaster->update($request->all());

        return (new ConstituentMasterResource($constituentMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ConstituentMaster $constituentMaster)
    {
        abort_if(Gate::denies('constituent_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $constituentMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

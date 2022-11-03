<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAllergenceMasterRequest;
use App\Http\Requests\UpdateAllergenceMasterRequest;
use App\Http\Resources\Admin\AllergenceMasterResource;
use App\Models\AllergenceMaster;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllergenceMasterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('allergence_master_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AllergenceMasterResource(AllergenceMaster::all());
    }

    public function store(StoreAllergenceMasterRequest $request)
    {
        $allergenceMaster = AllergenceMaster::create($request->all());

        return (new AllergenceMasterResource($allergenceMaster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AllergenceMaster $allergenceMaster)
    {
        abort_if(Gate::denies('allergence_master_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AllergenceMasterResource($allergenceMaster);
    }

    public function update(UpdateAllergenceMasterRequest $request, AllergenceMaster $allergenceMaster)
    {
        $allergenceMaster->update($request->all());

        return (new AllergenceMasterResource($allergenceMaster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AllergenceMaster $allergenceMaster)
    {
        abort_if(Gate::denies('allergence_master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allergenceMaster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

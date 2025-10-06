<?php

declare(strict_types=1);

namespace Mortezaa97\Addresses\Http\Controllers;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Mortezaa97\Addresses\Http\Resources\AddressResource;
use Mortezaa97\Addresses\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Address::class);

        return AddressResource::collection(Address::with('county.province')->get());
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Address::class);
        try {
            DB::beginTransaction();
            $item = new Address;
            $data = $request->only($item->fillable);
            $data['created_by'] = Auth::user()->id;
            if (! $request->status) {
                $data['status'] = Status::ACTIVE->value;
            }
            $address = $item->create($data);
            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }
        $address->load('county');
        return new AddressResource($address);
    }

    public function show(Address $address)
    {
        Gate::authorize('view', $address);

        return new AddressResource($address);
    }

    public function update(Request $request, Address $address)
    {
        Gate::authorize('update', $address);
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return new AddressResource($address);
    }

    public function destroy(Address $address)
    {
        Gate::authorize('delete', $address);
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return response()->json('با موفقیت حذف شد');
    }
}

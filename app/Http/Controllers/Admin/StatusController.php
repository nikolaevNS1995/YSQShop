<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatusStoreRequest;
use App\Http\Requests\Admin\StatusUpdateRequest;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $statuses = Status::paginate(10);
        return view('admin.statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Status::create($request->validated());

        return redirect()->route('admin.statuses.index')->with('success', 'Статус успешно создан.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatusUpdateRequest $request, Status $status): \Illuminate\Http\RedirectResponse
    {
        $status->update($request->validated());

        return redirect()->route('admin.statuses.index')->with('success', 'Статус успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status): \Illuminate\Http\RedirectResponse
    {
        if ($status->orders()->count() > 0) {
            return back()->with('error', 'Нельзя удалить статус, который используется в заказах.');
        }

        $status->delete();
        return redirect()->route('admin.statuses.index')->with('success', 'Статус успешно удален.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoyaltyProgramStoreRequest;
use App\Http\Requests\Admin\LoyaltyProgramUpdateRequest;
use App\Models\LoyaltyProgram;
use App\Models\OrderBonus;
use App\Models\User;
use Illuminate\Http\Request;

class LoyaltyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $loyaltyPrograms = LoyaltyProgram::with('user')->paginate(10);
        return view('admin.loyalty_programs.index', compact('loyaltyPrograms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $users = User::doesntHave('loyaltyProgram')->get();
        return view('admin.loyalty_programs.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoyaltyProgramStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        LoyaltyProgram::create($request->validated());

        return redirect()->route('admin.loyalty-programs.index')->with('success', 'Программа лояльности успешно добавлена.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LoyaltyProgram $loyaltyProgram): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $bonuses = OrderBonus::where('loyalty_program_id', $loyaltyProgram->id)->with('order')->get();
        return view('admin.loyalty_programs.show', compact('loyaltyProgram', 'bonuses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoyaltyProgram $loyaltyProgram): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin.loyalty_programs.edit', compact('loyaltyProgram'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LoyaltyProgramUpdateRequest $request, LoyaltyProgram $loyaltyProgram): \Illuminate\Http\RedirectResponse
    {
        $loyaltyProgram->update($request->validated());

        return redirect()->route('admin.loyalty-programs.index')->with('success', 'Программа лояльности успешно обновлена.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoyaltyProgram $loyaltyProgram): \Illuminate\Http\RedirectResponse
    {
        $loyaltyProgram->delete();
        return redirect()->route('admin.loyalty-programs.index')->with('success', 'Программа лояльности успешно удалена.');
    }
}

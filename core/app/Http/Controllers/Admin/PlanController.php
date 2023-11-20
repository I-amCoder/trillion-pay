<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessPackWallet;
use App\Models\BusinessValueWallet;
use App\Models\Plan;
use App\Models\Time;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'All Plans';

        $businessPackPlans = Plan::where('plan_wallet', (new BusinessPackWallet)->getTable())->latest()->paginate();
        $businessValuePlans = Plan::where('plan_wallet',(new BusinessValueWallet)->getTable())->latest()->paginate();

        return view('backend.plan.index', compact('pageTitle','businessValuePlans','businessPackPlans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pageTitle = 'Create Plan';

        $time=Time::all();
        return view('backend.plan.create', compact('pageTitle','time'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:plans,plan_name',
            'wallet' => 'required',
            'amount_type' => 'required',
            'minimum' => 'required_if:amount_type,==,0',
            'maximum' => 'required_if:amount_type,==,0',
            'amount' => 'required_if:amount_type,==,1',
            'interest' => 'required',
            'repeat_time' => 'required_if:return_for,==,1',
        ], [
            'minimum.required_if' => 'Minimum Amount is required ',
            'maximum.required_if' => 'Maximum Amount is required ',
            'amount.required_if' => 'Amount is required',
            'repeat_time.required_if' => 'How Many Times  is required ',
        ]);

        $wallet= $request->wallet == 0? (new BusinessPackWallet)->getTable() : (new BusinessValueWallet)->getTable();

        Plan::create([
            'plan_name' => $request->name,
            'plan_wallet' => $wallet,
            'amount_type' => $request->amount_type,
            'minimum_amount' => $request->minimum,
            'maximum_amount' => $request->maximum,
            'amount' => $request->amount,
            'return_interest' => $request->interest,
            'every_time' => $request->times,
            'return_for' => $request->return_for,
            'how_many_time' => $request->repeat_time,
            'capital_back' => $request->capital_back,
            'status' => $request->status,
            'interest_status'=>$request->interest_status,
            'invest_limit' => $request->limit

        ]);

        $notify[] = ['success', 'Plan created successfully'];

        return redirect()->route('admin.plan.index')->withNotify($notify);
    }

    public function edit(Plan $plan)
    {
        $pageTitle = 'Edit Plan';
        $time=Time::all();
        return view('backend.plan.edit', compact('pageTitle', 'plan','time'));
    }

    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'name' => 'required|unique:plans,id,'.$plan->name,
            'amount_type' => 'required',
            'wallet' => 'required',
            'minimum' => 'required_if:amount_type,==,0',
            'maximum' => 'required_if:amount_type,==,0',
            'amount' => 'required_if:amount_type,==,1',
            'interest' => 'required',
            'repeat_time' => 'required_if:return_for,==,1',
        ], [
            'minimum.required_if' => 'Minimum Amount is required ',
            'maximum.required_if' => 'Maximum Amount is required ',
            'amount.required_if' => 'Amount is required',
            'repeat_time.required_if' => 'How Many Times  is required ',
        ]);


        $wallet= $request->wallet == 0? (new BusinessPackWallet)->getTable() : (new BusinessValueWallet)->getTable();


        $plan->update([
            'plan_name' => $request->name,
            'amount_type' => $request->amount_type,
            'plan_wallet' => $wallet,
            'minimum_amount' => $request->minimum,
            'maximum_amount' => $request->maximum,
            'amount' => $request->amount,
            'return_interest' => $request->interest,
            'every_time' => $request->times,
            'return_for' => $request->return_for,
            'how_many_time' => $request->repeat_time,
            'capital_back' => $request->capital_back,
            'status' => $request->status,
            'interest_status'=>$request->interest_status,
            'invest_limit' => $request->limit
        ]);

        $notify[] = ['success', 'Plan Updated Successfully'];

        return redirect()->route('admin.plan.index')->withNotify($notify);
    }

    public function planStatusChange(Request $request)
    {
        $plan = Plan::findOrFail($request->id);

        if ($request->status) {
            $plan->status = false;
        } else {
            $plan->status = true;
        }

        $plan->save();

        $notify = ['success' => 'Plan Status Change Successfully'];

        return response($notify);
    }


}

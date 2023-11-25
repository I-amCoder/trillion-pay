<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Refferal;
use App\Models\RefferedCommission;
use App\Models\User;

class ReferralController extends Controller
{
    public function index()
    {
        $pageTitle = 'Manage Referral';

        $invest_referral = Refferal::where('type', 'invest')->latest()->first();
        $interest_referral = Refferal::where('type', 'interest')->latest()->first();
        $plan_interest_referral = Refferal::where('type', 'plan_interest')->latest()->first();


        return view('backend.referral.index', compact('pageTitle', 'interest_referral', 'invest_referral', 'plan_interest_referral'));
    }



    public function investStore(Request $request)
    {
        Refferal::updateOrCreate([
            'id' => 2
        ], [
            'type' => $request->type,
            'level' => $request->level,
            'commision' => $request->commision,
        ]);

        $notify[] = ['success', 'Invest Commision Created Successfully'];

        return redirect()->route('admin.referral.index')->withNotify($notify);
    }

    public function interestStore(Request $request)
    {
        Refferal::updateOrCreate([
            'id' => 3
        ], [
            'type' => $request->type,
            'level' => $request->level,
            'commision' => $request->commision,
        ]);

        $notify[] = ['success', 'Interest Commision Created Successfully'];

        return redirect()->route('admin.referral.index')->withNotify($notify);
    }


    public function interestPlanStore(Request $request)
    {
        Refferal::updateOrCreate([
            'id' => 4
        ], [
            'type' => $request->type,
            'level' => $request->level,
            'commision' => $request->commision,
        ]);

        $notify[] = ['success', 'Interest Commision Created Successfully'];

        return redirect()->route('admin.referral.index')->withNotify($notify);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function refferalStatusChange(Request $request)
    {
        $refferal = Refferal::findOrFail($request->id);

        if ($request->status) {
            $refferal->status = false;
        } else {
            $refferal->status = true;
        }

        $refferal->save();

        $notify = ['success' => 'Plan Status Change Successfully'];

        return response($notify);
    }

    public function Commision($user = '')
    {
        $user = User::find($user);

        $commison = RefferedCommission::query();

        if ($user) {
            $commison->where('reffered_by', $user->id);
        }

        $commison = $commison->latest()->paginate();

        $pageTitle = 'Commission Log';

        return view('backend.report.commission', compact('commison', 'pageTitle'));
    }

    public function deleteCommision($id)
    {
        $log = RefferedCommission::find($id);
        if ($log) {
            $user = $log->parent;
            $user->profit_balance -= $log->amount;
            $user->save();
            $log->delete();

            return redirect()->back()->withSuccess('Commision Deleted Successfully');
        }
        return redirect()->back()->withError('Commision Not found');
    }
}

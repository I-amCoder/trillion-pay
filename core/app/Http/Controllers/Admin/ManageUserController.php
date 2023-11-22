<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessPackPayment;
use App\Models\BusinessValuePayment;
use App\Models\Deposit;
use App\Models\GeneralSetting;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserInterest;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function index()
    {

        $data['pageTitle'] = 'All Users';
        $data['navManageUserActiveClass'] = 'active';
        $data['subNavManageUserActiveClass'] = 'active';

        $payment = Payment::pluck('user_id');
        // $data['users'] = User::whereIn('id', $payment)->paginate();
        $data['users'] = User::latest()->paginate();

        return view('backend.users.index')->with($data);
    }

    public function userDetails(Request $request)
    {
        $user = User::where('id', $request->user)->firstOrFail();

        $totalRef = $user->refferals->count();

        $userInterest = $user->interest->sum('interest_amount');

        $userCommission = $user->commissions->sum('amount');

        $withdrawTotal = Withdraw::where('user_id', $user->id)->where('status', 1)->sum('withdraw_amount');

        $totalDeposit = $user->deposits()->where('payment_status', 1)->sum('amount');

        $totalInvest = $user->payments()->where('payment_status', 1)->sum('amount');

        $totalTicket = $user->tickets->count();



        $payment = Payment::with('plan')->where('user_id', $user->id)->where('payment_status', 1)->latest()->first();

        if ($payment) {

            $plan = $payment->plan->plan_name;
        } else {
            $plan = 'N/A';
        }


        $pageTitle = "User Details";

        $businessPackInvestments = BusinessPackPayment::where('user_id', $user->id)->latest()->get();
        $businessValueInvestments = BusinessValuePayment::where('user_id', $user->id)->latest()->get();

        return view('backend.users.details', compact('pageTitle', 'user', 'plan', 'totalRef', 'userInterest', 'userCommission', 'withdrawTotal', 'totalDeposit', 'businessValueInvestments', 'businessPackInvestments', 'totalInvest', 'totalTicket'));
    }

    public function userUpdate(Request $request, User $user)
    {



        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'unique:users,phone,' . $user->id
        ]);

        $data = [
            'country' => $request->country,
            'city' => $request->city,
            'zip' => $request->zip,
            'state' => $request->state,
        ];


        if ($request->password) {
            $request->validate([
                'password' => 'required|confirmed'
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->address = $data;
        $user->status = $request->status == 'on' ? 1 : 0;
        $user->sv = $request->sms_status == 'on' ? 1 : 0;
        $user->ev = $request->email_status == 'on' ? 1 : 0;
        $user->kyc = $request->kyc_status == 'on' ? 1 : 0;

        $user->save();



        $notify[] = ['success', 'User Updated Successfully'];

        return back()->withNotify($notify);
    }

    public function sendUserMail(Request $request, User $user)
    {
        $data = $request->validate([
            'subject' => 'required',
            "message" => 'required',
        ]);

        $data['name'] = $user->fullname;
        $data['email'] = $user->email;

        sendGeneralMail($data);

        $notify[] = ['success', 'Send Email To user Successfully'];

        return back()->withNotify($notify);
    }

    public function disabled(Request $request)
    {
        $pageTitle = 'Disabled Users';

        $search = $request->search;

        $users = User::when($search, function ($q) use ($search) {
            $q->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('company_name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('mobile', 'LIKE', '%' . $search . '%');
        })->where('status', 0)->latest()->paginate();

        return view('backend.users.index', compact('pageTitle', 'users'));
    }

    public function userStatusWiseFilter(Request $request)
    {
        $data['pageTitle'] = ucwords($request->status) . ' Users';
        $data['navManageUserActiveClass'] = 'active';
        if ($request->status == 'active') {
            $data['subNavActiveUserActiveClass'] = 'active';
        } else {
            $data['subNavDeactiveUserActiveClass'] = 'active';
        }

        $users = User::query();

        if ($request->status == 'active') {
            $ids = Payment::pluck('user_id');
            $users->where('status', 1)->whereIn('id', $ids);
        } elseif ($request->status == 'deactive') {
            $users->where('status', 0);
        }


        $data['users'] = $users->paginate();


        return view('backend.users.index')->with($data);
    }

    public function interestLog($user = '')
    {

        $interestLogs = UserInterest::query();

        $user = User::find($user);

        $pageTitle = "User Interest Log";

        if ($user) {

            $interestLogs->where('user_id', $user->id);
        }

        $interestLogs = $interestLogs->latest()->paginate();


        return view('backend.userinterestlog', compact('interestLogs', 'pageTitle'));
    }

    public function userBalanceUpdate(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        if ($request->type == 'add') {
            $user->balance =  $user->balance + $request->balance;
        } else {
            if ($user->balance < $request->balance) {
                $notify[] = ['error', 'Insufficient balance'];

                return back()->withNotify($notify);
            }
            $user->balance =  $user->balance - $request->balance;
        }

        $user->save();

        $notify[] = ['success', 'Successfully ' . $request->type . ' balance'];

        return back()->withNotify($notify);
    }

    public function loginAsUser($id)
    {
        $user = User::findOrFail($id);

        Auth::loginUsingId($user->id);

        return redirect()->route('user.dashboard');
    }


    public function kyc()
    {
        $data['subNavkycUserActiveClass'] = 'active';

        $data['pageTitle'] = 'KYC Settings';

        return view('backend.users.kyc')->with($data);
    }


    public function kycUpdate(Request $request)
    {
        $request->validate([
            "kyc" => 'required|array',
        ]);

        $general = GeneralSetting::first();


        $general->kyc = $request->kyc;

        $general->save();


        return back()->with('success', 'Kyc settings updated successfully');
    }

    public function kycAll()
    {
        $data['infos'] = User::where('kyc', 2)->paginate();

        $data['pageTitle'] = 'KYC Requests';
        $data['subNavkycReqUserActiveClass'] = 'active';
        $data['navManageUserActiveClass'] = 'active';

        return view('backend.users.kyc_req')->with($data);
    }

    public function kycDetails($id)
    {
        $data['user'] = User::findOrFail($id);

        $data['pageTitle']  = 'KYC Details';


        $data['subNavkycReqUserActiveClass'] = 'active';
        $data['navManageUserActiveClass'] = 'active';

        return view('backend.users.kyc_details')->with($data);
    }

    public function kycStatus($status, $id)
    {
        $user = User::findOrFail($id);

        if ($status === 'approve') {
            $user->kyc = 1;
        } else {
            $user->kyc = 3;
        }

        $user->save();

        return back()->with('success', 'Successfull');
    }

    public function deleteInterest(Request $request, $data)
    {

        switch ($request->wallet_type) {
            case 'business_pack_wallet':
                $query = BusinessPackPayment::query();
                break;
            case 'business_value_wallet':
                $query = BusinessValuePayment::query();
                break;

            default:
                return redirect()->route('admin.dashboard');
                break;
        }
        // Seprate payment and user ids
        $ids = decrypt($data);
        $investId = explode("|", $ids)[0];
        $userId = explode("|", $ids)[1];

        $payment  = $query->where('id', $investId)->where('user_id', $userId)->first();
        if ($payment) {
            $payment->delete();
            return back()->with('success', 'Plan removed successfully');
        }
        return back()->with('Error', 'Failed');
    }

    public function userDelete(Request $request)
    {
        $user = User::where('id', decrypt($request->user))->firstOrFail();

        if ($user) {

            DB::table("login_securities")->where('user_id', $user->id)->delete();
            DB::table("comments")->where('user_id', $user->id)->delete();
            DB::table("deposits")->where('user_id', $user->id)->delete();

            // Delete all wallets
            DB::table("current_wallets")->where('user_id', $user->id)->delete();
            DB::table("saving_wallets")->where('user_id', $user->id)->delete();
            DB::table("sharing_wallets")->where('user_id', $user->id)->delete();
            DB::table("business_pack_wallets")->where('user_id', $user->id)->delete();
            DB::table("business_value_wallets")->where('user_id', $user->id)->delete();

            // Delete all apyments
            DB::table("current_wallet_payments")->where('user_id', $user->id)->delete();
            DB::table("saving_wallet_payments")->where('user_id', $user->id)->delete();
            DB::table("sharing_wallet_payments")->where('user_id', $user->id)->delete();
            DB::table("business_pack_payments")->where('user_id', $user->id)->delete();
            DB::table("business_value_payments")->where('user_id', $user->id)->delete();

            // Delete all other history
            DB::table("user_interests")->where('user_id', $user->id)->delete();
            DB::table("tickets")->where('user_id', $user->id)->delete();
            DB::table("withdraws")->where('user_id', $user->id)->delete();
            DB::table("transactions")->where('user_id', $user->id)->delete();
            DB::table("wallet_transfers")->where('user_id', $user->id)->delete();

            $user->delete();

            return back()->with('success', 'Successfully deleted');
        }
        return back()->with('error', 'error occurred');
    }
}

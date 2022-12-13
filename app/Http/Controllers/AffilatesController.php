<?php

namespace App\Http\Controllers;

use App\AffilateHistory;
use App\Affilates;
use App\User;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class AffilatesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AffilatesController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform display  Affilates.
     */
    /**
     * This function is used to display all Affilates.
     *
     * @param $request
     * @return Renderable
     */
    public function get()
    {
        $affilates = Affilates::first();

        return view('admin.affilates.index', compact('affilates'));
    }
    /**
     * Store a newly created affilates in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveAffilates(Request $request)
    {
        $affilates = Affilates::all();
        try {

            $affilates = Affilates::first();
            $input = array_filter($request->all());
            if ($affilates) {
                $input['per_referral'] = strip_tags($request->per_referral);

                $input['min_readme'] = strip_tags($request->min_readme);
                if (!isset($input['status'])) {
                    $input['status'] = 0;
                } else {
                    $input['status'] = 1;
                }

                $affilates->update($input);

            } else {

                $affilates = new Affilates;

                $input['per_referral'] = strip_tags($request->per_referral);

                $input['min_readme'] = strip_tags($request->min_readme);
                if (!isset($input['status'])) {
                    $input['status'] = 0;
                } else {
                    $input['status'] = 1;
                }
                $affilates->create($input);
            }
            toastr()->success(__('Affilates has been added.'));
            return back()->with(__('Saved successfully'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
    /**
     * This function is used to display all userdashboard.
     *
     * @param $request
     * @return Renderable
     */
    public function userdashboard()
    {

        $af_settings = Affilates::first();

        if (!$af_settings || $af_settings->status != 1) {
            abort(404);
        }

        if (auth()->user()->refer_code == '') {

            auth()->user()->update([
                'refer_code' => User::createReferCode(),
            ]);

        }
        $aff_history = auth()->user()->getReferals()->with(['user' => function ($q) {
            return $q->select('id', 'email');
        }])->wherehas('user')->paginate(10);

        $earning = auth()->user()->getReferals()->wherehas('user')->sum('amount');
        return view('user.affiliate', compact('aff_history', 'earning'));
    }
    /**
     * This function is used to display all reports.
     *
     * @param $request
     * @return Renderable
     */
    public function reports(Request $request)
    {
        $af_settings = Affilates::first();

        if (!$af_settings || $af_settings->status != 1) {
            abort(404);
        }
        $user = Auth::user();
        if ($user->hasRole('Super Admin')) {
            $list = AffilateHistory::get();
        } elseif ($user->hasRole('User')) {
            $list = AffilateHistory::where('user_id', Auth::User()->id)->get();
        }
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('refer_user_id', function ($row) {

                    return $row->user->name . ' (' . $row->user->email . ')';

                })
                ->addColumn('user_id', function ($row) {

                    return isset($row->fromRefered['name']) ? $row->fromRefered['name'] . ' (' . $row->fromRefered->email . ')' : '-';

                })
                ->addColumn('created_at', function ($row) {

                    return $row->created_at->format('Y-m-d');

                })
                ->make(true);
        }
        return view('admin.affilates.dashboard');

    }

}

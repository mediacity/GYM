<?php
namespace App\Http\Controllers;

use App\Currency;
use App\Settings;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MultiCurrencyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MultiCurrencyController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Multicurrency.
     */
    /**
     * This function is used to display all Multicurrency.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $currencies = DB::table('currencies')
            ->leftjoin('site_settings', function ($join) {

                $join->on('currencies.id', '=', 'site_settings.default_currency');

            })
            ->select('currencies.*', 'site_settings.default_currency as currencyid');

        if ($request->ajax()) {
            return DataTables::of($currencies)
                ->addIndexColumn()
                ->addcolumn('code', function ($row) {
                    $html = $row->code;

                    if ($row->id == $row->currencyid) {
                        $html .= ' <span class="badge badge-success">Default</span>';
                    }

                    return $html;

                })

                ->addColumn('default_currency', 'admin.multicurrency.default')
                ->editColumn('action', 'admin.multicurrency.action')
                ->rawColumns(['code', 'default_currency', 'action'])
                ->make(true);
        }
        return view('admin.multicurrency.index');
    }

    /**
     * Store a newly created Multicurrency in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:3|min:3',
        ], [
            'code.required' => 'Currency code is required',
            'code.string' => 'Currency code should not be numeric',
            'code.max' => 'Currency code cannot be greater than 3',
        ]);
        Artisan::call('currency:manage add ' . $request->code);

        $output = Artisan::output();
        if (!strstr($output, 'success')) {
            return back()->withErrors($output)->withInput();
        }

        $lastcurrency = Currency::firstWhere('code', $request->code);

        if ($lastcurrency) {
            $lastcurrency->add_amount = $request->add_amount;
            $lastcurrency->save();
        }
        Artisan::call('currency:update -o');
        $output = Artisan::output();
        toastr()->success('Added', "Currency $request->code added !");
        return back();

    }

    /**
     * Update the specified Multicurrency in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $Currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {

        $currency = Currency::where('code', '=', $code)->first();
        $currency->update([
            'currency_symbol' => $request->currency_symbol,
            'add_amount' => $request->add_amount,

        ]);

        toastr()->success("Currency $currency->code updated !", 'Updated');
        return back();

    }
    /**
     * Auo-Update the specified Multicurrency in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $Currency
     * @return \Illuminate\Http\Response
     */
    public function auto_update_currency(Request $request)
    {

        try {
            Artisan::call('currency:update -o');
            return response()->json('Auto Update Successfully !');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

    }

    /**
     * Remove the specified multicurrency from storage.
     *
     * @param  \App\Currency  $Currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $currency = Currency::find($id);
        currency()->delete($currency->code);
        toastr()->error('Currency Deleted Successfully !');
        return back();
    }
    /**
     * Update the specified multicurrency from storage.
     *
     * @param  \App\Currency  $Currency
     * @return \Illuminate\Http\Response
     */
    function default(Request $request, $id) {

        $setting = Settings::first();

        $setting['default_currency'] = $request->default_currency;
        unset($setting['_token']);

        $setting->update();
        toastr()->success('Default Currency set successfully!!');
        return back();
    }

}

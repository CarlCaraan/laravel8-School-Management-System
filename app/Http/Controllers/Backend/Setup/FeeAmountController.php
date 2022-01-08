<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\FeeCategoryAmount;

class FeeAmountController extends Controller
{
    public function ViewFeeAmount()
    {
        // $data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }

    public function FeeAmountAdd()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }

    // Store Multiple Data
    public function FeeAmountStore(Request $request)
    {
        $validatedData = $request->validate([
            'fee_category_id' => 'required',
            'class_id' => 'required',
            'amount' => 'required',
        ]);
        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            } //End For loop
        } // End if
        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('fee.amount.view')->with($notification);
    } // End Method

    public function FeeAmountEdit($fee_category_id)
    {
        $data['editData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        // dd($data['editData']->toArray());

        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amount', $data);
    }

    public function FeeAmountUpdate(Request $request, $fee_category_id)
    {
        if ($request->class_id == NULL) {
            $notification = array(
                'message' => 'Sorry you do not select any class amount',
                'alert-type' => 'error',
            );
            return redirect()->route('fee.amount.edit', $fee_category_id)->with($notification);
        } else {
            $validatedData = $request->validate([
                'fee_category_id' => 'required',
                'class_id' => 'required',
                'amount' => 'required',
            ]);

            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();

            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            } //End For loop

            $notification = array(
                'message' => 'Fee Amount Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('fee.amount.view')->with($notification);
        } // End else
    }

    public function FeeAmountDetails($fee_category_id)
    {
        $data['detailsData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        return view('backend.setup.fee_amount.details_fee_amount', $data);
    }

    public function FeeAmountDelete($fee_category_id)
    {
        FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();

        $notification = array(
            'message' => 'Fee Category Amount Deleted Successfully',
            'alert-type' => 'info',
        );
        return redirect()->route('fee.amount.view')->with($notification);
    }
}

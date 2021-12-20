<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\WorkRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkRuleController extends Controller {
    public function workRule(Request $request) {
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            WorkRule::updateOrCreate(
                ['project_id' => $data['project_id'], 'rule' => $data['rule']],
                ['status' => $data['status']]
            );
            DB::commit();
            if ($data['status'] == "1")
                return response()->json(['success' => __('header.work_rule_added')]);
            else
                return response()->json(['success' => __('header.work_rule_removed')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('header.something_went_wrong'));
        }

    }
}

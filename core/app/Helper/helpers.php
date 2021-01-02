<?php
function getDue($installment_id=null){
    if($installment_id!=null) {
        $ins_time = DB::table('instalment_times')->where('order_instalment_id', $installment_id)->select(DB::Raw('sum(pay_amount) as paid'), DB::Raw('sum(amount) as totalInstallment'))->first();
//        dd($ins_time);
        $due = $ins_time->totalInstallment-$ins_time->paid;
    }else{
        $due = 0;
    }
  return $due;
}
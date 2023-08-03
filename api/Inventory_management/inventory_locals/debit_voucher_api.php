<?php
session_start();
header("Content-Type: application/json");
include '../../auth/db.php';
if (isset($_POST['action']) && $_POST['action'] == 'company_code') {
    // print_r("jfsksk");
    $query = "SELECT * FROM company";
    // PRINT_R($query);
    $result = $conn->query($query);
    // $count = mysqli_num_rows($result);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'account_code') {
    // print_r("jfsksk");
    $company_code = $_POST['co_code'];
    $query = "SELECT account_code,descr FROM act_chart WHERE co_code='$company_code' and sub_level1!='0000' AND sub_level2!='000'";
    // PRINT_R($query); DIE();  
    // print_r()
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'department_code') {
    // print_r("jfsksk");
    $query = "SELECT dept_code,dept_name FROM dept_store";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'vehicle_code') {
    // print_r("jfsksk");
    $query = "SELECT vehicle_code FROM vehicle";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'vehicle_name') {
    $vehicle_code = $_POST['vehicle_code'];
    $query = "SELECT vehicle_name,vehicle_user FROM vehicle WHERE vehicle_code = '$vehicle_code' ORDER BY VEHICLE_NAME";
    // PRINT_R($query); DIE();  
    $result = $conn->query($query);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
} elseif (isset($_POST['action']) && $_POST['action'] == 'insert') {
    $voucher_date = $_POST['voucher_date'];
    $year = $_POST['year'];
    $company_code = $_POST['company_code'];
    $company_name = $_POST['company_name'];
    $narration = $_POST['narration'];
    $ref_no = $_POST['reference_no'];
    $debit = $_POST['debit'];
    $credit = $_POST['credit'];
    $acc_desc = $_POST['acc_desc'];
    // $memo_desc = $_POST['memo'];
    $monthwise_ser_no = $_POST['monthwise_ser_no'];
    $select_q = "SELECT (case when MAX(voucher_no) is null then 1 else MAX(voucher_no)+1 end) voucher_no 
        FROM acttran_mst  WHERE co_code = '$company_code' AND doc_year = '$year' AND voucher_type = 'OV'";
    $select_r = $conn->query($select_q);
    $show = mysqli_fetch_assoc($select_r);
    $voucher_no = $show['voucher_no'];
    $master_q = "insert into acttran_mst(voucher_no,voucher_type,voucher_date,ref_no,co_code,doc_year,naration,payee, POST)value ('$voucher_no','OV','$voucher_date','$ref_no','$company_code','$year','$narration','$monthwise_ser_no','N')";
    // print_r($master_q);die();
    $master_r = $conn->query($master_q);
    if ($master_r) {
        $entry_no = 1;
        for ($i = 0; $i < count($_POST['acc_desc']); $i++) {
            $acc_desc = $_POST['acc_desc'][$i];
            $detail = $_POST['detail'][$i];
            $depart_desc = $_POST['depart_desc'][$i];
            $vehicle_code = $_POST['vehicle_code'][$i] == '' ? '0' : $_POST['vehicle_code'][$i];
            $credit = $_POST['credit'][$i];
            $memo = $_POST['memo'][$i];
            $credits = str_replace(',', '', $credit);
            if (is_numeric($credits)) {
                $credit = $credits;
            }
            $debit = $_POST['debit'][$i];
            $debits = str_replace(',', '', $debit);
            if (is_numeric($debits)) {
                $debit = $debits;
            }
            $detail_q = "insert into acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,debit,remarks,dept_code,vehicle_code,credit,entry_no)value ('$company_code','$year','OV','$voucher_no','$voucher_date','$acc_desc','$debit','$memo','$depart_desc','$vehicle_code','$credit','$entry_no')";
            // print_r($detail_q);die();
            $detail_r = $conn->query($detail_q);
            if ($detail_r) {
                $return_data = array(
                    "status" => 1,
                    // "voucher_no" => $voucher_no,
                    "message" => "Debit Voucher has been Inserted having Voucher No:" . $voucher_no
                );
            } else {
                $return_data = array(
                    "status" => 0,
                    "message" => "Debit Voucher has not been Inserted"
                );
            }
            $entry_no++;
        }
    } else {
        $return_data = array(
            "status" => 0,
            "message" => "Debit Voucher has not been Inserted"
        );
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'view') {
    // print_r("jfsksk");
    $query = "SELECT * FROM acttran_mst WHERE voucher_type='OV'";
    // PRINT_R($query);
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'edit') {
    // print_r($_POST); die();
    $co_code = $_POST['co_code'];
    $voucher_no = $_POST['voucher_no'];
    $voucher_type = $_POST['voucher_type'];
    $voucher_year = $_POST['voucher_year'];
    $query = "SELECT A.*,B.co_name FROM acttran_mst A LEFT JOIN company B ON A.co_code=B.co_code WHERE A.co_code='$co_code' AND A.voucher_type='$voucher_type' AND A.doc_year='$voucher_year' AND A.voucher_no='$voucher_no'";
    // print_r($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    $return_data = $show;
} elseif (isset($_POST['action']) && $_POST['action'] == 'edit_table') {
    // print_r($_POST);die();
    $co_code = $_POST['co_code'];
    $voucher_no = $_POST['voucher_no'];
    $voucher_type = $_POST['voucher_type'];
    $voucher_year = $_POST['voucher_year'];
    $query = "SELECT A.*,B.vehicle_user,B.vehicle_name FROM acttran_dtl A LEFT JOIN vehicle B ON A.vehicle_code=B.vehicle_code WHERE co_code='$co_code' AND voucher_type='$voucher_type' AND doc_year='$voucher_year' AND voucher_no='$voucher_no'";
    // print_r($query);die();
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($result)) {
        $return_data[] = $show;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'update') {
    // print_r($_POST); die();
    $voucher_date = $_POST['voucher_date'];
    $year = $_POST['year'];
    $co_code = $_POST['company_code'];
    $narration = $_POST['narration'];
    $ref_no = $_POST['reference_no'];
    $debit = $_POST['debit'];
    $credit = $_POST['credit'];
    $monthwise_ser_no = $_POST['monthwise_ser_no'];
    $voucher_no =  $_POST['voucher_no'];
    $upd_mst_q = "UPDATE acttran_mst SET voucher_date='$voucher_date', doc_year='$year' ,co_code='$co_code',ref_no='$ref_no',payee='$monthwise_ser_no',naration='$narration' WHERE co_code='$co_code' AND voucher_type='OV' AND doc_year='$year' AND voucher_no='$voucher_no'";
    // print_r($upd_mst_q);die();
    $upd_mst_r = $conn->query($upd_mst_q);
    if ($upd_mst_r) {
        $del_dtl_q = "DELETE FROM acttran_dtl WHERE co_code='$co_code' AND voucher_type='OV' AND doc_year='$year' AND voucher_no='$voucher_no'";
        //   print_r($del_dtl_q);die();
        $del_dtl_r = $conn->query($del_dtl_q);
        if ($del_dtl_r) {
            $entry_no = 1;
            for ($i = 0; $i < count($_POST['acc_desc']); $i++) {
                $acc_desc = $_POST['acc_desc'][$i];
                $detail = $_POST['detail'][$i];
                $depart_desc = $_POST['depart_desc'][$i];
                $vehicle_code = $_POST['vehicle_code'][$i] == '' ? '0' : $_POST['vehicle_code'][$i];
                $credit = $_POST['credit'][$i];
                $memo = $_POST['memo'][$i];
                $credits = str_replace(',', '', $credit);
                if (is_numeric($credits)) {
                    $credit = $credits;
                }
                $debit = $_POST['debit'][$i];
                $debits = str_replace(',', '', $debit);
                if (is_numeric($debits)) {
                    $debit = $debits;
                }
                $detail_q = "INSERT INTO acttran_dtl(co_code,doc_year,voucher_type,voucher_no,voucher_date,account_code,debit,remarks,dept_code,vehicle_code,credit,entry_no)value ('$co_code','$year','OV','$voucher_no','$voucher_date','$acc_desc','$debit','$memo','$depart_desc','$vehicle_code','$credit','$entry_no')";
                // print_r($detail_q);die();
                $detail_r = $conn->query($detail_q);
                if ($detail_r) {
                    $return_data = array(
                        "status" => 1,
                        // "voucher_no" => $voucher_no,
                        "message" => "Debit Voucher has been Updated having Voucher No:" . $voucher_no
                    );
                } else {
                    $return_data = array(
                        "status" => 0,
                        "message" => "Voucher has not been Updated"
                    );
                }
                $entry_no++;
            }
        }
    } else {
        $return_data = array(
            "status" => 0,
            "message" => "Action Not saad"
        );
    }
} else {
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
    );
}

print(json_encode($return_data, JSON_PRETTY_PRINT));

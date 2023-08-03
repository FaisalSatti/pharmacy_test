<?php
session_start();
include("../api/auth/db.php");
require_once __DIR__  . '/vendor/autoload.php';
require_once __DIR__ . '/../helpers/helpers.php';

$barcode = new Helpers();

if (isset($_GET['action']) && $_GET['action'] == 'print') {
    // print_r($_GET);die();
    $company_code = $_GET['company_code'];
    $from_code = $_GET['from_code'];
    $to_code = $_GET['to_code'];
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

    $sql = "SELECT CO_CODE,ACCOUNT_CODE,DESCR,OPEN_DEBIT,OPEN_CREDIT
    FROM ACT_LC_VIEW2
    WHERE CO_CODE = '$company_code'
    AND ACCOUNT_CODE = '$from_code'";
    // print_r($sql);die();
    $result = $conn->query($sql);
    $show = mysqli_fetch_assoc($result);
    $OPEN_DEBIT=$show['OPEN_DEBIT']??0;
    $OPEN_CREDIT=$show['OPEN_CREDIT']??0;
   

    // ------------------------------------------------------------------------------------
        // CF CASH BANK

    $CF_CASH = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
	AS   CF_CASH
	FROM   ACT_LC_VIEW2
	WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('701', '702')
	AND    CO_CODE = '$company_code'";
    $CASH_RESULTS = $conn->query($CF_CASH);
    $show2 = mysqli_fetch_assoc($CASH_RESULTS);
    // $CF_CASH1=0;
    $CF_CASH1=$show2['CF_CASH']??0;
    // print_r($CF_CASH1);die();
    
    
    $CFBANK = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
	AS   CFBANK
	FROM   MASTER_VIEW_LEDGER_GL
	WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('701', '702')
	AND    CO_CODE = '$company_code'
	AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
    $BANK_RESULTS = $conn->query($CFBANK);
    $show3 = mysqli_fetch_assoc($BANK_RESULTS);
    $CFBANK1=$show3['CFBANK']??0;
    
    
    
    
    $CASH_BANK_VAL = $CF_CASH1 + $CFBANK1;
    // print_r($CASH_BANK_VAL);die();
 // ------------------------------------------------------------------------------------
                // CF STOCK
                $CFSTOCK = "SELECT SUM(IFNULL(CLOSE_VAL,0)) AS CF_STOCK FROM ITEMS
                WHERE DIV_CODE IN (1,2,3,4,11);";
                $STOCK_RESULTS = $conn->query($CFSTOCK);
                $show4 = mysqli_fetch_assoc($STOCK_RESULTS);
                
                $CF_STOCK=$show4['CF_STOCK']??0;
                // print_r($CF_STOCK);die();


 // ------------------------------------------------------------------------------------

            //  CF DEBTORS

            $DEBTOR1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
            AS DEBTOR_OPEN
            FROM   ACT_LC_VIEW2_GL
            WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('601', '602', '603', '604', '611', '612')
            AND    CO_CODE = '$company_code'";
            $DEBTOR_RESULTS = $conn->query($DEBTOR1);
            $show5 = mysqli_fetch_assoc($DEBTOR_RESULTS);
            
            $DEBTOR_OPEN=$show5['DEBTOR_OPEN']??0;
            // print_r($DEBTOR_OPEN);die();



            $DEBTOR2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
            AS   DEBTOR_LGR
            FROM   MASTER_VIEW_LEDGER_GL
            WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('601', '602', '603', '604', '611', '612')
            AND    CO_CODE = '$company_code'
            AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
            $DEBTOR_RESULTS2 = $conn->query($DEBTOR2);
            $show6 = mysqli_fetch_assoc($DEBTOR_RESULTS2);
            
            $DEBTOR_LGR=$show6['DEBTOR_LGR']??0;
            
            $CF_DEBTOR = $DEBTOR_OPEN + $DEBTOR_LGR;
            // print_r($CF_DEBTOR);die();



 // ------------------------------------------------------------------------------------
                // CF LOANS 


                            
            $LOAN1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
            as   LOAN_OPEN
            FROM   ACT_LC_VIEW2
            WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('626')
            AND    CO_CODE = '$company_code'";
            $LOAN_RESULTS = $conn->query($LOAN1);
            $show7 = mysqli_fetch_assoc($LOAN_RESULTS);
            
            $LOAN_OPEN=$show7['LOAN_OPEN']??0;
            // print_r($LOAN_OPEN);die();
            
            // $CF_DEBTOR = $DEBTOR_OPEN + $DEBTOR_LGR;



            $LOAN2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
            AS   LOAN_LGR
            FROM   MASTER_VIEW_LEDGER_GL
            WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('626')
            AND    CO_CODE = '$company_code'
            AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
            $LOAN_RESULTS2 = $conn->query($LOAN2);
            $show8 = mysqli_fetch_assoc($LOAN_RESULTS2);
            
            $LOAN_LGR=$show8['LOAN_LGR']??0;
            
            
            $CF_LOAN = $LOAN_OPEN + $LOAN_LGR;
            // print_r($CF_LOAN);die();



 // ------------------------------------------------------------------------------------
        //  CF OTHER ADVANCE

        $ADVANCE1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
        AS   ADVANCE_OPEN
        FROM   ACT_LC_VIEW2
        WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('627')
        AND    CO_CODE = '$company_code'";
        $ADVANCE_RESULTS = $conn->query($ADVANCE1);
        $show9 = mysqli_fetch_assoc($ADVANCE_RESULTS);
        
        $ADVANCE_OPEN=$show9['ADVANCE_OPEN']??0;
        // print_r($ADVANCE_OPEN);die();



        $ADVANCE2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
        AS   ADVANCE_LGR
        FROM   MASTER_VIEW_LEDGER_GL
        WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('627')
        AND    CO_CODE = '$company_code'
        AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
        $ADVANCE_RESULTS2 = $conn->query($ADVANCE2);
        $show10 = mysqli_fetch_assoc($ADVANCE_RESULTS2);
        
        $ADVANCE_LGR=$show10['ADVANCE_LGR']??0;
        
        
        $CF_ADVANCE = $ADVANCE_OPEN + $ADVANCE_LGR;
        // print_r($CF_ADVANCE);die();


 // ------------------------------------------------------------------------------------
                    //  CF EXPORT 




                    $EXPORT1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
                    AS   EXPORT_OPEN
                    FROM   ACT_LC_VIEW2
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('630')
                    AND    CO_CODE = '$company_code'";
                    $EXPORT_RESULT = $conn->query($EXPORT1);
                    $show11 = mysqli_fetch_assoc($EXPORT_RESULT);
                    
                    $EXPORT_OPEN=$show11['EXPORT_OPEN']??0;
                    



                    $EXPORT2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
                    AS   EXPORT_LGR
                    FROM   MASTER_VIEW_LEDGER_GL
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('630')
                    AND    CO_CODE = '$company_code'
                    AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
                    
                    $EXPORT_RESULT2 = $conn->query($EXPORT2);
                    $show12 = mysqli_fetch_assoc($EXPORT_RESULT2);
                    
                    $EXPORT_LGR=$show12['EXPORT_LGR']??0;
                    

                    $CF_EXPORT = $EXPORT_OPEN + $EXPORT_LGR;
                   







 // ------------------------------------------------------------------------------------
                    // CF CUR ASSOCIATED

                    $ASSOCIATE1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
                    AS   ASSOCIATE_OPEN
                    FROM   ACT_LC_VIEW2
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('628')
                    AND    CO_CODE = '$company_code'";
                    $ASSOCIATE_RESULT = $conn->query($ASSOCIATE1);
                    $show13 = mysqli_fetch_assoc($ASSOCIATE_RESULT);
                    
                    $ASSOCIATE_OPEN=$show13['ASSOCIATE_OPEN']??0;
                    // print_r($ASSOCIATE_OPEN);die();


                    $ASSOCIATE2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
                    AS   ASSOCIATE_LGR
                    FROM   MASTER_VIEW_LEDGER_GL
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('628')
                    AND    CO_CODE = '$company_code'
                    AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
                    $ASSOCIATE_RESULT2 = $conn->query($ASSOCIATE2);
                    $show14 = mysqli_fetch_assoc($ASSOCIATE_RESULT2);
                    
                    $ASSOCIATE_LGR=$show14['ASSOCIATE_LGR']??0;
                    $CF_ASSOCIATE = $ASSOCIATE_OPEN + $ASSOCIATE_LGR;
                    //   print_r($CF_ASSOCIATE);die();


 // ------------------------------------------------------------------------------------

                    // CF PREPAID

                    $PREPAID1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
                    AS   PREPAID_OPEN
                    FROM   ACT_LC_VIEW2
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('302')
                    AND    CO_CODE = '$company_code'";
                    $PREPAID_RESULT = $conn->query($PREPAID1);
                    $show15 = mysqli_fetch_assoc($PREPAID_RESULT);
                    
                    $PREPAID_OPEN=$show15['PREPAID_OPEN']??0;
                    // print_r($PREPAID_OPEN);die();
            




                    $PREPAID2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
                    AS   PREPAID_LGR
                    FROM   MASTER_VIEW_LEDGER_GL
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('302')
                    AND    CO_CODE = '$company_code'
                    AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
                    $PREPAID_RESULT2 = $conn->query($PREPAID2);
                    $show16 = mysqli_fetch_assoc($PREPAID_RESULT2);
                    
                    $PREPAID_LGR=$show16['PREPAID_LGR']??0;
                    
                    $CF_PREPAID = $PREPAID_OPEN + $PREPAID_LGR;
                    
                    //  print_r($CF_PREPAID);die();




 // ------------------------------------------------------------------------------------
                    // CF_CUR_LETTER
                    $LETTER1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
                    AS   LETTER_OPEN
                    FROM   ACT_LC_VIEW2
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('629')
                    AND    CO_CODE = '$company_code'";
                    $LETTER_RESULT1 = $conn->query($LETTER1);
                    $show17 = mysqli_fetch_assoc($LETTER_RESULT1);
                    
                    $LETTER_OPEN=$show17['LETTER_OPEN']??0;
                    // print_r($LETTER_OPEN);die();
                    
                    
                    
                    
                    $LETTER2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
                    AS   LETTER_LGR
                    FROM   MASTER_VIEW_LEDGER_GL
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('629')
                    AND    CO_CODE = '$company_code'
                    AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
                    $LETTER_RESULT2 = $conn->query($LETTER2);
                    $show18 = mysqli_fetch_assoc($LETTER_RESULT2);
                    
                    $LETTER_LGR=$show18['LETTER_LGR']??0;
                    
                    
                    $CF_LETTER = $LETTER_OPEN + $LETTER_LGR;
                    // print_r($CF_LETTER);die();

 

 // ------------------------------------------------------------------------------------

            //  CF TOT CUS ASSETS


            $CF_TOTAL_ASSET = $CASH_BANK_VAL + $CF_STOCK + $CF_DEBTOR + $CF_LOAN + $CF_ADVANCE + $CF_EXPORT + $CF_ASSOCIATE + $CF_PREPAID + $CF_LETTER;




// ------------------------------------------------------------------------------------
            // CF FIXED ASSET OWN
            


            $FIXASSET1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
            AS   FIXASSET_OPEN
            FROM   ACT_LC_VIEW2
            WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('401')
            AND    CO_CODE = '$company_code'";
        $FIXASSET_RESULT1 = $conn->query($FIXASSET1);
        $show19 = mysqli_fetch_assoc($FIXASSET_RESULT1);

        $FIXASSET_OPEN=$show19['FIXASSET_OPEN']??0;
        // print_r($FIXASSET_OPEN);die();
          
          
          
          
          $FIXASSET2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
          AS   FIXASSET_LGR
          FROM   MASTER_VIEW_LEDGER_GL
          WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('401')
            AND    CO_CODE = '$company_code'
            AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
        $FIXASSET_RESULT2 = $conn->query($FIXASSET2);
        $show20 = mysqli_fetch_assoc($FIXASSET_RESULT2);
        
        $FIXASSET_LGR=$show20['FIXASSET_LGR']??0;
        // print_r($FIXASSET_LGR);die();

        $CF_FIXED_ASSETS = $FIXASSET_OPEN + $FIXASSET_LGR;




// ------------------------------------------------------------------------------------
            // CF FIXED ASSET LEASED

            $ASSETLEASED1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
            AS   ASSETLEASED_OPEN
            FROM   ACT_LC_VIEW2
            WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('402')
            AND    CO_CODE = '$company_code'";
          $ASSETLEASED_RESULT1 = $conn->query($ASSETLEASED1);
          $show21 = mysqli_fetch_assoc($ASSETLEASED_RESULT1);
          
          $ASSETLEASED_OPEN=$show21['ASSETLEASED_OPEN']??0;
        //   print_r($ASSETLEASED_OPEN);die();
           
           
           
           
           $ASSETLEASED2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
           AS   ASSETLEASED_LGR
           FROM   MASTER_VIEW_LEDGER_GL
           WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('402')
        AND    CO_CODE = '$company_code'
        AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
          $ASSETLEASED_RESULT2 = $conn->query($ASSETLEASED2);
          $show22 = mysqli_fetch_assoc($ASSETLEASED_RESULT2);
          
          $ASSETLEASED_LGR=$show22['ASSETLEASED_LGR']??0;
        //   print_r($ASSETLEASED_LGR);die();




          $CF_ASSET_LEASED = $ASSETLEASED_OPEN +$ASSETLEASED_LGR;





// ------------------------------------------------------------------------------------
                //   CF INVESTMENT


                $INVESTMENT1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
                AS   INVESTMENT_OPEN
                FROM   ACT_LC_VIEW2
                WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('451')
                AND    CO_CODE = '$company_code'";
               $INVESTMENT_RESULT1 = $conn->query($INVESTMENT1);
               $show23 = mysqli_fetch_assoc($INVESTMENT_RESULT1);
               
               $INVESTMENT_OPEN=$show23['INVESTMENT_OPEN']??0;
            //    print_r($INVESTMENT_OPEN);die();


            $INVESTMENT2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
            AS   INVESTMENT_LGR
            FROM   MASTER_VIEW_LEDGER_GL
            WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('451')
            AND    CO_CODE = '$company_code'
            AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
           $INVESTMENT_RESULT2 = $conn->query($INVESTMENT2);
           $show24 = mysqli_fetch_assoc($INVESTMENT_RESULT2);
           
           $INVESTMENT_LGR=$show24['INVESTMENT_LGR']??0;
           
           
           $CF_INVESTMENT = $INVESTMENT_OPEN + $INVESTMENT_LGR;
            //   print_r($CF_INVESTMENT);die();



// ----------------------------------------------------------------------
            // CF TOTAL FIXED ASSET


            $CF_TOTAL_FIXED_ASSET = $CF_FIXED_ASSETS + $CF_ASSET_LEASED + $CF_INVESTMENT;




// ----------------------------------------------------------------------
            // CF TOTAL ASSETS

            $CF_TOTAL_ASSET_VAL = $CF_TOTAL_ASSET + $CF_TOTAL_FIXED_ASSET;





// ----------------------------------------------------------------------
            // CF CREDITORRR



            $CREDITOR = "SELECT SUM(IFNULL(OPEN_CREDIT,0)) - SUM(IFNULL(OPEN_DEBIT,0)) 
            AS   CREDITOR_OPEN
            FROM   ACT_LC_VIEW2_GL
            WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('301')
            AND    CO_CODE = '$company_code'";
                // print_r($CREDITOR);die();
           $CREDITOR_RESULT = $conn->query($CREDITOR);
           $show25 = mysqli_fetch_assoc($CREDITOR_RESULT);
           
           $CREDITOR_OPEN=$show25['CREDITOR_OPEN']??0;



            $CREDITOR2 = "SELECT SUM(IFNULL(CREDIT,0)) - SUM(IFNULL(DEBIT,0)) 
            as   CREDITOR_LGR
            FROM   MASTER_VIEW_LEDGER_GL
            WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('301')
            AND    CO_CODE = '$company_code'
            AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
                // print_r($CREDITOR2);die();
           $CREDITOR_RESULT2 = $conn->query($CREDITOR2);
           $show26 = mysqli_fetch_assoc($CREDITOR_RESULT2);
           
           $CREDITOR_LGR=$show26['CREDITOR_LGR']??0;


           $CF_CREDITOR = $CREDITOR_OPEN + $CREDITOR_LGR;


// ----------------------------------------------------------------------
            //CF ACCRUED

            $ACCRUED1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
            AS   ACCRUED_OPEN
            FROM   ACT_LC_VIEW2
            WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('302')
            AND    CO_CODE = '$company_code'";
                // print_r($ACCRUED1);die();
           $ACCRUED_RESULT1 = $conn->query($ACCRUED1);
           $show27 = mysqli_fetch_assoc($ACCRUED_RESULT1);
           
           $ACCRUED_OPEN=$show27['ACCRUED_OPEN']??0;




            $ACCRUED2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
            AS   ACCRUED_LGR
            FROM   MASTER_VIEW_LEDGER_GL
            WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('302')
            AND    CO_CODE = '$company_code'
            AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
                // print_r($ACCRUED2);die();
           $ACCRUED_RESULT2 = $conn->query($ACCRUED2);
           $show28 = mysqli_fetch_assoc($ACCRUED_RESULT2);
           
           $ACCRUED_LGR=$show28['ACCRUED_LGR']??0;




           $CF_ACCRUED = $ACCRUED_OPEN + $ACCRUED_LGR;



// ----------------------------------------------------------------------
                    // CF LONG LIAB




                    $LIAB1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
                    as   LIAB_OPEN
                    FROM   ACT_LC_VIEW2
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('201')
                    AND    CO_CODE = '$company_code'";
                        // print_r($LIAB1);die();
                   $LIAB_RESULT1 = $conn->query($LIAB1);
                   $show29 = mysqli_fetch_assoc($LIAB_RESULT1);
                   
                   $LIAB_OPEN=$show29['LIAB_OPEN']??0;



                    $LIAB2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
                    as   LIAB_LGR
                    FROM   MASTER_VIEW_LEDGER_GL
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('201')
                    AND    CO_CODE = '$company_code'
                    AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
                        // print_r($LIAB2);die();
                   $LIAB_RESULT2 = $conn->query($LIAB2);
                   $show30 = mysqli_fetch_assoc($LIAB_RESULT2);
                   
                   $LIAB_LGR=$show30['LIAB_LGR']??0;

                   $CF_LIABILITIES = $LIAB_OPEN  + $LIAB_LGR;

// ----------------------------------------------------------------------
                    // CF DA BILLS PAYABLE


                    $BILLS1 = "SELECT SUM(IFNULL(OPEN_CREDIT,0)) - SUM(IFNULL(OPEN_DEBIT,0)) 
                    AS   BILLS_OPEN
                    FROM   ACT_LC_VIEW2
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('202')
                    AND    CO_CODE = '$company_code'";
                        // print_r($BILLS1);die();
                   $BILLS_RESULT1 = $conn->query($BILLS1);
                   $show31 = mysqli_fetch_assoc($BILLS_RESULT1);
                   
                   $BILLS_OPEN=$show31['BILLS_OPEN']??0;



                    $BILLS2 = "SELECT SUM(IFNULL(CREDIT,0)) - SUM(IFNULL(DEBIT,0)) 
                    AS  BILLS_LGR
                    FROM   MASTER_VIEW_LEDGER_GL
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('202')
                    AND    CO_CODE = '$company_code'
                    AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
                        // print_r($BILLS2);die();
                   $BILLS_RESULT2 = $conn->query($BILLS2);
                   $show32 = mysqli_fetch_assoc($BILLS_RESULT2);
                   
                   $BILLS_LGR=$show32['BILLS_LGR']??0;

                   
                    $CF_BILLS = $BILLS_OPEN + $BILLS_LGR;





// -------------------------------------------------------------
                    // CF TOT LIAB




                    $CF_TOTAL_LIABILITY = $CF_CREDITOR + $CF_ACCRUED + $CF_LIABILITIES + $CF_BILLS;



                    // -------------------------------------------------------
                    // CF PARTNER CAPITAL
                    




                    $PARTNER1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
                    AS   PARTNER_CAP_OPEN
                    FROM   ACT_LC_VIEW2
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('101')
                    AND    CO_CODE = '$company_code'";
                        // print_r($PARTNER1);die();
                   $PARTNER1_RESULT = $conn->query($PARTNER1);
                   $show33 = mysqli_fetch_assoc($PARTNER1_RESULT);
                   
                   $PARTNER_CAP_OPEN=$show33['PARTNER_CAP_OPEN']??0;




                    $PARTNER2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
                    AS   PARTNER_LGR
                    FROM   MASTER_VIEW_LEDGER_GL
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('101')
                    AND    CO_CODE = '$company_code'
                    AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
                        // print_r($PARTNER2);die();
                   $PARTNER2_RESULT = $conn->query($PARTNER2);
                   $show34 = mysqli_fetch_assoc($PARTNER2_RESULT);
                   
                   $PARTNER_LGR=$show34['PARTNER_LGR']??0;





                   $CF_PARTNER = $PARTNER_CAP_OPEN + $PARTNER_LGR;


//    --------------------------------------------------------------------------------------------
//    CF PARTNER DRAWING




                    $DRAWING1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
                    AS   DRAWING_OPEN
                    FROM   ACT_LC_VIEW2
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('102')
                    AND    CO_CODE = '$company_code'";
                        // print_r($DRAWING1);die();
                   $DRAWING1_RESULT = $conn->query($DRAWING1);
                   $show35 = mysqli_fetch_assoc($DRAWING1_RESULT);
                   
                   $DRAWING_OPEN=$show35['DRAWING_OPEN']??0;




                    $DRAWING2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
                    AS   DRAWING_LGR
                    FROM   MASTER_VIEW_LEDGER_GL
                    WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('102')
                    AND    CO_CODE = '$company_code'
                    AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
                        // print_r($DRAWING2);die();
                   $DRAWING2_RESULT = $conn->query($DRAWING2);
                   $show36 = mysqli_fetch_assoc($DRAWING2_RESULT);
                   
                   $DRAWING_LGR=$show36['DRAWING_LGR']??0;
                   
                   
                   


                   $CF_DRAWING = $DRAWING_OPEN + $DRAWING_LGR;

                   
                   

                   //    --------------------------------------------------------------------------------
                   //    CF RESERVE EQUITY
                   
                   $RESERVE_EQUITY1 = "SELECT SUM(IFNULL(OPEN_DEBIT,0)) - SUM(IFNULL(OPEN_CREDIT,0)) 
                AS   RESERVE_OPEN
                FROM   ACT_LC_VIEW2
                WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('103')
                AND    CO_CODE = '$company_code';";
                    // print_r($RESERVE_EQUITY1);die();
               $RESERVE_EQUITY1_RESULT = $conn->query($RESERVE_EQUITY1);
               $show37 = mysqli_fetch_assoc($RESERVE_EQUITY1_RESULT);
               
               $RESERVE_OPEN=$show37['RESERVE_OPEN']??0;
               

               
               

               
               $RESERVE_EQUITY2 = "SELECT SUM(IFNULL(DEBIT,0)) - SUM(IFNULL(CREDIT,0)) 
               AS   RESERVE_LGR
               FROM   MASTER_VIEW_LEDGER_GL
               WHERE  SUBSTR(ACCOUNT_CODE,1,3) IN ('103')
                    AND    CO_CODE = '$company_code'
                    AND    VOUCHER_DATE BETWEEN '$from_date' AND '$to_date'";
                //    print_r($RESERVE_EQUITY2);die();
              $RESERVE_EQUITY2_RESULT = $conn->query($RESERVE_EQUITY2);
              $show38 = mysqli_fetch_assoc($RESERVE_EQUITY2_RESULT);
              $RESERVE_LGR=$show38['RESERVE_LGR']??0;
              
               
              $CF_RESERVE = $RESERVE_OPEN + $RESERVE_LGR;


// ---------------------------------------------------------------------------------

// CF TOTAL OWNER EQUITY 
               
$CF_TOTAL_OWNER_EQUITY = $CF_PARTNER + $CF_DRAWING + $CF_RESERVE;
               


// --------------------------------------------------------------------------------------------
// CF TOTAL EQUITY

$CF_TOTAL_EQUITY = $CF_TOTAL_LIABILITY + $CF_TOTAL_OWNER_EQUITY;

































$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
            $mpdf->WriteHTML(
                '<div class="row" style="line-height:16px;">
                    <div class="main-heading">
                        <table class="secondlast" style="width:100%;border-collapse:collapse;margin-top:20px;">
                            <tr>
                                <td style="width:250px;font-size:20px;font-family:arial;text-align:center;"></td>                                   
                            </tr>
                            <tr>
                            <td style="border-bottom:3px solid black;width:20%;font-size:12px;text-align:LEFT;font-weight:bold;padding-top:8px;"><b>FROM DATE - ('.$from_date.')</b>  <b>TO DATE ('.$to_date.')</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b style="font-size:20px;">BALANCE SHEET</b></td>    
                             
                          
                            </tr>
                           
                        </table>
                    </div>
                    
                    <div class="invoice_detail" style="padding-top:20px;height:100px;">
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;">
                                <td  style="width:50%;font-size:20px;font-weight:bold;text-align:center;height:20px;border:1px solid black;"><b>ASSETS</b></td>
                                
                                <td  style="width:50%;font-size:20px;font-weight:bold;text-align:center;height:20px;border:1px solid black;"><b>EQUITIES</b></td>
                            </tr>
                          
                           
                            
                           
                        </table>
                        
                        
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;width:50%">
                                <td  style="width:50%;font-size:15px;font-weight:bold;text-align:LEFT;height:20px;"><b>CURRENT ASSETS</b></td>
                                <td  style="width:50%;font-size:15px;font-weight:bold;text-align:LEFT;height:20px;"><b>LIABILITIES</b></td>
                            </tr>
                          
                           
                            
                           
                        </table>
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;width:50%">
                                <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>CASH & BANK</b></td>
                                <td></td>
                                <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CASH_BANK_VAL,2).'</b></td>
                                <td></td>
                                <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>TRADE CREDITORS</b></td>
                                <td></td>
                                <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_CREDITOR,2).'</b></td>
                            </tr>
                          
                           
                            
                           
                        </table>
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;width:50%">
                                <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>STOCK IN TRADE</b></td>
                                <td></td>
                                <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_STOCK,2).'</b></td>
                                <td></td>
                                <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>ACCRUED SALARIES & WAGES</b></td>
                                <td></td>
                                <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_ACCRUED,2).'</b></td>
                            </tr>
                          
                           
                            
                           
                        </table>
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;width:50%">
                                <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>TRADE DEBTORS</b></td>
                                <td></td>
                                <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_DEBTOR,2).'</b></td>
                                <td></td>
                                <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>LONG TERM LIABILITIES</b></td>
                                <td></td>
                                <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_LIABILITIES,2).'</b></td>
                            </tr>
                          
                           
                            
                           
                        </table>
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;width:50%">
                                <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>LOAN ADVANCES TO STAFF</b></td>
                                <td></td>
                                <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_LOAN,2).'</b></td>
                                <td></td>
                                <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>DA BILLS A/P LOANS ADVANCE FROM OTHERS</b></td>
                                <td></td>
                                <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_BILLS,2).'</b></td>
                            </tr>
                          
                           
                            
                           
                        </table>
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;width:50%">
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>OTHER ADVANCES DEPOSITS & PAYMENT</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_ADVANCE,2).'</b></td>
                            <td></td>
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"></td>
                            </tr>
                          
                           
                            
                           
                        </table>
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;width:50%">
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>EXPORT CONTRACTS/LCS/ADVANCE</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_EXPORT,2).'</b></td>
                            <td></td>
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"></td>
                            </tr>
                           
                            
                           
                        </table>
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;width:50%">
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>ASSOCIATED COMPANIES</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_ASSOCIATE,2).'</b></td>
                            <td></td>
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"></td>
                            </tr>
                          
                           
                            
                           
                        </table>
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;width:50%">
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>PREPAID SALARIES WAGES AND OTHERS</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_PREPAID,2).'</b></td>
                            <td></td>
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"></td>
                            </tr>
                          
                           
                            
                           
                        </table>
                        <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;width:50%">
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>LETTER OF CREDIT/CONT/ADV-IMP</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_LETTER,2).'</b></td>
                            <td></td>
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"></td>
                            </tr>
                           
                            
                           
                        </table>
                    <table  style="width:100%;white-space: nowrap;">
                                
                        <tr>
                            <td style="height:3px;"></td>
                        </tr>
                        <tr style="padding-top:55px;text-align:center;width:50%">
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>TOTAL CURRENT ASSETS</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_TOTAL_ASSET,2).'</b></td>
                            <td></td>
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>TOTAL LIABILITIES</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_TOTAL_LIABILITY,2).'</b></td>
                        </tr>
                      
                       
                        
                       
                    </table>
                    <table  style="width:100%;white-space: nowrap;">
                                
                            <tr>
                                <td style="height:3px;"></td>
                            </tr>
                            <tr style="padding-top:55px;text-align:center;width:50%">
                                <td  style="width:50%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"><b>PROPERTY PLANT EQUIPMENTS</b></td>
                                <td  style="width:50%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"><b>OWNERS EQUITY</b></td>
                            </tr>
                          
                           
                            
                           
                    </table>
                    <table  style="width:100%;white-space: nowrap;">
                                
                        <tr>
                            <td style="height:3px;"></td>
                        </tr>
                        <tr style="padding-top:55px;text-align:center;width:50%">
                        <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>FIXED ASSETS (OWN)</b></td>
                        <td></td>
                        <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_FIXED_ASSETS,2).'</b></td>
                        <td></td>
                        <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>PARTNERS CAPITAL</b></td>
                        <td></td>
                        <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_PARTNER,2).'</b></td>
                    </tr>
                      
                       
                        
                       
                    </table>
                    <table  style="width:100%;white-space: nowrap;">
                                
                        <tr>
                            <td style="height:3px;"></td>
                        </tr>
                        <tr style="padding-top:55px;text-align:center;width:50%">
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>FIXED ASSETS (LEASED/IJARAH)</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_ASSET_LEASED,2).'</b></td>
                            <td></td>
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>PARTNERS DRAWING</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_DRAWING,2).'</b></td>
                        </tr>
                      
                       
                        
                       
                    </table>
                    <table  style="width:100%;white-space: nowrap;">
                                
                        <tr>
                            <td style="height:3px;"></td>
                        </tr>
                        <tr style="padding-top:55px;text-align:center;width:50%">
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>INVESTMENTS</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_INVESTMENT,2).'</b></td>
                            <td></td>
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>RESERVES & EQUITY</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_RESERVE,2).'</b></td>
                        </tr>       
                      
                       
                        
                       
                    </table>
                    <table  style="width:100%;white-space: nowrap;">
                                
                        <tr>
                            <td style="height:3px;"></td>
                        </tr>
                        <tr style="padding-top:55px;text-align:center;width:50%">
                        <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"><b></b></td>
                        <td></td>
                        <td  style="width:20%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;"><b></b></td>
                        <td></td>
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>NET INCOME</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b></b></td>
                        </tr>
                      
                       
                        
                       
                    </table>
                    <table  style="width:100%;white-space: nowrap;">
                                
                        <tr>
                            <td style="height:3px;"></td>
                        </tr>
                        <tr style="padding-top:55px;text-align:center;width:50%">
                        <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>TOTAL FIXED ASSETS</b></td>
                        <td></td>
                        <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_TOTAL_FIXED_ASSET,2).'</b></td>
                        <td></td>
                        <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>TOTAL OWNERS EQUITY</b></td>
                        <td></td>
                        <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_TOTAL_OWNER_EQUITY,2).'</b></td>
                    </tr>
                      
                       
                        
                       
                    </table>
                    <table  style="width:100%;white-space: nowrap;">
                                
                        <tr>
                            <td style="height:3px;"></td>
                        </tr>
                        <tr style="padding-top:55px;text-align:center;width:50%">
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>TOTAL ASSETS</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_TOTAL_ASSET_VAL,2).'</b></td>
                            <td></td>
                            <td  style="width:30%;font-size:12px;font-weight:bold;text-align:LEFT;height:20px;border:1px solid black;"><b>TOTAL EQUITIES</b></td>
                            <td></td>
                            <td  style="width:20%;font-size:12px;font-weight:bold;text-align:right;height:20px;border:1px solid black;"><b>'.NUMBER_FORMAT($CF_TOTAL_EQUITY,2).'</b></td>
                        </tr>
                      
                       
                        
                       
                    </table>
                    
                       
                    </div>
                
                    
                    
                   
            
        
            
        </div>',2);         
        $mpdf->Output();
// }
// //         }
    // }else {
    //     echo "form no required";
//     // }
}else {
    echo "action not matched";
}
// // // die();
// // 
 ?>
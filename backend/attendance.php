<?php
      require 'vendor/autoload.php';
      use PhpOffice\PhpSpreadsheet\Spreadsheet;
      use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

      function attendance($rollno,$unit){

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load("attendance.xlsx");
            $sheetData = $spreadsheet->getSheetByName($unit)->toArray();

            $arrayName=$sheetData;
            $rowSize = count( $arrayName );
            $columnSize = max( array_map('count', $arrayName) );

            for($x=3; $x<=$rowSize; $x++){
                  if(strtolower($sheetData[$x][1])==strtolower($rollno)){
                        $rowNo = $x;
                        break;
                  }
            }
            // echo $rowNo;
            $total_hour = $sheetData[$rowNo][2];
            $attendance = array();

            for($y=4; $y<=$columnSize; $y++){
                  if(!empty($sheetData[$rowNo][$y])){
                        $subAttendance=array();
                        $subAttendance['hour']=$sheetData[$rowNo][$y];
                        $subAttendance['date'] = $sheetData[0][$y];
                        $subAttendance['activity'] = $sheetData[1][$y];
                        $attendance[]=$subAttendance;
                  }
            }
            $response = array();
            $response['name']=$sheetData[$rowNo][0];
            $response['rollno']=$sheetData[$rowNo][1];
            $response['unit']=$unit;
            $response['phone']=$sheetData[$rowNo][2];
            $response['total']=$total_hour;
            $response['attendance']=$attendance;

            return json_encode($response);
      }

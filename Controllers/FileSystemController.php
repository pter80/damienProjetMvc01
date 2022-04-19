<?php
namespace Controllers;


class FileSystemController extends Controller

{
    public function lectureCsv() {
        $result=[];
        $filename = "/home/pter/share/bts2020/covid.csv";
        $handle = fopen($filename, "r");
        $entete=fgetcsv($handle,0,";");
        for ($i=1;$i< 100;$i++){
            $row=fgetcsv($handle,0,";");
            array_push($result,$row);
        }
        //array_splice($result,-1,1);
        //print_r($result);die;
        echo $this->twig->render('covid.twig', ['entete'=>$entete,'result' => $result]);
    }

    public function ecritureCsv() {
        $filename="documents/legumes.csv";
        $handle = fopen($filename,"w");
        $fields=["haricot","choux-fleur","courgette"];
        fputcsv(
            $handle,
            $fields,
            "|",
            '"',
            "\\"
        );
        fclose($handle);
    }
}
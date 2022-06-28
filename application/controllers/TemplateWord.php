<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class TemplateWord extends CI_Controller {

	public function index()
	{
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $id = $_GET['id'];
        $surat = $this->db->query("SELECT * FROM agunan WHERE id='$id'");
        foreach ($surat->result() as $row){

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('test.docx');

        $bulan = strftime("%m");
        $romawi = $this->getRomawi($bulan);

        $templateProcessor->setValues([
            'romawi' => $romawi,            
            'alamat' => $row->alamat,
            'tahun' => strftime("%Y"),
            'tanggal' => strftime("%d %B %Y"),
            'nama' => $row->nama,
            'nomorAgunan' => $row->nomorAgunan,
            'lunas' => strftime("%d %B %Y", strtotime($row->lunas)),
            'detailAgunan' => $row->detailAgunan
        ]);

        header("Content-Disposition: attachment; filename=$row->nama.docx");

        $templateProcessor->saveAs('php://output');

        }
	}
	public function getRomawi($bln){
                switch ($bln){
                    case 1: 
                        return "I";
                        break;
                    case 2:
                        return "II";
                        break;
                    case 3:
                        return "III";
                        break;
                    case 4:
                        return "IV";
                        break;
                    case 5:
                        return "V";
                        break;
                    case 6:
                        return "VI";
                        break;
                    case 7:
                        return "VII";
                        break;
                    case 8:
                        return "VIII";
                        break;
                    case 9:
                        return "IX";
                        break;
                    case 10:
                        return "X";
                        break;
                    case 11:
                        return "XI";
                        break;
                    case 12:
                        return "XII";
                        break;
                }
        }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class Word2 extends CI_Controller {

	public function index()
	{
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $phpWord->setDefaultParagraphStyle(
            array(
                'align'      => 'both',
                'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(8),
                'spacing'    => 120,
                'lineHeight' => 1.15
                )
            );
            
            // Adding Text element with font customized using named font style...
        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
            $fontStyleName,
            array('name' => 'Times New Roman', 'size' => 12)
        );
        // Adding Text element with font customized using named font style...
        $fontStyleName2 = 'oneUserDefinedStyle2';
        $phpWord->addFontStyle(
            $fontStyleName2,
            array(
                'name' => 'Times New Roman',
                'size' => 12,
                'underline' => 'single'
                )
        );
        setlocale(LC_ALL, 'id-ID', 'id_ID');

        $id = $_GET['id'];
        $surat = $this->db->query("SELECT * FROM agunanLama WHERE id='$id'");
        foreach ($surat->result() as $row){

        
        $section->addText(
            htmlspecialchars(
                'Nomor  :   xxxx/A.VIII/P/BPR-EB/XII/2021'
                .'                                     '
                .'Magetan, '
                .strftime("%d %B %Y")
            ),
            $fontStyleName
        );
        $section->addText(
            htmlspecialchars(
                'Perihal  :   Pemberitahuan'
            ),
            $fontStyleName
        );
        $section->addTextBreak(1);
        $section->addText(
            htmlspecialchars(
                'Kepada Yth :'
            ),
            $fontStyleName
        );
        $section->addText(
            htmlspecialchars(
                'Bpk/ Ibu/ Sdr./ Sdri. '
                .$row->nama
            ),
            $fontStyleName
        );
        $section->addText(
            htmlspecialchars(
                'Di Tempat'
            ),
            $fontStyleName
        );
        $section->addTextBreak(1);
        $section->addText(
            htmlspecialchars(
                'Yang bertanda tangan dibawah ini :'
            ),
            $fontStyleName
        );
        $section->addText(
            htmlspecialchars(
                'Nama     :     MUHAMMAD NUF BERNADIN, SE'
            ),
            $fontStyleName
        );
        $section->addText(
            htmlspecialchars(
                'Jabatan   :    Direktur Utama PT. BPR EKADHARMA BHINARAHARJA'
            ),
            $fontStyleName
        );
        $section->addText(
            htmlspecialchars(
                'Alamat   :     Jl. Raya Jaranan – Ngadirejo, Kawedanan, Magetan'
            ),
            $fontStyleName
        );
        $section->addText(
            htmlspecialchars(
                'Berdasarkan Perjanjian Kredit nomor '
                .$row->nomorAgunan
                .' tertanggal '
                .strftime("%d %B %Y", strtotime($row->lunas))
                .' yang telah lunas, dengan ini kami sampaikan bahwa ' 
                .'agunan/ jaminan kredit atas nama Bpk/ Ibu/ Sdr/ Sdri '
                .$row->nama
                .' berupa '
                .$row->detailAgunan
                .' dapat segera diambil di PT. BPR Ekadharma Bhinaraharja sampai dengan ' 
                .'tanggal xxxx Apabila agunan/ jaminan tersebut tidak diambil sampai '
                .'dengan jangka waktu yang ditentukan, maka Debitur akan dikenakan biaya ' 
                .'deposit agunan Rp. xxxx per bulan.'
            ),
            $fontStyleName
        );
        $section->addText(
            htmlspecialchars(
                'Selain itu jika agunan/ jaminan tidak diambil hingga ' 
                .'jangka waktu yang sudah disampaikan, PT. BPR Ekadharma '
                .'Bhinaraharja tidak bertanggung jawab atas agunan/ jaminan tersebut.'
            ),
            $fontStyleName
        );
        $section->addText(
            htmlspecialchars(
                'Demikian surat pemberitahuan ini kami sampaikan, atas perhatiannya terima kasih.'
            ),
            $fontStyleName
        );
        $section->addTextBreak(1);
        $section->addText(
            htmlspecialchars(
                '                                                                             '
                .'PT. BPR EKADHARMA BHINARAHARJA'
            ),
            $fontStyleName
        );
        $section->addText(
            htmlspecialchars(
                '                                                                                              '
                .'Kawedanan – Magetan'
            ),
            $fontStyleName
        );
        $section->addText(
            htmlspecialchars(
                '                                                                                                        '
                .'Direksi'
            ),
            $fontStyleName
        );
        $section->addTextBreak(2);
        $section->addText(
            htmlspecialchars(
                '                                                                                     '
                .'MUHAMMAD NUF BERNADIN, SE'
            ),
            $fontStyleName
        );
        $section->addText(
            htmlspecialchars(
                '                                                                                                     '
                .'Direktur Utama'
            ),
            $fontStyleName
        );
        
        $section->addTextBreak(2);
        $section->addText(
            htmlspecialchars(
                'Tembusan :'
            ),
            $fontStyleName2
        );
        $section->addText(
            htmlspecialchars(
                '1. Arsip'
            ),
            $fontStyleName
        );

        $writer = new Word2007($phpWord);
        $filename = 'simple';
		
		header('Content-Type: application/msword');
        	header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
		header('Cache-Control: max-age=0');
        $writer->save('php://output');
        }
	}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFtpController extends Controller
{
    private $ftp_username = 'ardalan@degenerate25.ir';
    private $ftp_userpass = 'ardalan1997!@';
    private $ftp_server = 'ftp.degenerate25.ir';
    public function __invoke()
    {
        $ftp_connection = ftp_connect($this->ftp_server);
        ftp_login($ftp_connection, $this->ftp_username, $this->ftp_userpass);
        $contents = ftp_nlist($ftp_connection, ".");
        ftp_close($ftp_connection);
        // dd(gettype($contents));
        return view('ftp')->with('contents',$contents);
    }

    public function upload(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $image_name = time() . '-' . basename(trim($_FILES['mfile']['name']));
            $image_name = date("Ymd_his") . '-' . basename(trim($_FILES['mfile']['name']));
            $image_path = basename($_FILES['mfile']['name']);
            if ($request->mfile->move(public_path('images'), $image_name)) {
                echo 'file is valid, and was successfully uploaded ...';
            }
            $ftp_connection = ftp_connect($this->ftp_server) or die("Could not connect to $this->ftp_server");
            $login = ftp_login($ftp_connection, $this->ftp_username, $this->ftp_userpass);
            // $file = basename($image_name);
            $fp = fopen(public_path('images/' . $image_name), 'r');
            $contents = ftp_nlist($ftp_connection, ".");
            // dd($contents);
            if (ftp_fput($ftp_connection, $image_name, $fp, FTP_ASCII)) {
                ftp_close($ftp_connection);
                fclose($fp);
                return redirect()->route('ftp_upload')
                    ->with('success', 'File Uploaded Successfully Through FTP.')
                    ->with('contents', $contents);
            } else {
                ftp_close($ftp_connection);
                fclose($fp);
                return redirect()->route('ftp_upload')->with('fail', 'Error Uploading File.');
            }
        }
    }
}

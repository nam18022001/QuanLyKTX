<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Str;
use App\Models\Tang;
use App\Models\Khu;
use App\Models\Giuong;
use App\Models\Phong;
use App\Models\Page;
use App\Models\SinhVien;
use App\Models\Thue;
use App\Models\Dien;
use App\Models\Nuoc;
use App\Models\User;
use App\Models\ThongBao;
use App\Models\ThongBaoFile;
use App\Models\ThongBaoSV;
use Carbon\Carbon;
use File;
use View;
use Mail;
use App\Mail\NofitoQL;
use Illuminate\Support\Facades\Storage;
class SinhVienController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('page.view.sinhvien.view.index');
    }
    public function mailbox()
    {
        # code...
        $nofi = ThongBaoSV::where([['id_sinhvien', Auth::guard('sinh_vien')->id()], ['xoa', 1]])->orderBy('created_at', 'desc')->paginate(5);
        
        return view('page.view.sinhvien.view.Mail.index', ['nofi' => $nofi]);
    }
    public function readnofi($id)
    {
        # code...
        
        $thongbao = ThongBaoSV::find($id);
        
        if ($thongbao) {
            # code...
            $thongbao->read_at = Carbon::now();
            $thongbao->save();
            $file = ThongBaoFile::where('id_thongbaosv', $id)->get();
            return view('page.view.sinhvien.view.Mail.mailread', ['thongbao' => $thongbao, 'file' => $file]);
        }else {
            # code...
            return redirect('thong-bao');
        }
    }
    public function mailsend()
    {
        # code...
        return view('page.view.sinhvien.view.Mail.sendmail');
    }
    public function postmailsend(Request $request)
    {
        # code...
        $this->validate($request, 
            [
                'tieude' => 'bail|between:5,100'
            ],
            [
                'tieude.between' => 'Vui lòng nhâp tiêu đề lớn hơn 5 chữ và bé hơn 10 chữ'
            ]
        );
        if ($request->has('discard')) {
            # code...
            $phananh = new ThongBao();
            $phananh->id_sinhvien = Auth::guard('sinh_vien')->id();
            $phananh->tieude = $request->tieude;
            $phananh->noidung = $request->noidung;
            $phananh->tomtat = $request->tomtat;
            $phananh->xoa = 0;
            $phananh->save();

            if ($request->hasFile('files')) {
                # code...
                $file = $request->file('files');
                
                if (Auth::guard('sinh_vien')->id() < 10) {
                    # code...
                    $folderSV = '0'.Auth::guard('sinh_vien')->id();

                }else {$folderSV = Auth::guard('sinh_vien')->id();}
                foreach ($file as $value) {
                    # code...
                    $filename = $value->getClientOriginalName();
                    $name = Str::random(5).'-'.$filename;
                    while (file_exists('FileMail/ToQL/'.$folderSV.'/'.$name)) {
                        # code...
                        $name = Str::random(5).'-'.$filename;
                    }

                    $value->move('FileMail/ToQL/'.$folderSV, $name);

                    $fileinsert = new ThongBaoFile();
                    $fileinsert->filename = $name;
                    $fileinsert->id_thongbao = $phananh->id;
                    $fileinsert->save();
                }

            }
            return redirect('thong-bao/ban-nhap');
        }elseif($request->has('send')){

            $phananh = new ThongBao();
            $phananh->id_sinhvien = Auth::guard('sinh_vien')->id();
            $phananh->tieude = $request->tieude;
            $phananh->noidung = $request->noidung;
            $phananh->tomtat = $request->tomtat;
            $phananh->xoa = 1;
            $phananh->save();


            if ($request->hasFile('files')) {
                # code...
                $file = $request->file('files');
                
                if (Auth::guard('sinh_vien')->id() < 10) {
                    # code...
                    $folderSV = '0'.Auth::guard('sinh_vien')->id();

                }else {$folderSV = Auth::guard('sinh_vien')->id();}
                foreach ($file as $value) {
                    # code...
                    $filename = $value->getClientOriginalName();
                    $name = Str::random(5).'-'.$filename;
                    while (file_exists('FileMail/ToQL/'.$folderSV.'/'.$name)) {
                        # code...
                        $name = Str::random(5).'-'.$filename;
                    }

                    $value->move('FileMail/ToQL/'.$folderSV, $name);

                    $fileinsert = new ThongBaoFile();
                    $fileinsert->filename = $name;
                    $fileinsert->id_thongbao = $phananh->id;
                    $fileinsert->save();
                }

            }
            if (Auth::guard('sinh_vien')->id() < 10) {
                # code...
                $id_folder = '0'.Auth::guard('sinh_vien')->id();
            }else {
                # code...
                $id_folder = Auth::guard('sinh_vien')->id();
            }
            $attachment  = ThongBaoFile::where('id_thongbao', $phananh->id)->get();
        
            Mail::to('hnvnam.19it3@vku.udn.vn')->send(new NofitoQL($phananh, $attachment, $id_folder));

            return redirect('thong-bao/da-gui');
        }
    }
    public function sent()
    {
        # code...
        $sent = ThongBao::where([['id_sinhvien', Auth::guard('sinh_vien')->id()], ['xoa', 1]])->orderBy('created_at', 'desc')->paginate(5);

        
        return view('page.view.sinhvien.view.Mail.sent', ['sent' => $sent]);
    }
    public function xoasent(Request $request)
    {
        # code...
        $checked = $request->input('checked',[]);
        if ($checked != 'on' > 0)  {
            # code...
            $thongbao = ThongBao::whereIn("id", $checked)->update(['xoa' => 2]);
            $lenhxoa = ThongBao::where('xoa', 2)->get();
                foreach ($lenhxoa as $value) {
                    # code...
                    $del = Carbon::now()->diffInMonths($value->updated_at);
                    if ($del == 1) {
                        # code...
                        $value->delete();
                    }
                }
            return redirect('thong-bao/da-gui')->with('success', 'Đã di chuyển vào thùng rác');
        }else {
            # code...
            return redirect('thong-bao/da-gui')->with('loi', 'Chọn ít nhất một một hộp thư để xóa');

        }
        
    }
    public function xoasentwid($id)
    {
        # code...
        $thongbao = ThongBao::where([['id', $id], ['id_sinhvien', Auth::guard('sinh_vien')->id()]])->first();
        if ($thongbao) {
            # code...
            $thongbao->xoa = 2;
            $thongbao->save();
            return redirect('thong-bao/thung-rac')->with('update', 'Đã di chuyển vào thùng rác');
        }else {
            # code...
            return redirect('thong-bao/thung-rac')->with('loi', 'Không thể xóa');
        }
        
        
    }
    
    public function searchmail(Request $request)
    {
        # code...
        if ($request->ajax()) {
            # code...
            
            $output = '';
            $thongbao = ThongBaoSV::where([
                ['id_sinhvien', Auth::guard('sinh_vien')->id()], 
                ['xoa', 1],
                ['tieude', 'LIKE', '%'.$request->search.'%'],
            ])
            ->orWhere([
                ['id_sinhvien', Auth::guard('sinh_vien')->id()], 
                ['xoa', 1],
                ['tomtat', 'LIKE', '%'.$request->search.'%'],
            ])
            ->get();
            if ($thongbao) {
                # code...
                $i = 1;
                foreach ($thongbao as $key => $value) {
                    # code...
                    $u = $i++;
                    $ahihi = ThongBaoFile::where('id_thongbaosv', $value->id)->get()->first();
                    if (!empty($ahihi)) {
                        # code...
                        $if = '<i class="fas fa-paperclip clickable-row" data-href="'.url('thong-bao/mail/da-gui').'",'. $value->id.'></i>';
                      }else {
                          # code...
                          $if = '';
                      }
                      if ($value->read_at === null) {
                          # code...
                          $readat = 'bachgorao';
                      }else{
                          $readat = '';
                      }
                    $output .= '
                    <tr class="'.$readat.'">
                    <td>
                        <div class="icheck-primary">
                        <input type="checkbox" name="checked[]" value="'.$value->id.'" id="check'.$u.'">
                        <label for="check'.$u.'"></label>
                        </div>
                    </td>
                <td class="mailbox-name clickable-row" data-href='.url('thong-bao/mail/da-gui', $value->id).'><b>'.$value->tieude.'</b></td>
                    <td class="mailbox-subject clickable-row" data-href='.url('thong-bao/mail/da-gui', $value->id).'><p>'. $value->tomtat .'</p>
                    </td>
                    <td class="mailbox-attachment clickable-row" data-href='.url('thong-bao/mail/da-gui', $value->id).'>'.$if.'</td>
                    <td class="mailbox-date clickable-row" data-href='.url('thong-bao/mail/da-gui', $value->id).'>'.$value->created_at->diffForHumans().'</td>
                    </tr>
                    <script>
  
                    jQuery(document).ready(function($) {
                        $(".clickable-row").click(function() {
                            window.location = $(this).data("href");
                        });
                    });
                    </script>';
                }
            }
            return response($output);
        }else {
            # code...
            return redirect()->back(); 

        }
    }
    public function searchmailsent(Request $request)
    {
        # code...
        if ($request->ajax()) {
            # code...
            
            $output = '';
            $thongbao = ThongBao::where([
                ['id_sinhvien', Auth::guard('sinh_vien')->id()], 
                ['xoa', 1],
                ['tieude', 'LIKE', '%'.$request->search.'%'],
            ])
            ->orWhere([
                ['id_sinhvien', Auth::guard('sinh_vien')->id()], 
                ['xoa', 1],
                ['tomtat', 'LIKE', '%'.$request->search.'%'],
            ])
            ->get();
            if ($thongbao) {
                # code...
                $i = 1;
                foreach ($thongbao as $key => $value) {
                    # code...
                    $u = $i++;
                    $ahihi = ThongBaoFile::where('id_thongbao', $value->id)->get()->first();
                    if (!empty($ahihi)) {
                        # code...
                        $if = '<i class="fas fa-paperclip clickable-row" data-href="'.url('thong-bao/mail/da-gui').'",'. $value->id.'></i>';
                      }else {
                          # code...
                          $if = '';
                      }
                    $output .= '
                    <tr>
                    <td>
                        <div class="icheck-primary">
                        <input type="checkbox" name="checked[]" value="'.$value->id.'" id="check'.$u.'">
                        <label for="check'.$u.'"></label>
                        </div>
                    </td>
                <td class="mailbox-name clickable-row" data-href='.url('thong-bao/mail/da-gui', $value->id).'><b>'.$value->tieude.'</b></td>
                    <td class="mailbox-subject clickable-row" data-href='.url('thong-bao/mail/da-gui', $value->id).'><p>'. $value->tomtat .'</p>
                    </td>
                    <td class="mailbox-attachment clickable-row" data-href='.url('thong-bao/mail/da-gui', $value->id).'>'.$if.'</td>
                    <td class="mailbox-date clickable-row" data-href='.url('thong-bao/mail/da-gui', $value->id).'>'.$value->created_at->diffForHumans().'</td>
                    </tr>
                    <script>
  
                    jQuery(document).ready(function($) {
                        $(".clickable-row").click(function() {
                            window.location = $(this).data("href");
                        });
                    });
                    </script>';
                }
            }
            return response($output);
        }else {
            # code...
            return redirect()->back(); 

        }
    }
    public function mailsentread($id)
    {
        # code...
        $thongbao = ThongBao::where([['id', $id], ['id_sinhvien', Auth::guard('sinh_vien')->id()], ['xoa', 1]])->get()->first();
        if ($thongbao) {
            # code...
            $file = ThongBaoFile::where('id_thongbao', $id)->get();
            return view('page.view.sinhvien.view.Mail.mailsentread', ['thongbao' => $thongbao, 'file' => $file]);
        }else{
            return redirect('thong-bao/da-gui')->with('loi', 'Thư không tồn tại hoặc có thể nằm trong thùng rác');
        }
        
    }
    public function trash(){
     
        $lenhxoa = ThongBao::where('xoa', 2)->get();
            foreach ($lenhxoa as $value) {
                # code...
                $del = Carbon::now()->diffInMonths($value->updated_at);
                if ($del == 1) {
                    # code...
                    $value->delete();
                }
            }

            $trash = ThongBao::where([
                ['id_sinhvien', Auth::guard('sinh_vien')->id()],
                ['xoa', 2],
                ])->orderBy('created_at', 'desc')->paginate(5);
        return view('page.view.sinhvien.view.Mail.thungrac', ['trash' => $trash]);    
    }
    public function posttrash(Request $request)
    {
        # code...
        $checked = $request->input('checked',[]);
        if ($checked != 'on' > 0)  {
            # code...
            $lenhxoa = ThongBao::where('xoa', 2)->get();
            foreach ($lenhxoa as $value) {
                # code...
                $del = Carbon::now()->diffInMonths($value->updated_at);
                if ($del == 1) {
                    # code...
                    $deletefile = ThongBaoFile::where('id_thongbao', $value->id)->get();
                    $id_sinhvien = Auth::guard('sinh_vien')->id();
                    if (Auth::guard('sinh_vien')->id() < 10) {
                        # code...
                        $id_sinhvien = '0'.Auth::guard('sinh_vien')->id();
                    }else {
                        # code...
                        $id_sinhvien = Auth::guard('sinh_vien')->id();
                    }

                    
                        if (!ThongBaoFile::where('id_thongbao', $value->id)->exists()) {
                            # code...
                            File::deleteDirectory('FileMail/ToQL/'.$id_sinhvien);
                        }else {
                            foreach ($deletefile as $item) {
                                # code...
                                
                                if (file_exists('FileMail/ToQL/'.$id_sinhvien.'/'.$item->filename)) {
                                    # code...
                                    File::delete('FileMail/ToQL/'.$id_sinhvien.'/'.$item->filename);
                                    $item->delete();
                                }
                            }
                    }
                    $value->delete();
                }
            }
            if ($request->has('delete')) {
                $thongbao = ThongBao::whereIn("id", $checked)->get();
                foreach ($thongbao as $value) {
                    # code...
                    $deletefile = ThongBaoFile::where('id_thongbao', $value->id)->get();
                    $id_sinhvien = Auth::guard('sinh_vien')->id();
                    if (Auth::guard('sinh_vien')->id() < 10) {
                        # code...
                        $id_sinhvien = '0'.Auth::guard('sinh_vien')->id();
                    }else {
                        # code...
                        $id_sinhvien = Auth::guard('sinh_vien')->id();
                    }
                        if (!ThongBaoFile::where('id_thongbao', $value->id)->exists()) {
                            # code...
                            echo 'yes';
                            File::deleteDirectory('FileMail/ToQL/'.$id_sinhvien);
                        }else {
                            foreach ($deletefile as $item) {
                                if (file_exists('FileMail/ToQL/'.$id_sinhvien.'/'.$item->filename)) {
                                    # code...
                                    File::delete('FileMail/ToQL/'.$id_sinhvien.'/'.$item->filename);
                                    $item->delete();
                                }
                            }
                    }
                    $value->delete();
                }
                return redirect('thong-bao/thung-rac')->with('update', 'Đã xóa');

            }elseif ($request->has('update')) {
                # code...
                $thongbao = ThongBao::whereIn("id", $checked)->update(['xoa' => 1]);
                return redirect('thong-bao/thung-rac')->with('update', 'Đã khôi phục');

            }
           
        }else {
            # code...
            return redirect('thong-bao/thung-rac')->with('loi', 'Chọn ít nhất một một hộp thư để xóa');

        }
        
    }
    public function discard()
    {
        # code...
        $nhap = ThongBao::where([['id_sinhvien', Auth::guard('sinh_vien')->id()],['xoa', 0]])->orderBy('created_at', 'desc')->paginate(5);
        return view('page.view.sinhvien.view.Mail.bannhap', compact('nhap'));
    }
    public function xoadiscard(Request $request)
    {
        # code...
        $checked = $request->input('checked',[]);
        if ($checked != 'on' > 0)  {
            # code...
            $thongbao = ThongBao::whereIn("id", $checked)->get();
            foreach ($thongbao as $value) {
                # code...
                $deletefile = ThongBaoFile::where('id_thongbao', $value->id)->get();
                $id_sinhvien = Auth::guard('sinh_vien')->id();
                if (Auth::guard('sinh_vien')->id() < 10) {
                    # code...
                    $id_sinhvien = '0'.Auth::guard('sinh_vien')->id();
                }else {
                    # code...
                    $id_sinhvien = Auth::guard('sinh_vien')->id();
                }
                    if (!ThongBaoFile::where('id_thongbao', $value->id)->exists()) {
                        # code...
                        echo 'yes';
                        File::deleteDirectory('FileMail/ToQL/'.$id_sinhvien);
                    }else {
                        foreach ($deletefile as $item) {
                            if (file_exists('FileMail/ToQL/'.$id_sinhvien.'/'.$item->filename)) {
                                # code...
                                File::delete('FileMail/ToQL/'.$id_sinhvien.'/'.$item->filename);
                                $item->delete();
                            }
                        }
                }
                $value->delete();
            }
            $lenhxoa = ThongBao::where('xoa', 2)->get();
                foreach ($lenhxoa as $value) {
                    # code...
                    $del = Carbon::now()->diffInMonths($value->updated_at);
                    if ($del == 1) {
                        # code...
                        $value->delete();
                    }
                }
            return redirect('thong-bao/ban-nhap')->with('success', 'Xóa thành công');
        }else {
            # code...
            return redirect('thong-bao/ban-nhap')->with('loi', 'Chọn ít nhất một một hộp thư để xóa');

        }
        
    }
    public function suadiscard($id)
    {
        # code...
        $discard = ThongBao::where([['id', $id], ['xoa', 0], ['id_sinhvien', Auth::guard('sinh_vien')->id()]])->get()->first();
        if ($discard) {
            # code...
            $file = ThongBaoFile::where('id_thongbao', $id)->get();
            return view('page.view.sinhvien.view.Mail.nhaptogui', ['sua' => $discard, 'file' => $file]);
        }else {
            # code...
            return redirect('thong-bao/ban-nhap')->with('loi', 'Không thể sửa bản nháp này');
        }
        
    }

    public function filediscarddelete(Request $request, $id)
    {
        # code...
        if ($request->ajax()) {
            # code...
            $output = '';
            $file = ThongBaoFile::where('id', $id)->get()->first();
            if (Auth::guard('sinh_vien')->id() < 10) {
                    # code...
                    $id_sinhvien = '0'.Auth::guard('sinh_vien')->id();
                }else {
                    # code...
                    $id_sinhvien = Auth::guard('sinh_vien')->id();
                }
            File::delete('FileMail/ToQL/'.$id_sinhvien.'/'.$file->filename);
            $file->delete();
            if ($file) {
                # code...
                $output .= 'Đã Xóa';

            }
            
            return response($output);
        }else {
            # code...
            return redirect()->back();
        }
    
    }
    public function download($id)
    {
        # code...
        $file = ThongBaoFile::find($id);
        if ($file) {
            # code...
                $id_thongbaosv = ThongBaoSV::where('id', $file->id_thongbaosv)->get()->first();
                if ($id_thongbaosv->id_quanly < 10) {
                    # code...
                    $id_sinhvien = '0'.$id_thongbaosv->id_quanly;
                }else {
                    $id_sinhvien = $id_thongbaosv->id_quanly;
                }
                $path = 'FileMail/ToSV/'.$id_sinhvien.'/'.$file->filename;
                return response()->download($path, $file->filename, ['Content-Type' => $file->id]);
            
        }else {
            # code...
            return redirect()->back();
    }
    }
}

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
use App\Mail\NofitoSV;
use Illuminate\Support\Facades\Storage;
class ThongBaoController extends Controller
{
    //
    public function mailbox()
    {
        # code...
        $nofi = ThongBao::orderBy('created_at', 'desc')->paginate(5);
        return view('quan-ly.view.Mail.index', ['nofi' => $nofi]);
    }
    public function readnofi($id)
    {
        # code...
        
        $thongbao = ThongBao::find($id);
        
        if ($thongbao) {
            # code...
            $thongbao->read_at = Carbon::now();
            $thongbao->save();
            $file = ThongBaoFile::where('id_thongbao', $id)->get();
            return view('quan-ly.view.Mail.mailread', ['thongbao' => $thongbao, 'file' => $file]);
        }else {
            # code...
            return redirect('thong-bao');
        }
    }
    public function mailsend()
    {
        # code...
        return view('quan-ly.view.Mail.sendmail');
    }
    public function postmailsend(Request $request)
    {
        # code...
        $this->validate($request, 
            [
                'tieude' => 'bail|between:5,100',
                'email' => 'bail|between:10,255|ends_with:@vku.udn.vn',
                'noidung' => 'bail|required|min:30',
            ],
            [
                'tieude.between' => 'Vui lòng nhâp tiêu đề lớn hơn 5 chữ và bé hơn 255 chữ',
                'email.between' => 'Vui lòng nhập đúng email',
                'email.ends_with' => 'Vui lòng nhập đúng email của trường',
                'noidung.required' => 'Vui lòng nhập nội dung',
                'noidung.min' => 'Nội dung phải lớn hơn 30 chữ',
            ]
        );
        if ($request->has('discard')) {
            # code...
            $idsvtomail = SinhVien::where('email', $request->email)->get()->first();
            $phananh = new ThongBaoSV();
            $phananh->id_sinhvien = $idsvtomail->id;
            $phananh->id_quanly = Auth::id();
            $phananh->tieude = $request->tieude;
            $phananh->noidung = $request->noidung;
            $phananh->tomtat = $request->tomtat;
            $phananh->xoa = 0;
            $phananh->save();

            if ($request->hasFile('files')) {
                # code...
                $file = $request->file('files');
                
                if (Auth::id() < 10) {
                    # code...
                    $folderSV = '0'.Auth::id();

                }else {$folderSV = Auth::id();}
                foreach ($file as $value) {
                    # code...
                    $filename = $value->getClientOriginalName();
                    $name = Str::random(5).'-'.$filename;
                    while (file_exists('FileMail/ToSV/'.$folderSV.'/'.$name)) {
                        # code...
                        $name = Str::random(5).'-'.$filename;
                    }

                    $value->move('FileMail/ToSV/'.$folderSV, $name);

                    $fileinsert = new ThongBaoFile();
                    $fileinsert->filename = $name;
                    $fileinsert->id_thongbaosv = $phananh->id;
                    $fileinsert->save();
                }

            }
            return redirect('quan-ly/thong-bao/ban-nhap');
        }elseif($request->has('send')){
            $idsvtomail = SinhVien::where('email', $request->email)->get()->first();
            $phananh = new ThongBaoSV();
            $phananh->id_sinhvien = $idsvtomail->id;
            $phananh->id_quanly = Auth::id();
            $phananh->tieude = $request->tieude;
            $phananh->noidung = $request->noidung;
            $phananh->tomtat = $request->tomtat;
            $phananh->xoa = 1;
            $phananh->save();


            if ($request->hasFile('files')) {
                # code...
                $file = $request->file('files');
                
                if (Auth::id() < 10) {
                    # code...
                    $folderSV = '0'.Auth::id();

                }else {$folderSV = Auth::id();}
                foreach ($file as $value) {
                    # code...
                    $filename = $value->getClientOriginalName();
                    $name = Str::random(5).'-'.$filename;
                    while (file_exists('FileMail/ToSV/'.$folderSV.'/'.$name)) {
                        # code...
                        $name = Str::random(5).'-'.$filename;
                    }

                    $value->move('FileMail/ToSV/'.$folderSV, $name);

                    $fileinsert = new ThongBaoFile();
                    $fileinsert->filename = $name;
                    $fileinsert->id_thongbaosv = $phananh->id;
                    $fileinsert->save();
                }

            }
            if (Auth::id() < 10) {
                # code...
                $id_folder = '0'.Auth::id();
            }else {
                # code...
                $id_folder = Auth::id();
            }
            $attachment  = ThongBaoFile::where('id_thongbaosv', $phananh->id)->get();
        
            Mail::to($request->email)->send(new NofitoSV($phananh, $attachment, $id_folder));

            return redirect('quan-ly/thong-bao/da-gui');
        }
    }
    public function sent()
    {
        # code...
        $sent = ThongBaoSV::where([['id_quanly', Auth::id()], ['xoa', 1]])->orderBy('created_at', 'desc')->paginate(5);

        if ($sent) {
            # code...
         return view('quan-ly.view.Mail.sent', ['sent' => $sent]);

        }else {
            # code...
            return redirect()->back();
        }
    }
    public function xoasent(Request $request)
    {
        # code...
        $checked = $request->input('checked',[]);
        if ($checked != 'on' > 0)  {
            # code...
            $thongbao = ThongBaoSV::whereIn("id", $checked)->update(['xoa' => 2]);
            $lenhxoa = ThongBaoSV::where('xoa', 2)->get();
                foreach ($lenhxoa as $value) {
                    # code...
                    $del = Carbon::now()->diffInMonths($value->updated_at);
                    if ($del == 1) {
                        # code...
                        $value->delete();
                    }
                }
            return redirect('quan-ly/thong-bao/da-gui')->with('success', 'Đã di chuyển vào thùng rác');
        }else {
            # code...
            return redirect('quan-ly/thong-bao/da-gui')->with('loi', 'Chọn ít nhất một một hộp thư để xóa');

        }
        
    }
    public function xoasentwid($id)
    {
        # code...
        $thongbao = ThongBaoSV::where([['id', $id], ['id_quanly', Auth::id()]])->first();
        if ($thongbao) {
            # code...
            $thongbao->xoa = 2;
            $thongbao->save();
            return redirect('quan-ly/thong-bao/thung-rac')->with('update', 'Đã di chuyển vào thùng rác');
        }else {
            # code...
            return redirect('quan-ly/thong-bao/thung-rac')->with('loi', 'Không thể xóa');
        }
        
        
    }
    public function searchmailsent(Request $request)
    {
        # code...
        if ($request->ajax()) {
            # code...
            
            $output = '';
            $thongbao = ThongBaoSV::where([
                ['xoa', 1],
                ['tieude', 'LIKE', '%'.$request->search.'%'],
            ])
            ->orWhere([
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
                        $if = '<i class="fas fa-paperclip clickable-row" data-href="'.url('quan-ly/thong-bao/mail/da-gui').'",'. $value->id.'></i>';
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
                    <td class="mail-rateing">
                    '.$value->sinhvien->email.'
                </td>
                <td class="mailbox-name clickable-row" data-href='.url('quan-ly/thong-bao/mail/da-gui', $value->id).'><b>'.$value->tieude.'</b></td>
                    <td class="mailbox-subject clickable-row" data-href='.url('quan-ly/thong-bao/mail/da-gui', $value->id).'><p>'. $value->tomtat .'</p>
                    </td>
                    <td class="mailbox-attachment clickable-row" data-href='.url('quan-ly/thong-bao/mail/da-gui', $value->id).'>'.$if.'</td>
                    <td class="mailbox-date clickable-row" data-href='.url('quan-ly/thong-bao/mail/da-gui', $value->id).'>'.$value->created_at->diffForHumans().'</td>
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
            return Response($output);
        }else{
            return redirect()->back(); 
        }
    }
    public function searchmailsentwemail(Request $request)
    {
        # code...
        if ($request->ajax()) {
            $output = '';
            $emailsinhvien = SinhVien::where('email', 'LIKE', '%'.$request->searchemail.'%')->get()->first();
            if ($emailsinhvien) {
            # code...
            $id_sinhvien = $emailsinhvien->id;
            $thongbaone = ThongBaoSV::where('id_sinhvien', $id_sinhvien)->get();
            $i = 1;
            foreach ($thongbaone as $item) {
                # code...
                $u = $i++;
                
                $ahihi = ThongBaoFile::where('id_thongbaosv', $item->id)->get()->first();
                if (!empty($ahihi)) {
                    # code...
                    $if = '<i class="fas fa-paperclip clickable-row" data-href="'.url('quan-ly/thong-bao/mail/da-gui').'",'. $item->id.'></i>';
                  }else {
                      # code...
                      $if = '';
                  }
                  if ($item->read_at === null) {
                      # code...
                      $readat = 'bachgorao';
                  }else{
                      $readat = '';
                  }
                $output .= '
                <tr class="'.$readat.'">
                <td>
                    <div class="icheck-primary">
                    <input type="checkbox" name="checked[]" value="'.$item->id.'" id="check'.$u.'">
                    <label for="check'.$u.'"></label>
                    </div>
                </td>
                <td class="mail-rateing">
                '.$item->sinhvien->email.'
            </td>
            <td class="mailbox-name clickable-row" data-href='.url('quan-ly/thong-bao/mail/da-gui', $item->id).'><b>'.$item->tieude.'</b></td>
                <td class="mailbox-subject clickable-row" data-href='.url('quan-ly/thong-bao/mail/da-gui', $item->id).'><p>'. $item->tomtat .'</p>
                </td>
                <td class="mailbox-attachment clickable-row" data-href='.url('quan-ly/thong-bao/mail/da-gui', $item->id).'>'.$if.'</td>
                <td class="mailbox-date clickable-row" data-href='.url('quan-ly/thong-bao/mail/da-gui', $item->id).'>'.$item->created_at->diffForHumans().'</td>
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
    }else{
        return redirect()->back(); 
    }
    }
    public function searchmailwemail(Request $request)
    {
        # code...
        if ($request->ajax()) {
            $output = '';
            $emailsinhvien = SinhVien::where('email', 'LIKE', '%'.$request->searchemail.'%')->get()->first();
            if ($emailsinhvien) {
            # code...
            $id_sinhvien = $emailsinhvien->id;
            $thongbaone = ThongBao::where('id_sinhvien', $id_sinhvien)->get();
            $i = 1;
            foreach ($thongbaone as $item) {
                # code...
                $u = $i++;
                
                $ahihi = ThongBaoFile::where('id_thongbao', $item->id)->get()->first();
                if (!empty($ahihi)) {
                    # code...
                    $if = '<i class="fas fa-paperclip clickable-row" data-href="'.url('quan-ly/thong-bao/doc').'",'. $item->id.'></i>';
                  }else {
                      # code...
                      $if = '';
                  }
                  if ($item->read_at === null) {
                      # code...
                      $readat = 'bachgorao';
                  }else{
                      $readat = '';
                  }
                $output .= '
                <tr class="'.$readat.'">
                <td>
                    <div class="icheck-primary">
                    <input type="checkbox" name="checked[]" value="'.$item->id.'" id="check'.$u.'">
                    <label for="check'.$u.'"></label>
                    </div>
                </td>
                <td class="mail-rateing">
                '.$item->sinhvien->email.'
            </td>
            <td class="mailbox-name clickable-row" data-href='.url('quan-ly/thong-bao/doc', $item->id).'><b>'.$item->tieude.'</b></td>
                <td class="mailbox-subject clickable-row" data-href='.url('quan-ly/thong-bao/doc', $item->id).'><p>'. $item->tomtat .'</p>
                </td>
                <td class="mailbox-attachment clickable-row" data-href='.url('quan-ly/thong-bao/doc', $item->id).'>'.$if.'</td>
                <td class="mailbox-date clickable-row" data-href='.url('quan-ly/thong-bao/doc', $item->id).'>'.$item->created_at->diffForHumans().'</td>
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
    }else{
        return redirect()->back(); 
    }

    }
    public function searchmail(Request $request)
    {
        # code...
        if ($request->ajax()) {
            # code...
            
            $output = '';
            $thongbao = ThongBao::where([
                ['xoa', 1],
                ['tieude', 'LIKE', '%'.$request->search.'%'],
            ])
            ->orWhere([
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
                        $if = '<i class="fas fa-paperclip clickable-row" data-href="'.url('quan-ly/thong-bao/doc').'",'. $value->id.'></i>';
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
                    <td class="mail-rateing">
                    '.$value->sinhvien->email.'
                </td>
                <td class="mailbox-name clickable-row" data-href='.url('quan-ly/thong-bao/doc', $value->id).'><b>'.$value->tieude.'</b></td>
                    <td class="mailbox-subject clickable-row" data-href='.url('quan-ly/thong-bao/doc', $value->id).'><p>'. $value->tomtat .'</p>
                    </td>
                    <td class="mailbox-attachment clickable-row" data-href='.url('quan-ly/thong-bao/doc', $value->id).'>'.$if.'</td>
                    <td class="mailbox-date clickable-row" data-href='.url('quan-ly/thong-bao/doc', $value->id).'>'.$value->created_at->diffForHumans().'</td>
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
            return Response($output);
        }else{
            return redirect()->back(); 
        }
    }
    public function mailsentread($id)
    {
        # code...
        $thongbao = ThongBaoSV::where([['id', $id], ['id_quanly', Auth::id()], ['xoa', 1]])->get()->first();
        if ($thongbao) {
            # code...
            $file = ThongBaoFile::where('id_thongbaosv', $id)->get();
            return view('quan-ly.view.Mail.mailsentread', ['thongbao' => $thongbao, 'file' => $file]);
        }else{
            return redirect('quan-ly/thong-bao/da-gui')->with('loi', 'Thư không tồn tại hoặc có thể nằm trong thùng rác');
        }
        
    }
    public function trash(){
     
        $lenhxoa = ThongBaoSV::where('xoa', 2)->get();
            foreach ($lenhxoa as $value) {
                # code...
                $del = Carbon::now()->diffInMonths($value->updated_at);
                if ($del == 1) {
                    # code...
                    $value->delete();
                }
            }

            $trash = ThongBaoSV::where([
                ['id_quanly', Auth::id()],
                ['xoa', 2],
                ])->orderBy('created_at', 'desc')->paginate(5);
        return view('quan-ly.view.Mail.thungrac', ['trash' => $trash]);    
    }
    public function posttrash(Request $request)
    {
        # code...
        $checked = $request->input('checked',[]);
        if ($checked != 'on' > 0)  {
            # code...
            $lenhxoa = ThongBaoSV::where('xoa', 2)->get();
            foreach ($lenhxoa as $value) {
                # code...
                $del = Carbon::now()->diffInMonths($value->updated_at);
                if ($del == 1) {
                    # code...
                    $deletefile = ThongBaoFile::where('id_thongbaosv', $value->id)->get();
                    $id_sinhvien = Auth::id();
                    if (Auth::id() < 10) {
                        # code...
                        $id_sinhvien = '0'.Auth::id();
                    }else {
                        # code...
                        $id_sinhvien = Auth::id();
                    }

                    
                        if (!ThongBaoFile::where('id_thongbaosv', $value->id)->exists()) {
                            # code...
                            File::deleteDirectory('FileMail/ToSV/'.$id_sinhvien);
                        }else {
                            foreach ($deletefile as $item) {
                                # code...
                                
                                if (file_exists('FileMail/ToSV/'.$id_sinhvien.'/'.$item->filename)) {
                                    # code...
                                    File::delete('FileMail/ToSV/'.$id_sinhvien.'/'.$item->filename);
                                }
                                $item->delete();

                            }
                    }
                    $value->delete();
                }
            }
            if ($request->has('delete')) {
                $thongbao = ThongBaoSV::whereIn("id", $checked)->get();
                foreach ($thongbao as $value) {
                    # code...
                    $deletefile = ThongBaoFile::where('id_thongbaosv', $value->id)->get();
                    $id_sinhvien = Auth::id();
                    if (Auth::id() < 10) {
                        # code...
                        $id_sinhvien = '0'.Auth::id();
                    }else {
                        # code...
                        $id_sinhvien = Auth::id();
                    }
                        if (!ThongBaoFile::where('id_thongbaosv', $value->id)->exists()) {
                            # code...
                            File::deleteDirectory('FileMail/ToSV/'.$id_sinhvien);
                            echo "done";
                        }else {
                            foreach ($deletefile as $item) {
                                if (file_exists('FileMail/ToSV/'.$id_sinhvien.'/'.$item->filename)) {
                                    # code...
                                    File::delete('FileMail/ToSV/'.$id_sinhvien.'/'.$item->filename);
                                }
                                echo 'ok<br>';
                                $item->delete();

                            }
                    }
                    $value->delete();
                }
                return redirect('quan-ly/thong-bao/thung-rac')->with('update', 'Đã xóa');

            }elseif ($request->has('update')) {
                # code...
                $thongbao = ThongBaoSV::whereIn("id", $checked)->update(['xoa' => 1]);
                return redirect('quan-ly/thong-bao/thung-rac')->with('update', 'Đã khôi phục');
            }
           
        }else {
            # code...
            return redirect('quan-ly/thong-bao/thung-rac')->with('loi', 'Chọn ít nhất một một hộp thư để xóa');

        }
        
    }
    public function discard()
    {
        # code...
        $nhap = ThongBaoSV::where([['id_quanly', Auth::id()],['xoa', 0]])->orderBy('created_at', 'desc')->paginate(5);
        
        return view('quan-ly.view.Mail.bannhap', compact('nhap'));
    }
    public function xoadiscard(Request $request)
    {
        # code...
        $checked = $request->input('checked',[]);
        if ($checked != 'on' > 0)  {
            # code...
            $thongbao = ThongBaoSV::whereIn("id", $checked)->get();
            foreach ($thongbao as $value) {
                # code...
                $deletefile = ThongBaoFile::where('id_thongbaosv', $value->id)->get();
                $id_sinhvien = Auth::id();
                if (Auth::id() < 10) {
                    # code...
                    $id_sinhvien = '0'.Auth::id();
                }else {
                    # code...
                    $id_sinhvien = Auth::id();
                }
                    if (!ThongBaoFile::where('id_thongbao', $value->id)->exists()) {
                        # code...
                        echo 'yes';
                        File::deleteDirectory('FileMail/ToSV/'.$id_sinhvien);
                    }else {
                        foreach ($deletefile as $item) {
                            if (file_exists('FileMail/ToSV/'.$id_sinhvien.'/'.$item->filename)) {
                                # code...
                                File::delete('FileMail/ToSV/'.$id_sinhvien.'/'.$item->filename);
                                $item->delete();
                            }
                        }
                }
                $value->delete();
            }
            $lenhxoa = ThongBaoSV::where('xoa', 2)->get();
                foreach ($lenhxoa as $value) {
                    # code...
                    $del = Carbon::now()->diffInMonths($value->updated_at);
                    if ($del == 1) {
                        # code...
                        $value->delete();
                    }
                }
            return redirect('quan-ly/thong-bao/ban-nhap')->with('success', 'Xóa thành công');
        }else {
            # code...
            return redirect('quan-ly/thong-bao/ban-nhap')->with('loi', 'Chọn ít nhất một một hộp thư để xóa');

        }
        
    }
    public function suadiscard($id)
    {
        # code...
        $discard = ThongBaoSV::where([['id', $id], ['xoa', 0], ['id_quanly', Auth::id()]])->get()->first();
        if ($discard) {
            # code...
            $file = ThongBaoFile::where('id_thongbaosv', $id)->get();
            return view('quan-ly.view.Mail.nhaptogui', ['sua' => $discard, 'file' => $file]);
        }else {
            # code...
            return redirect('quan-ly/thong-bao/ban-nhap')->with('loi', 'Không thể sửa bản nháp này');
        }
        
    }

    public function filediscarddelete(Request $request, $id)
    {
        # code...
        if ($request->ajax()) {
            # code...
            $output = '';
            $file = ThongBaoFile::where('id', $id)->get()->first();
            if (Auth::id() < 10) {
                    # code...
                    $id_sinhvien = '0'.Auth::id();
                }else {
                    # code...
                    $id_sinhvien = Auth::id();
                }
            File::delete('FileMail/ToSV/'.$id_sinhvien.'/'.$file->filename);
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
            $id_a = $file->thongbao->sinhvien->id;
            if ($id_a < 10) {
                # code...
                $id_sinhvien = '0'.$id_a;
            }else {
                # code...
                $id_sinhvien = $id_a;
            }
                $path = 'FileMail/ToQL/'.$id_sinhvien.'/'.$file->filename;
                return response()->download($path, $file->filename, ['Content-Type' => $file->id]);

        }else {
            # code...
            return redirect()->back();
        }
    }

    public function realtime(Request $request)
    {
        # code...
        // if ($request->ajax()) {
            # code...
            $output = '';
            $thongbao = ThongBao::where('xoa', 1)->count();
            if ($thongbao) {
                # code...
                $output .= 'Thông báo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                '.$thongbao;
                echo $output;
                return responsse($output);
            }
        // }else{
        //     return redirect()->back();
        // }
    }
    function __construct()
    {
        # code...
        $page = Page::find(1);
        // $pageoff = $page->status
        View::share('pageoff', $page);
    }
}

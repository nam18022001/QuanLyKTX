@extends('quan-ly.layout.master')
@section('title')
    Quản Lý Phòng Nam
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.semanticui.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.semanticui.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<style>
    table{
        font-family:Verdana;
        
    }
    .ui.table thead th{
        cursor:auto;
        background:#3eff64
        ;text-align:inherit;
        color:rgba(218, 14, 14, 0.87)
    ;}
    .ui.menu{
        background: rgba(255, 255, 255, 0.673);
    font-weight: 400;
    border: 1px solid rgb(0, 0, 0);
    }
    .ui.pagination.menu .active.item {
    border-top: none;
    padding-top: .92857143em;
    background-color: rgb(223, 223, 223);
    color: rgba(255, 255, 255, 0.646);
    -webkit-box-shadow: none;
    box-shadow: none;
}
</style>
@endsection
@section('content')
<h1>
  {{$phong->phong->tang->tang}} / <small>{{$phong->phong->phong}}</small>
</h1>
<table id="example" class="ui celled table" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Lớp</th>
            <th>MSSV</th>
            <th>CMND</th>
            <th>Quê Quán</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Giường</th>
            <th>Chức vụ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sinhvien as $value)
            @if ($value->hoatdong == 1)
            <tr>
                <td>{{$value->sinhvien->id}}</td>
                <td>{{$value->sinhvien->Ten}}</td>
                <td>{{$value->sinhvien->Lop}}</td>
                <td>{{$value->sinhvien->MSSV}}</td>
                <td>{{$value->sinhvien->CMND}}</td>
                <td>{{$value->sinhvien->QueQuan}}</td>
                <td>{{$value->sinhvien->Email}}</td>
                <td>{{$value->sinhvien->SDT}}</td>
                <td>{{$value->sinhvien->giuong->giuong}}</td>
                @if ($value->sinhvien->quyen == 1)
                <td>
                    Trưởng Tầng
                </td>
                    @elseif($value->sinhvien->quyen == 2)
                    <td>
                        Trưởng Phòng
                    </td>
                    @else
                    <td>
                        Không có
                    </td>
                @endif
            </tr>
            @endif
        @endforeach
    </tbody>

</table>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'print', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( $('div.eight.column:eq(0)', table.table().container()) );
} );
    </script>
@endsection
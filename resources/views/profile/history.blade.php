@extends('profile.masterprofile')

@section('content')
<div class="container">
    <h2 class="col-xs-12" style="text-align: center;">Trip History<hr></h2>

    {{--{{var_dump($trips)}}--}}
    <div class="col-xs-12">
        <table class="table" id="tabelhist">
            <thead>
                <tr>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Leader</th>
                    <th>Plan</th>
                </tr>
            </thead>
            <tbody>
            {{--UNCOMMENT KALAU SUDAH KONEK DB DAN CONTROLLER--}}
            @foreach($trips as $trip)
                <tr>
                    <td>{{$trip->mulai}}</td>
                    <td>{{$trip->selesai}}</td>
                    <td>{{$trip->nama}}</td>
                    <td>{{$trip->lokasikegiatan}}</td>
                    <td>{{$trip->leader}}</td>
                    <td><a href="/post/{{$trip->id}}" class="btn btn-default" role="button">Show</a></td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</div>
@endsection

@section('script')
<script src="/js/datatables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#tabelhist').DataTable();
    } );
</script>
@endsection
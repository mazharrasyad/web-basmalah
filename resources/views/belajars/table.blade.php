<table class="table table-responsive" id="belajars-table">
    <thead>
        <tr>
        <th>Kode</th>
        <th>Pengajar</th>
        <th>Pelajaran</th>
        <th>Hari</th>
        <th>Pukul</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($belajars as $belajar)
      @foreach($pengajars as $pengajar)
        @if($belajar->user_id == $pengajar->user_id)
        <tr>
            <td>{!! $belajar->kode !!}</td>
            <td>{!! $pengajar['nama_lengkap'] !!}</td>
            <td>{!! $belajar->pelajaran !!}</td>
            <td>{!! $belajar->hari !!}</td>
            <td>{!! $belajar->pukul !!}</td>
            <td>
              @if($belajar->status == "Pending")
                <font color="green">
              @elseif($belajar->status == "Aktif")
                <font color="blue">
              @else
                <font color="red">
              @endif
              <b>{!! $belajar->status !!}</b>
            </td>
            <td>
                {!! Form::open(['route' => ['belajars.destroy', $belajar->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('belajars.show', [$belajar->url]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('belajars.edit', [$belajar->url]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endif
      @endforeach
    @endforeach
    </tbody>
</table>

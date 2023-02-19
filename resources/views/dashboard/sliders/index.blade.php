@extends('layouts.app')
@section('title', 'Sliders')

@section('title-header', 'Sliders')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Sliders</li>
@endsection

@section('action_btn')
    <a href="{{route('sliders.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Sliders</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Desc</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sliders as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ str()->words($slider->desc ?? 'Tidak ada', 5, ' >>>') }}</td>
                                        <td>{{ $slider->order }}</td>
                                        @php
                                            $status = $slider->status;
                                            $badge = 'badge badge-primary';
                                            if($status == '0'){
                                                $badge = 'badge badge-danger';
                                            }
                                        @endphp
                                        <td>
                                            <span class="{{$badge}}">{{$status == 1 ? 'Aktif' : 'Non Aktif'}}</span>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/uploads/images/'.$slider->image) }}" alt="{{ $slider->title }}" width="100">
                                        </td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('sliders.edit', $slider->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $slider->id }}" action="{{ route('sliders.destroy', $slider->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$slider->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">
                                        {{ $sliders->links() }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteForm(id){
            Swal.fire({
                title: 'Hapus data',
                text: "Anda akan menghapus data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${id}`).submit()
                }
            }) 
        }
    </script>
@endsection
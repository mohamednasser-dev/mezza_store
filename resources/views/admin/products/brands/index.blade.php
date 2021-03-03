@extends('admin.app')

@section('title' , __('messages.brands'))

@section('content')
    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{ __('messages.brands')}}</h4>
                </div>
            </div>
            @if(Auth::user()->add_data)
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#creat_model">{{ __('messages.add_new_brand') }}</a>
                    </div>
                </div>
            @endif
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive">
                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">{{ __('messages.name') }}</th>
                            @if(Auth::user()->update_data)
                                <th class="text-center">{{ __('messages.edit') }}</th>
                            @endif
                            @if(Auth::user()->delete_data)
                            <th class="text-center" >{{ __('messages.delete') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                            @foreach ($data as $row)
                                <tr >
                                    <td class="text-center"><?=$i;?></td>
                                    <td class="text-center">{{ $row->title_ar }}</td>
                                    @if(Auth::user()->update_data)
                                        <td class="text-center blue-color" ><a id="edit" data-brand-id="{{$row->id}}" data-brand-title_ar="{{$row->title_ar}}" data-toggle="modal" data-target="#zoomupModal" ><i class="far fa-edit"></i></a></td>
                                    @endif
                                    @if(Auth::user()->delete_data)
                                    <!-- <td class="text-center blue-color" ><a href="{{ route('color.delete', $row->id) }}" ><i class="far fa-trash-al"></i></a></td -->
                                        <td class="text-center blue-color" ><a onclick="return confirm('{{ __('messages.are_you_sure') }}');" href="{{ route('brands.delete', $row->id) }}" ><i class="far fa-trash-alt"></i></a></td>
                                    @endif
                                    <?php $i++; ?>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--model--}}
        {{--send free balance for single user--}}
        <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('messages.update') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <form action="{{route('brands.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input required type="hidden" name="id" id="txt_id">
                            <div class="form-group mb-4">
                                <label for="plan_price">{{ __('messages.brand_name') }}</label>
                                <input required type="text" id="txt_title_ar" min="0" name="title_ar" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="creat_model" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('messages.add') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-4">
                                <label for="plan_price">{{ __('messages.brand_name') }}</label>
                                <input required type="text" maxlength="15" id="txt_title_ar" min="0" name="title_ar" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ __('messages.add') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
<script>
        var id;
        $(document).on('click', '#edit', function () {
            id = $(this).data('brand-id');
            title_ar = $(this).data('brand-title_ar');

            $('#txt_id').val(id);
            $('#txt_title_ar').val(title_ar);
        });
    </script>
@endsection


@extends('admin.app')

@section('title' , __('messages.order'))

@section('content')
        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{ __('messages.order') }}</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive">
                <table class="table table-bordered mb-4">
                    <tbody>
                        <tr>
                            <td class="label-table" > {{ __('messages.date') }}</td>
                            <td>
                                {{date('Y-m-d', strtotime($data->created_at))}}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.name') }}</td>
                            <td>
                                {{ $data->name }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.phone') }}</td>
                            <td>
                                {{ $data->phone }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.address') }} </td>
                            <td>
                                {{ $data->address }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.notes') }} </td>
                            <td>
                                {{ $data->notes }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.total_bill') }} </td>
                            <td>
                                <h5>{{ $data->OrderDetails->sum('total') }} {{ __('messages.egy_bound') }}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.status_order') }} </td>
                            <td>
                                @if($data->status == 'new')
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-dark btn-sm">{{ __('messages.new_order') }}</button>
                                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference5">
                                            <a class="dropdown-item" href="{{route('orders.change.status',['status'=> 'accept','id'=>$data->id])}}" style="color: #2196f3; text-align: center;">{{ __('messages.accept_order') }}</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('orders.change.status',['status'=> 'execution','id'=>$data->id])}}" style="color: #f5b455; text-align: center;">{{ __('messages.make_it') }}</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('orders.change.status',['status'=> 'arrived','id'=>$data->id])}}" style="color: green; text-align: center;">{{ __('messages.arrived') }}</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('orders.change.status',['status'=> 'rejected','id'=>$data->id])}}" style="color: red; text-align: center;">{{ __('messages.reject') }}</a>
                                        </div>
                                    </div>
                                @elseif($data->status == 'accept')
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm">{{ __('messages.accept_order') }}</button>
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference5">
                                            <a class="dropdown-item" href="{{route('orders.change.status',['status'=> 'execution','id'=>$data->id])}}" style="color: #f5b455; text-align: center;">{{ __('messages.make_it') }}</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('orders.change.status',['status'=> 'arrived','id'=>$data->id])}}" style="color: green; text-align: center;">{{ __('messages.arrived') }}</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('orders.change.status',['status'=> 'rejected','id'=>$data->id])}}" style="color: red; text-align: center;">{{ __('messages.reject') }}</a>
                                        </div>
                                    </div>
                                @elseif($data->status == 'execution')
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning btn-sm">{{ __('messages.make_it') }}</button>
                                        <button type="button" class="btn btn-warning btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference5">
                                            <a class="dropdown-item" href="{{route('orders.change.status',['status'=> 'arrived','id'=>$data->id])}}" style="color: green; text-align: center;">{{ __('messages.arrived') }}</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('orders.change.status',['status'=> 'rejected','id'=>$data->id])}}" style="color: red; text-align: center;">{{ __('messages.reject') }}</a>
                                        </div>
                                    </div>
                                @elseif($data->status == 'arrived')
                                    <h5 style="color:green;">{{ __('messages.arrived') }}</h5>
                                @elseif($data->status == 'rejected')
                                    <h5 style="color:red;">{{ __('messages.rejected') }}</h5>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <label style="margin-top: 20px" for="">{{ __('messages.order_details') }}</label><br>
                <div class="row">
                    <div class="table-responsive">
                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center blue-color">Id</th>
                                    <th class="text-center blue-color">{{ __('messages.image') }}</th>
                                    <th class="text-center blue-color">{{ __('messages.product_name') }}</th>
                                    <th class="text-center blue-color">{{ __('messages.quantity') }}</th>
                                    <th class="text-center blue-color">{{ __('messages.price') }}</th>
                                    <th class="text-center blue-color">{{ __('messages.total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data->OrderDetails as $row)
                                <tr >
                                    <td class="text-center blue-color"><?=$i;?></td>
                                    <td class="text-center"><img style="height: 50px;" src="https://res.cloudinary.com/dwevccen7/image/upload/v1614430614/{{ $row->Product->main_image }}"  /></td>
                                    <td class="text-center blue-color">{{ $row->Product->title }}</td>
                                    <td class="text-center blue-color">{{ $row->quantity }}</td>
                                    <td class="text-center blue-color">{{ $row->price }}</td>
                                    <td class="text-center blue-color">{{ $row->total }}</td>
                                    <?php $i++; ?>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

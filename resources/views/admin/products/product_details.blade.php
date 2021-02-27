@extends('admin.app')

@section('title' , __('messages.product_details'))

@section('content')
        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{ __('messages.product_details') }}</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive">
                <table class="table table-bordered mb-4">
                    <tbody>
                        <tr>
                            <td class="label-table" > {{ __('messages.publication_date') }}</td>
                            <td>
                                @if( $data->publication_date != null)
                                    {{date('Y-m-d', strtotime($data->publication_date))}}
                                @else
                                    {{ __('messages.not_publish_yet') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.end_date') }}</td>
                            <td>
                                @if( $data->expiry_date != null)
                                    {{date('Y-m-d', strtotime($data->expiry_date))}}
                                @else
                                    {{ __('messages.expiered') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.product_name') }}</td>
                            <td>
                                {{ $data->title }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.category') }} </td>
                            <td>
                                {{ $data->category->title_ar }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.product_description') }} </td>
                            <td>
                                {{ $data->description }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.product_price') }} </td>
                            <td>
                                {{ $data->price }} {{ __('messages.dinar') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.brand') }}</td>
                            <td>
                                @if(app()->getLocale() == 'ar')
                                    {{ $data->Brand->title_ar }}
                                @else
                                    {{ $data->Brand->title_en }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > {{ __('messages.colors') }}</td>
                            <td>
                                @foreach($data->Colors as $row)
                                (
                                    @if(app()->getLocale() == 'ar')
                                        {{ $row->Color->title_ar }}
                                    @else
                                        {{ $row->Color->title_en }}
                                    @endif
                                )  
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                <label for="">{{ __('messages.main_image') }}</label><br>
                <div class="row">
                    <div class="col-md-2 product_image">
                        <img style="width: 100%" src="https://res.cloudinary.com/carsads/image/upload/w_100,q_100/v1581928924/{{ $data->main_image }}"  />
                    </div>
                </div>
                <label style="margin-top: 20px" for="">{{ __('messages.product_images') }}</label><br>
                <div class="row">
                    @foreach ($data->images as $image)
                        <div style="position : relative" class="col-md-2 product_image">
                            <img width="100%" src="https://res.cloudinary.com/carsads/image/upload/w_100,q_100/v1581928924/{{ $image->image }}"  />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

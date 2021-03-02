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
                            <td class="label-table" ><h6> {{ __('messages.publication_date') }}</h6></td>
                            <td>
                                @if( $data->publication_date != null)
                                    {{date('Y-m-d', strtotime($data->publication_date))}}
                                @else
                                    {{ __('messages.not_publish_yet') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > <h6>{{ __('messages.product_name') }}</h6></td>
                            <td>
                                {{ $data->title }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" ><h6> {{ __('messages.category') }} </h6></td>
                            <td>
                                {{ $data->category->title_ar }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" ><h6> {{ __('messages.product_description') }}</h6> </td>
                            <td>
                                {{ $data->description }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" > <h6>{{ __('messages.product_price') }} </h6></td>
                            <td>
                                {{ $data->price }} {{ __('messages.dinar') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" ><h6> {{ __('messages.brand') }}</h6></td>
                            <td>
                                @if(app()->getLocale() == 'ar')
                                    {{ $data->Brand_web->title_ar }}
                                @else
                                    {{ $data->Brand_web->title_en }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="label-table" ><h6> {{ __('messages.color') }}</h6></td>
                            <td>
                                (
                                    @if(app()->getLocale() == 'ar')
                                        {{ $data->Color->title_ar }}
                                    @else
                                    {{ $data->Color->title_en }}
                                    @endif
                                )
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h4>{{ __('messages.main_image') }}</h4><br>
                <div class="row">
                    <div class="col-md-2 product_image">
                        <img style="width: 100px" src="https://res.cloudinary.com/dwevccen7/image/upload/v1614430614/{{ $data->main_image }}"  />
                    </div>
                </div>
                <h4 style="margin-top: 20px" >{{ __('messages.product_images') }}</h4><br>
                <div class="row">
                    @foreach ($data->images as $image)
                        <div style="position : relative" class="col-md-2 product_image">
                            <img style="height: 70px;" src="https://res.cloudinary.com/dwevccen7/image/upload/v1614430614/{{ $image->image }}"  />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

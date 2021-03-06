@extends('layouts.app')

@section('title')
    @lang('user.label.add')
@endsection

@section('stylesheet')
@endsection

@section('subheader')
    <h3 class="kt-subheader__title">
        @lang('user.label.add')
    </h3>
    <span class="kt-subheader__separator kt-hidden"></span>
    <div class="kt-subheader__breadcrumbs">
        <a href="{{ route('home') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a class="kt-subheader__breadcrumbs-link">
            @lang('system.label.system')
        </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('client.index') }}" class="kt-subheader__breadcrumbs-link">
            Clientes
        </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('client.create') }}" class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
            Criar Cliente
        </a>
        <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
    </div>
@endsection

@section('subheader-toolbar')
@endsection

@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="fa fa-user-plus kt-font-brand"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Adicionar Cliente
{{--                    <small>try to scroll the page</small>--}}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <a href="{{ route('client.index') }}" class="btn btn-clean kt-margin-r-10">
                    <i class="la la-arrow-left"></i>
                    <span class="kt-hidden-mobile">@lang('system.button.back')</span>
                </a>
                <button form="formCadastrarCliente" type="submit" class="btn btn-success">
                    <i class="la la-check"></i>
                    <span class="kt-hidden-mobile">@lang('system.button.save')</span>
                </button>
            </div>
        </div>
        <div class="kt-portlet__body">

            @if(session('response'))
                <x-alert type="{{session('response.type')}}" message="{{session('response.message')}}"></x-alert>
            @endif

            <form id="formCadastrarCliente" action="{{route('client.store')}}" method="POST" class="kt-form">
                @csrf

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">

                        <div class="form-group row">
                            <label class="col-3 col-form-label">@lang('user.attribute.name')*</label>
                            <div class="col-9">
                                <input type="text" name="name" value="{{old('name')}}" placeholder="@lang('user.placeholder.name')"
                                       class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <span class="form-text text-muted">@lang('user.help.name')</span>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label class="col-3 col-form-label">Data de nascimento*</label>
                            <div class="col-lg-4">
                                <div class="input-group date">
                                    <input type="text" name="birth_date" value="{{old('birth_date')}}"
                                           class="input-border form-control kt_datepicker_1 @error('birth_date') is-invalid @enderror required"
                                           require
                                    >
                                    <div class="input-group-append">
                                    <span class="date-icon input-group-text">
                                        <i class="la la-calendar"></i>
                                    </span>
                                    </div>
                                    @error('birth_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Documento pessoal (CPF)*</label>
                            <div class="col-3">
                                <input type="text" name="personal_document" value="{{old('personal_document')}}"
                                       class="form-control client_cpf @error('personal_document') is-invalid @enderror">
                                @error('personal_document')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3 col-form-label">@lang('user.attribute.email')*</label>
                            <div class="col-9">
                                <input type="email" name="email" value="{{old('email')}}" placeholder="@lang('user.placeholder.email')"
                                       class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <span class="form-text text-muted">@lang('user.help.email')</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Endere??o*</label>
                            <div class="col-9">
                                <input type="text" name="address" value="{{old('address')}}"
                                       class="form-control @error('address') is-invalid @enderror">
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="kt-portlet__foot">
            <div class="row align-items-center">
                <div class="col-lg-6 m--valign-middle">

                </div>
                <div class="col-lg-6 kt-align-right">
                </div>
            </div>
        </div>
    </div>
    <!--end::Portlet-->
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#menu_item_cliente').addClass('kt-menu__item--active');
            $('.client_cpf').inputmask({mask: ['999.999.999-99'], keepStatic: true, removeMaskOnSubmit: true});
            KTBootstrapDatepicker.init();
        });

        let KTBootstrapDatepicker = function () {
            let arrows;
            if (KTUtil.isRTL()) {
                arrows = {
                    leftArrow: '<i class="la la-angle-right"></i>',
                    rightArrow: '<i class="la la-angle-left"></i>'
                }
            } else {
                arrows = {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            }

            // Private functions
            let demos = function () {
                // minimum setup
                $('.kt_datepicker_1').datepicker({
                    rtl: KTUtil.isRTL(),
                    todayHighlight: false,
                    orientation: "bottom left",
                    templates: arrows,
                    clearBtn: true,
                    language: 'pt-BR',
                    startDate: "01-01-1900"
                });
            };

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();
    </script>
@endsection

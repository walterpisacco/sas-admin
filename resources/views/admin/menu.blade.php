@extends('layouts.head')
@extends('layouts.footer')
@extends('layouts.menu-top')
@extends('admin.layouts.menu-left')

@section('content')
    <h1>@lang('Bienvenido')!!</h1>

        <div class="elementor-column col-md-2  anchoFijo" data-id="4e376a9" data-element_type="column">
        <div class="elementor-column-wrap elementor-element-populated">
            <div class="elementor-widget-wrap">
                <div
                    class="elementor-element elementor-element-4bcc813c elementor-widget elementor-widget-ha-flip-box happy-addon ha-flip-box happy-addon-pro"
                    data-id="4bcc813c"
                    data-element_type="widget"
                    data-widget_type="ha-flip-box.default">
                    <a href="{{route('centinela.menu')}}">
                    <div class="elementor-widget-container">
                        <div class="ha-flip-box-container ha-flip-effect-classic">
                            <div class="ha-flip-box-inner ha-flip-right">
                                <div class="ha-flip-box-inner-wrapper">
                                    <div class="ha-flip-box-front">
                                        <div class="ha-flip-box-front-inner">
                                            <div class="icon-wrap">
                                                <div class="ha-flip-icon">
                                                    <img
                                                        loading=""
                                                        width="650"
                                                        height="364"
                                                        src="{{asset('adminTemplate/img/apps/app-9.png')}}?"
                                                        class="attachment-full size-full"
                                                        alt="sucursales conectadas"
                                                        data-lazy-srcset="{{asset('adminTemplate/img/apps/app-9.png')}} 650w, 
                                                                          {{asset('adminTemplate/img/apps/app-9.png')}} 300w, 
                                                                          {{asset('adminTemplate/img/apps/app-9.png')}} 480w"
                                                        data-lazy-sizes="(max-width: 650px) 100vw, 650px"
                                                        data-lazy-src="{{asset('adminTemplate/img/apps/app-9.png')}}"/>
                                                </div>
                                            </div>
                                            <div class="ha-text">
                                                <h2 class="ha-flip-box-heading">
                                                    Control de Accesos
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ha-flip-box-back">
                                        <div class="ha-flip-box-back-inner">
                                            <div class="icon-wrap"></div>
                                            <div class="ha-text">
                                                <h2 class="ha-flip-box-heading-back">Control de Accesos</h2>
                                                <div class="text-left apliDesc">
                                                    <i class="material-icons iconoChico">star_rate</i><span> Acceso Vehicular</span>
                                                </div>
                                                <div class="text-left apliDesc">
                                                    <i class="material-icons iconoChico">star_rate</i><span> Acceso Personas</span>
                                                </div>
                                                <div class="text-left apliDesc">
                                                    <i class="material-icons iconoChico">star_rate</i><span> Listas Blancas</span>
                                                </div>
                                                <div class="text-left apliDesc">
                                                    <i class="material-icons iconoChico">star_rate</i><span> Lustas Negras</span>
                                                </div>                                                                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </div>
@endsection


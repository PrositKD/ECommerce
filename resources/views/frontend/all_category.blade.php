@extends('frontend.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <section class="pt-4 mb-4">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <h1 class="fw-700 fs-20 fs-md-24 text-dark">
                        {{ translate('All Categories') }}
                    </h1>
                </div>
                <div class="col-lg-6">
                    <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                        <li class="breadcrumb-item has-transition opacity-60 hov-opacity-100">
                            <a class="text-reset" href="{{ route('home') }}">{{ translate('Home') }}</a>
                        </li>
                        <li class="text-dark fw-600 breadcrumb-item">
                            "{{ translate('All Categories') }}"
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- All Categories -->
   <!-- All Categories -->
<!-- All Categories -->
<section class="mb-5 pb-3">
    <style>
        .card:hover .overlay {
            opacity: 0.8;
            background-color: rgba(0, 0, 0, 0.6);
            transition: opacity 0.3s ease;
        }

        .overlay {
            transition: opacity 0.3s ease;
            background-color: rgb(0 0 0 / 16%);
        }
        .custome-height550{
            height:550px;
        }
        .custom-height300{
            height:300px;
        }
        
        @media only screen and (max-width: 993px){
            .custome-height550 {
                height: 300px;
            }
        }

    </style>
    <div class="mx-3">
        <div class="row">
            @foreach ($categories as $key => $category)
                @if($key == 0)
                    <div class="col-md-4 col-12 mb-4">
                    <div class="card border-0">
                            <a href="{{ route('products.category', $category->slug) }}" class="text-decoration-none">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{ uploaded_asset($category->banner) }}" alt="{{ $category->getTranslation('name') }}" class="custome-height550 img-fit">
                                
                                    <div class="overlay position-absolute top-0 start-0 end-0 bottom-0 d-flex align-items-center justify-content-center">
                                        <h2 class="text-white text-center fs-24 fs-md-30 fw-700">{{ $category->getTranslation('name') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @elseif($key == 1 || $key == 2 )
                <div class="col-md-4 col-12 mb-4">
                    <div class="card border-0">
                        <a href="{{ route('products.category', $category->slug) }}" class="text-decoration-none">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ uploaded_asset($category->banner) }}" alt="{{ $category->getTranslation('name') }}" class="custome-height550 img-fit">
                                
                                <div class="overlay position-absolute top-0 start-0 end-0 bottom-0 d-flex align-items-center justify-content-center">
                                    <h2 class="text-white text-center fs-24 fs-md-30 fw-700">{{ $category->getTranslation('name') }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @else
                <div class="col-md-3 col-12 mb-4">
                    <div class="card border-0">
                        <a href="{{ route('products.category', $category->slug) }}" class="text-decoration-none">
                            <div class="position-relative overflow-hidden">
                                    <img src="{{ uploaded_asset($category->banner) }}" alt="{{ $category->getTranslation('name') }}" class="img-fit custom-height300">
                                <div class="overlay position-absolute top-0 start-0 end-0 bottom-0 d-flex align-items-center justify-content-center">
                                    <h2 class="text-white text-center fs-24 fs-md-30 fw-700">{{ $category->getTranslation('name') }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @foreach ($category->childrenCategories as $key => $child_category)
                    <div class="col-md-3 col-12 mb-4">
                        <div class="card border-0">
                            <a href="{{ route('products.category', $child_category->slug) }}" class="text-decoration-none">
                                <div class="position-relative overflow-hidden">
                                        <img src="{{ uploaded_asset($child_category->banner) }}" alt="{{ $child_category->getTranslation('name') }}" class="img-fit custom-height300">
                                    <div class="overlay position-absolute top-0 start-0 end-0 bottom-0 d-flex align-items-center justify-content-center">
                                        <h2 class="text-white text-center fs-24 fs-md-30 fw-700">{{ $child_category->getTranslation('name') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                @endif
            @endforeach
        </div>
    </div>
</section>







@endsection

@section('script')
    <script>
        $('.show-hide-cetegoty').on('click', function() {
            var el = $(this).siblings('ul');
            if (el.hasClass('less')) {
                el.removeClass('less');
                $(this).html('{{ translate('Less') }} <i class="las la-angle-up"></i>');
            } else {
                el.addClass('less');
                $(this).html('{{ translate('More') }} <i class="las la-angle-down"></i>');
            }
        });
    </script>
@endsection

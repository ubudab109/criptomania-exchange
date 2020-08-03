@include('frontend.mobiris._header')

<body>

  <section class="menu cid-qynYwP0rAw" once="menu" id="menu1-3" data-rv-view="1014">
    @include('frontend.mobiris._top_navbar')
  </section>

  <section class="header4 cid-qyk0Y195zN" id="header4-1" data-rv-view="993">
    @include('frontend.mobiris._banner')
  </section>

  <section class="mbr-section info2 cid-qypuIzB65Z" id="info2-h" data-rv-view="1002">
    <div class="container" style="margin-top: -150px;">

      <div class="glide">
        <div class="glide__track" data-glide-el="track">

          <ul class="glide__slides">
            @foreach($stockPairs as $stockPair)

            <li class="glide__slide">

              <h5 style="font-size:15px">{{ $stockPair->stock_item_abbr }}/{{ $stockPair->base_item_abbr }}</h5>
              <h5 style="font-size:15px">Last Price: {{ number_format($stockPair->last_price) }}</h5>
              <h5 style="font-size:15px">

                @if($stockPair->change_24 > 0)
                <i class="fa fa-sort-up text-green"></i>
                @elseif($stockPair->change_24 < 0) <i class="fa fa-sort-down text-red"></i>
                  @else
                  <i class="fa fa-sort text-gray"></i>
                  @endif
                  <span style="font-size:15px">{{ number_format($stockPair->change_24,2) }}%</span>


              </h5>
              <h5 style="font-size:15px">Volume: {{ number_format($stockPair->exchanged_base_item_volume_24, 3) }}</h5>
            </li>
            @endforeach

          </ul>


        </div>


      </div>
    </div>
  </section>

  <section class="features1 cid-qyp9g9ptI2" id="features1-c" data-rv-view="999">
    @include('frontend.mobiris._reason')
  </section>

  {{-- <section class="header3 cid-qyoZgHBpNG" id="header3-4" data-rv-view="1005"> --}}
  @include('frontend.mobiris._about')
  {{-- </section> --}}

  @include('frontend.mobiris._footer')


  <script src="{{asset('mobiris/web/assets/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('mobiris/tether/tether.min.js')}}"></script>
  <script src="{{asset('mobiris/popper/popper.min.js')}}"></script>
  <script src="{{asset('mobiris/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('mobiris/jarallax/jarallax.min.js')}}"></script>
  <script src="{{asset('mobiris/dropdown/js/script.min.js')}}"></script>
  <script src="{{asset('mobiris/touch-swipe/jquery.touch-swipe.min.js')}}"></script>
  <script src="{{asset('mobiris/smooth-scroll/smooth-scroll.js')}}"></script>
  <script src="{{asset('mobiris/theme/js/script.js')}}"></script>
  <script src="{{ asset('js/app.js') }}?t={{ random_string() }}"></script>
  <script src="{{ asset('common/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('common/vendors/iCheck/icheck.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
  <script src="{{ asset('backend/assets/js/adminlte.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

  {{-- bootstrap script --}}
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>

  <script>
    var glide = new Glide('.glide', {
  type: 'carousel',
  autoplay: 1500,
  perView: 4,
  focusAt: 'center',
  breakpoints: {
    800: {
      perView: 2
    },
    480: {
      perView: 1
    }
   
  }
})

glide.mount()
  </script>

  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    })
  </script>




</body>

</html>
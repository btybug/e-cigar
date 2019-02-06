<div class="d-flex flex-wrap">
    {{--{{dd($countriesShipping[$default_shipping->country])}}--}}
    {{--{{dd (getRegionByZone(@$default_shipping->country)[$default_shipping->region] )}}--}}
    <span class="col-2">
        <svg viewBox="0 0 14 18" width="14px" height="18px">
            <path fill-rule="evenodd"  fill="rgb(132, 129, 157)" d="M7.672,17.772 C7.488,17.923 7.244,17.999 7.000,17.999 C6.756,17.999 6.513,17.923 6.328,17.772 C6.328,17.772 -0.000,12.588 -0.000,6.990 C-0.000,3.129 3.134,-0.000 7.000,-0.000 C10.866,-0.000 14.000,3.129 14.000,6.990 C14.000,12.588 7.672,17.772 7.672,17.772 ZM7.000,0.993 C3.688,0.993 0.994,3.683 0.994,6.990 C0.994,8.429 1.506,10.789 3.943,13.864 C5.391,15.690 6.842,16.907 6.952,16.999 C6.959,17.002 6.976,17.006 7.000,17.006 C7.023,17.006 7.041,17.002 7.048,16.999 C7.276,16.809 13.006,11.970 13.006,6.990 C13.006,3.683 10.312,0.993 7.000,0.993 ZM7.000,8.457 C6.232,8.457 5.610,7.836 5.610,7.069 C5.610,6.303 6.232,5.681 7.000,5.681 C7.767,5.681 8.390,6.303 8.390,7.069 C8.390,7.836 7.767,8.457 7.000,8.457 Z"/>
        </svg>
    </span>
    <div class="col-10">
        @if($default_shipping)
            <ul class="list-unstyled mb-0 font-16">
                <li>{!! $default_shipping->company !!}</li>
                <li>{!! $default_shipping->first_line_address !!}</li>
                <li>{!! $default_shipping->second_line_address !!}</li>
                <li>{!! $default_shipping->city !!}</li>
                <li>{!! $countriesShipping[$default_shipping->country] !!}</li>
                <li>{!! getRegionByZone(@$default_shipping->country)[$default_shipping->region] !!}</li>
                <li>111 street name</li>
                <li>{!! $default_shipping->post_code !!}</li>
            </ul>
        @else
            NO Address
        @endif
        <div class="d-flex flex-wrap change-new-btn mt-4">
            <div class="mr-3">
                <span data-toggle="modal" data-target="#changeAddressModal" class="d-inline-flex align-items-center text-quatr-clr font-main-bold font-15 text-uppercase pointer">
                change
                <span class="d-inline-block ml-1">&#9998;</span>
            </span>

            </div>
            <div>
                <span data-toggle="modal" data-target="#addNewAddress" class="d-inline-flex align-items-center text-quatr-clr font-main-bold font-15 text-uppercase pointer  nav-link--new-address address-book-new">
                    add new
                    <span class="d-inline-block ml-1">&#43;</span>
                </span>
            </div>
        </div>
    </div>
</div>


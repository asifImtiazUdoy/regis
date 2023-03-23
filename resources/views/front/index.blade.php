@extends('layouts.app')

@section('title', 'Application')

@section('content')


<!-- ======= Contact Section ======= -->
<section id="form" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('registration') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Group<span style="color: red">*</span></label>
                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="group" id="group_a" value="1">
                                            <label class="form-check-label" for="group_a">
                                                Group-A (3 to 6 years)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="group" id="group_b" value="2">
                                            <label class="form-check-label" for="group_b">
                                                Group-B (7 to 10 years)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="group" id="group_c" value="3">
                                            <label class="form-check-label" for="group_c">
                                                Group-C (11 to 15 years)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="group" id="group_d" value="4">
                                            <label class="form-check-label" for="group_d">
                                                Group-D (16 to 18 years)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('group'))
                                <small style="color: red">{{ $errors->first('group') }}</small>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Full Name<span style="color: red">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter your name" name="name" id="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <small style="color: red">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email address<span style="color: red">*</span></label>
                                    <input type="email" class="form-control" placeholder="name@example.com" name="email" id="email" value="{{ old('email')}}">
                                    @if ($errors->has('email'))
                                    <small style="color: red">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone Number<span style="color: red">*</span></label>
                                    <input type="phone" class="form-control" name="phone" id="phone" value="{{ old('phone')}}">
                                    @if ($errors->has('phone'))
                                    <small style="color: red">{{ $errors->first('phone') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date_of_birth">Date of Birth<span style="color: red">*</span></label>
                                    <div class="form-row">
                                        <div class="col-4">
                                            <select class="form-control" name="b_date" id="b_date">
                                                <option value="" selected disabled>Date</option>
                                                @for($i=1; $i <= 31; $i++)
                                                <option value="{{ $i }}">{{ $i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" name="b_month" id="b_month">
                                                <option value="" selected disabled>Month</option>
                                                @for($i=1; $i <= 12; $i++)
                                                <option value="{{ $i }}">{{ $i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" name="b_year" id="b_year">
                                                <option value="" selected disabled>Year</option>
                                                @php 
                                                $year = date("Y");
                                                @endphp
                                                @for($i=1950; $i <= $year; $i++)
                                                <option value="{{ $i }}">{{ $i}}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        @if ($errors->has('b_date') || $errors->has('b_month') || $errors->has('b_year'))
                                        <small style="color: red">Please Select Date of Birth</small>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country_id">Country<span style="color: red">*</span></label>
                                    <select class="form-control" name="country_id" id="country_id">
                                        <option value="" selected disabled>--select one--</option>
                                        @foreach($countries as $country)
                                        <option value="{!! $country->id !!}">{!! $country->name !!}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                    <small style="color: red">{{ $errors->first('country_id') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="school">Participant's School<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="school" id="school" placeholder="Participant School Name" value="{{ old('school')}}">
                                @if ($errors->has('school'))
                                <small style="color: red">{{ $errors->first('school') }}</small>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="art_name">Artwork name<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Artwork name here" name="art_name" id="art_name" value="{{ old('art_name')}}">
                                    @if ($errors->has('art_name'))
                                    <small style="color: red">{{ $errors->first('art_name') }}</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="media">Media</label>
                                    <input type="text" class="form-control" placeholder="Artwork media here" name="media" id="media" value="{{ old('media')}}">
                                    @if ($errors->has('media'))
                                    <small style="color: red">{{ $errors->first('media') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="size">Size</label>
                                    <input type="text" class="form-control" placeholder="Artwork size here" name="size" id="size" value="{{ old('size')}}">
                                    @if ($errors->has('size'))
                                    <small style="color: red">{{ $errors->first('size') }}</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="year">Year<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Artwork year here like 2021" name="year" id="year" value="{{ old('year')}}">
                                    @if ($errors->has('year'))
                                    <small style="color: red">{{ $errors->first('year') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="image">Personal Photo<span style="color: red">*</span></label>
                                    <input type="file" class="image form-control" name="image" id="image">
                                    @if ($errors->has('image'))
                                    <small style="color: red">{{ $errors->first('image') }}</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="year">Artwork Image</label>
                                    <input type="file" class="image form-control" name="artwork" id="artwork">
                                    @if ($errors->has('artwork'))
                                    <small style="color: red">{{ $errors->first('artwork') }}</small>
                                    @endif
                                    <small style="float:right">Maximum Upload 2MB</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="link">Provide link (Please give single video/blog post link)</label>
                                <input type="text" class="form-control" placeholder="https://www.example.com" name="link" id="link" value="{{ old('link')}}">
                                @if ($errors->has('link'))
                                <small style="color: red">{{ $errors->first('link') }}</small>
                                @endif
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="payment_number">bkash/Paytm/Google Pay/Bank Account Number</label>
                                    <input type="text" class="form-control" placeholder="bkash/Paytm/Google Pay/Bank Account Number" name="payment_number" id="payment_number" value="{{ old('payment_number')}}">
                                    @if ($errors->has('payment_number'))
                                    <small style="color: red">{{ $errors->first('payment_number') }}</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="transaction_id">Transaction ID<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Transaction ID" name="transaction_id" id="transaction_id" value="{{ old('transaction_id')}}">
                                    @if ($errors->has('transaction_id'))
                                    <small style="color: red">{{ $errors->first('transaction_id') }}</small>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section><!-- End Contact Section -->

@endsection

@section('script')
<script>

    $('#country_id').select2();
    $('#school_id').select2();

    $('.image').dropify();

    @if($errors->count()>0)
    $('html, body').animate({
        scrollTop: $('#form').offset().top
    }, 'slow');

    @endif

</script>
@endsection

<div class="card" id="printarea">
    <div class="card-header" style="background: #fff; padding: 0; text-align: center;">
        @php
        $pdf = "uploads/images/".$setting->pad_head;
        @endphp
        @if($setting->pad_head != null)
        <img src="{{ url('uploads/images', $setting->pad_head) }}" style="width: 80%"> 
        <!--<img src="{{ $pdf }}" style="width: 80%">-->
        @endif
        
    </div>
    <hr>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <center><h4 style="font-weight: bold; color: green;">
                    @if($exhibitor->group == 1)
                    Group-A
                    @elseif($exhibitor->group == 2)
                    Group-B
                    @elseif($exhibitor->group == 3)
                    Group-C
                    @elseif($exhibitor->group == 4)
                    Group-D
                    @endif
                    &nbsp;&nbsp;Serial : #{!! $exhibitor->id !!}
                    &nbsp;&nbsp; Code : {{ $exhibitor->regi_code }}
                </h4></center>
            </div>
        </div>
        <table style="border-collapse: collapse; width: 100%">
            <tr>
                <td style="width: 25%; padding: 10px">

                    @php
                    $image = "uploads/images/".$exhibitor->image;
                    @endphp
                    <!--<img src="{{ $image }}" style="max-height: 190px">-->
                    <img src="{{ url('uploads/images', $exhibitor->image) }}" style="max-height: 190px"> 
                </td>
                <td>
                    <table style="border: 1px; width: 100%; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="border: 1px solid black; padding: 10px">Name</td>
                                <td colspan="3" style="border: 1px solid black; padding: 10px">{!! $exhibitor->name !!}</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black; padding: 10px">Email</td>
                                <td colspan="3" style="border: 1px solid black; padding: 10px">{!! $exhibitor->email !!}</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black; padding: 10px">Phone</td>
                                <td colspan="3" style="border: 1px solid black; padding: 10px">{!! $exhibitor->phone !!}</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black; padding: 10px">Country</td>
                                <td style="border: 1px solid black; padding: 10px">{!! $exhibitor->country['name'] !!}</td>

                                <td style="border: 1px solid black; padding: 10px">Date of Birth</td>
                                <td style="border: 1px solid black; padding: 10px">{!! $exhibitor->b_date !!}-{!! $exhibitor->b_month !!}-{!! $exhibitor->b_year !!}</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black; padding: 10px">School</td>
                                <td colspan="3" style="border: 1px solid black; padding: 10px">{{ $exhibitor->school }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12">
            <center><h4>Artwork Details</h4></center>
            <table style="width: 100%; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <td style="width: 10%; border: 1px solid black; padding: 10px">Name</td>
                        <td colspan="3" style="width: 90%; border: 1px solid black; padding: 10px">{!! $exhibitor->art_name !!}</td>
                    </tr>
                    <tr>
                        <td style="width: 10%; border: 1px solid black; padding: 10px">Media</td>
                        <td colspan="3" style="width: 95%; border: 1px solid black; padding: 10px">{!! $exhibitor->media !!}</td>
                    </tr>
                    <tr>
                        <td style="width: 10%; border: 1px solid black; padding: 10px">Size</td>
                        <td style="width: 40%; border: 1px solid black; padding: 10px">{!! $exhibitor->size !!}</td>
                        <td style="width: 10%; border: 1px solid black; padding: 10px">Year</td>
                        <td style="width: 40%; border: 1px solid black; padding: 10px">{!! $exhibitor->year !!}</td>
                    </tr>
                    @if($exhibitor->link != null)
                    <tr>
                        <td style="width: 10%; border: 1px solid black; padding: 10px">Link</td>
                        <td colspan="3" style="width: 95%; border: 1px solid black; padding: 10px"><a href="{!! $exhibitor->link !!}" target="_blank">{!! $exhibitor->link !!}</a></td>
                    </tr>
                    @endif
                </tbody>
            </table>
            @if($exhibitor->artwork != null)
            <div style="text-align: center; padding: 30px">
                @php
                $link = "uploads/images/".$exhibitor->artwork;
                @endphp
                <!--<img src="{{ $link }}" style="max-height: 200px; max-width:60%; border: 10px solid black; padding: 20px">-->
                <img src="{{ url('uploads/images', $exhibitor->artwork) }}" style="max-height: 200px; max-width:60%; border: 10px solid black; padding: 20px"> 
            </div>
            @endif
        </div>
    </div>
    <hr>
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="text-align: center;"><a style="color: #444444" href="{{ $setting->website }}">{{ $setting->website }}</a></td>
            <td style="text-align: center;">{!! $setting->phone !!}</td>
            <td style="text-align: center;">{{ $setting->email }}</td>
        </tr>
    </table>
</div>
</div>
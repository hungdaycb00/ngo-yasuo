@extends('layout.user_layout')
@section('user_content')
    <div class="text-center mt-30"><p class="h1 uppercase">Donate by VNPAY</p></div>

    @if(count($errors)>0)

        <div class="alert alert-danger text-center">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>

    @endif
    @foreach($dataCard as $d)
    <form action="{{URL::to('admin/donate/saveCredit')}}" method="post">
        {{csrf_field()}}
        <div class="agileits_w3layouts_main_grid">
            <div class="agile_main_grid_left">
                <h3>Your Details :</h3>

                <input type="text" name="code_payment" placeholder="Code Payment" value="{{$d->code_payment}}>

                <input type="text" name="name" placeholder="Name" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="text" name="address" placeholder="Address" required="">
                <input type="text" name="phone" placeholder="Phone Number" required="">
            </div>

            <div class="agile_main_grid_left">
                <div class="w3_agileits_main_grid_left_grid">
                    <h3>Your Donation :</h3>
                    <div class="agileits_main_grid_left_l_grids">
                            <h4>Because</h4>
                            <select id="w3_agileits_select1" name ="category_type" class="w3layouts_select" onchange="change_country(this.value)">
                                <option value="" selected=""> --Any donation cause--</option>
                                <option value="3"> Privileged Children</option>
                                <option value="1"> Education</option>
                                <option value="2"> Health Care</option>
                                <option value="4"> Others</option>
                            </select>
                        <h4>Do you want to be public or private?</h4>
                        <label class="radio-inline"><input class="mr-1" name="status" type="radio" value="2" required="">Private</label>
                        <label class="radio-inline"><input class="mr-1"  name="status" type="radio" value="1" required="">Public</label>
                    </div>

                    <div class="col-xs-2">
                        <h4 for="ex1">Donate Amount</h4>
                        <input class="form-control" name="amount" id="ex1" type="number" placeholder="$0.00" required="">
                    </div>
                    <br>
                    <textarea name="message" placeholder="Comments..."></textarea>
                </div>
            </div>
            <input type="submit" value="Submit"><br>

            <div class="clear"></div>
        </div>
    </form>
    @endforeach
    <div class="text-center"><p class="alert-success">We will check and notify you!!!</p></div>
    <!-- Button to Open the Modal -->
@endsection

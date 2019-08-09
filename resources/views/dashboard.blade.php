@extends('layouts.master')

@section('content')

@if (Auth::check())

<!-- contacts list -->
<div id="starting"></div>
<div class="row container-fluid" id="contactList">
    <div class="col-md-3"></div>
    <div class="col-md-6"  >
        <h2 class="text-danger p-3 mt-3 mb-3">Contacts:</h2>
        @if (Auth::check())
            @if (count($contacts))
                @foreach($contacts as $contact)
                    <div class="container" >
                        <div class="row py-3 mb-2 task-border align-items-center">

                            <div class="col-1 text-primary">
                                <h3 class="text-capitalize"><?=substr($contact->name,0,1)?></h3>
                            </div>
                            <div class="col-sm-9 col-7" >

                                <h5><a  href="" data-contactnameshow={{ $contact->name }} data-toggle="modal" data-target="#contactShow">{{ $contact->name }}</a></h5>
                                <p class="text-white">{{ $contact->phone_1 }}</p>

                            </div>
                            <div class="col-2">
                                {{--<form action="{{ route('contacts.destroy', $contact->id) }}" id="deleteContact-{{ $contact->id }}" method="post" > @csrf</form>--}}
                                {{--<button type="button" class="btn btn-danger btn-sm" onclick="document.getElementById('deleteContact-{{ $contact->id }}').submit()"><i class="fas fa-user"></i></button>--}}
                                {{--<form action="{{ route('contacts.destroy', $contact->id) }}" id="deleteContact-{{ $contact->id }}" method="post" > @csrf</form>--}}
                                {{--<a class="" onclick="document.getElementById('deleteContact-{{ $contact->id }}').submit()"><i class="fas fa-times fa-lg " style="color: red;"></i></a>--}}

                                <a class="" data-thiscontactid="{{ $contact->id }}" data-toggle="modal" data-target="#contactDelete"><i class="fas fa-times fa-lg " style="color: red;" ></i></a>
                                {{--<a href="{{ route('contacts.edit',['contact' => $contact->id]) }}" class="" data-dismiss="modal"><i class="fas fa-edit fa-lg"></i></a>--}}

                                <a class="" data-contactname="{{ $contact->name }}" data-thiscontactid="{{ $contact->id }}" data-contactaddress="{{ $contact->address }}" data-contactphone1="{{ $contact->phone_1 }}" data-contactphone2="{{ $contact->phone_2 }}" data-contactemail="{{ $contact->email }}" data-toggle="modal" data-target="#editContact" ><i class="fas fa-edit fa-lg" style="color: blue;"></i></a>
                                {{--<a href="#"><i class="fas fa-phone fa-lg text-success mr-2"></i></a>--}}

                            </div>
                            <div class="col-2">

                            </div>
                        </div>

                    </div>
                @endforeach

            @else
                <h3>You have No contacts yet</h3>

            @endif
       @endif


    </div>
</div>
<!-- end of contacts list -->

@else
    <div class="container">
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary btn-block " data-toggle="modal" data-target="#exampleModalLong">
                About Us
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">About Us</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Register to save and safeguard your contacts online Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, cupiditate ea error laudantium molestiae nesciunt reprehenderit voluptatibus. Adipisci assumenda dolores eius, eligendi hic magni reiciendis sed unde? Consectetur, ea, eaque.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>


@endif

@endsection

@extends('layouts.masterNoBanner')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@section('content')
<div class="row  justify-content-center">
    <div class="col-lg-8 col-md-8 text-center">
        <form action="{{route('contacts.update', ['contact' => $contact->id ])}}" method="post">
            @csrf
            @method('PUT')
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" name="name" id="inputName"  value="{{ $contact->name}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail" value="{{ $contact->email }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPhone">Phone</label>
                    <input type="tel" class="form-control" name="phone_1" id="inputPhone" value="{{ $contact->phone_1 }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPhone2">Phone 2</label>
                    <input type="tel" class="form-control" name="phone_2" id="inputPhone2" value="{{ $contact->phone_2 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" name="address" id="inputAddress" value="{{ $contact->address }}">
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Favourite
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  type="submit" class="btn btn-primary">Save Contact</button>
                <a href="" class="" data-dismiss="modal"><i class="fas fa-edit"></i></a>
                <a href="" class=""><i class="fas fa-check"></i></a>
            </div>
        </form>
    </div>
</div>

@endsection
